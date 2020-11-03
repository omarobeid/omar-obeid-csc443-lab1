<?php

error_reporting(E_ERROR | E_PARSE);
header('Content-Type:text/plain');
$account_username=$_POST["username"];
$account_pw=$_POST["password"];
$account_birthday=$_POST["birthday"];

if(!(preg_match('/[0-3][0-9]\/[01][0-9]\/[0-9]{4}/',$account_birthday)))
{
    echo("wrong input");
}
else
{

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



$stmt = $mysqli->prepare("SELECT accountUsername FROM birthdays WHERE accountUsername=? ");
$stmt->bind_param("s", $account_username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($accountUsername);//what ure selecting
$count = $stmt->num_rows; //rows of the resulting table

if ($count==0)
{
$stmt2 = $mysqli->prepare("INSERT INTO birthdays ( accountUsername, accountPassword, accountBirthday) VALUES (?, ?, ?)");
$stmt2->bind_param("sss", $account_username, hash('sha256',$account_pw) ,$account_birthday);
$stmt2->execute();

echo("succesffully added");
}

else{
echo("already exists");
}
}

?>