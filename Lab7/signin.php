<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
header('Content-Type:text/plain');
$account_username=$_POST["username"];
$account_pw= $_POST["password"];

if(($account_username=="admin")&&($account_pw=="admin"))
{
    echo("you are an admin");
}
else{

$account_pw=hash('sha256',$account_pw);

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



$stmt = $mysqli->prepare("SELECT accountUsername FROM birthdays WHERE accountUsername=? AND accountPassword=? ");
$stmt->bind_param("ss", $account_username,$account_pw);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($accountUsername);//what ure selecting
$count = $stmt->num_rows; //rows of the resulting table

if ($count==0)
{
echo("wrong password or username");
}

else{
    $_SESSION["username"]=$account_username;
echo("successfully logged in");
}
}
?>