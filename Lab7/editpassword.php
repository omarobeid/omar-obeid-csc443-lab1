<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
header('Content-Type:text/plain');
$account_username=$_SESSION["username"];
$account_pw= $_POST["password"];
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


$stmt2 = $mysqli->prepare("UPDATE birthdays SET accountPassword=? WHERE accountUsername=?");
$stmt2->bind_param("ss",$account_pw, $account_username);
$stmt2->execute();
 echo("password successfully changed");

?>