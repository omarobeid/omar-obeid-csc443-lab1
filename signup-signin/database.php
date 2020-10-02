<?php

$conn = mysqli_connect("localhost","root","","users");


function connectDb($servername,$username,$password,$dbname){
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  if ($conn->connect_error)
{
throw new Exception("Connection Error");
}
else {
    return $conn;
}
}

function UserExists($conn, $tablename, $user){


  $result= mysqli_query($conn,"SELECT Username FROM $tablename WHERE Username='$user'");
    // return count($result)>0;
    $check = mysqli_fetch_array($result);
    for ($i=0; $i<count($result); $i++) {
      if($check[$i] == $user)
        return true;
    }
    return false;
}

function EmailExists($conn, $tablename, $email){


  $result= mysqli_query($conn,"SELECT Email FROM $tablename WHERE Email='$email'");
    // return count($result)>0;
    $check = mysqli_fetch_array($result);
    for ($i=0; $i<count($result); $i++) {
      if($check[$i] == $email)
        return true;
    }
    return false;
}

function PasswordExists($conn, $tablename, $pass){
  $password = md5($pass);
  $result= mysqli_query($conn, "SELECT Password FROM $tablename WHERE Password='$password'");
  //return $result[0]["Password"]==md5($pass);
  $check = mysqli_fetch_array($result);
  for ($i=0; $i<count($result); $i++) {
    if($check[$i] == $password)
      return true;
  }
  return false;
  }

function PasswordsMatch($pass, $pass2){
    return $pass==$pass2;
}

function PassMatchesUser($conn, $tablename, $username, $pass){
    $result= mysqli_query($conn, "SELECT Password FROM $tablename WHERE Username='$username'");
    // return $result[0]["password"]==md5($password);
    for ($i=0; $i<count($result); $i++) {
      if(mysqli_fetch_array($result)[$i] == md5($pass))
        return true;
    }
    return false;
    }


function AddUser($conn, $username, $password, $password2, $tablename, $email){


  if(EmailExists($conn,$tablename,$email)){
    return -4;
  }

  if(UserExists($conn,$tablename,$username)){
    return -1;
  }
  if(PasswordExists($conn,$tablename,$password)){
    return -2;
  }
  if(!PasswordsMatch($password, $password2)){
    return -3;
  }

  $hashedPassword= md5($password);
  $result = mysqli_query($conn, "INSERT into $tablename (Username,Password,Email) values ('$username','$hashedPassword','$email')");
  return 1;

}



function GetUser($conn, $tablename, $username, $password){

  if(UserExists($conn,$tablename,$username)){
      if(PassMatchesUser($conn,$tablename, $username, $password)){
          return 1;
  }
  return -2;

  }
  return -1;

}






  function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
