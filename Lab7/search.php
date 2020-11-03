<?php

error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json');
$account_username=$_POST["username"];

$db_host="localhost";
$db_user="root";
$db_pass=null;
$db_name="mydatabase";

$mysqli=new mysqli($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno())
{
    echo("connect failed");
    exit();
}

$param = "$account_username%";

$stmt = $mysqli->prepare("SELECT accountUsername, accountBirthday FROM birthdays WHERE accountUsername LIKE ? ");
$stmt->bind_param("s", $param);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($accountUsername,$accountBirthday);//what ure selecting
$count = $stmt->num_rows; //rows of the resulting table

if ($count==0)
{
echo("no such user found");
}

else{
$myObj = new stdClass();
$myObj->users = array();

while($stmt->fetch()) {
    $user=new stdClass();
    $user->username=$accountUsername;
    $user->birthday=$accountBirthday;
    $myObj->users[]=$user; 
}

$myJSON = json_encode($myObj); 
echo $myJSON;
}

?>