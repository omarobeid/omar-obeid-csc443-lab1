<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="POST" >
      <ul>
        <li>Email:<input type="text" name="email"></input></li>
        <li>Username:<input type="text" name="username"></input></li>
        <li>Password:<input type="text" name="password"></input></li>
        <li>Confirm password:<input type="text" name="password2"></input></li>
      </ul>
      <input type="submit" value="Sign Up">
    </form>


    <form method="GET" >
      <ul>

        <li>Username:<input type="text" name="username"></input></li>
        <li>Password:<input type="text" name="password"></input></li>
      </ul>
      <input type="submit" value="Sign In">
    </form>



    <?php
      include 'database.php';
      $connection = connectDb("localhost","root","","users");

      if($_SERVER["REQUEST_METHOD"]=="POST"){
          $result = AddUser($connection, $_POST["username"], $_POST["password"],$_POST["password2"], "users", $_POST["email"]);

          if($result==-1)
          {
            alert("Username already exists.");
          }
          if($result==-2)
          {
            alert("Passwords already exists.");
          }
          if($result==-3)
          {
            alert("Passwords do not match");
          }
          if($result==1)
          {
            mkdir("uploads/".$_GET['username']);
            alert("Added successfully.");
          }
          if($result==-4)
          {
            alert("Email already exists.");
          }


      }


      if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["username"])){
          $result = GetUser($connection,"users", $_GET["username"], $_GET["password"]);
          $username = $_GET['username'];
          if($result==-1)
          {
            $password = $_GET['password'];
            alert("Username does not exist.");
            header("index.php?username=$username&password=wrong");
          }
          if($result==-2)
          {

            alert("Password is incorrect.");
            header("index.php?username=$username&password=wrong");
          }
          if($result==1)
          {
            alert("Signed In.");
            header("Location: ./signin.html?$username");
          }


      }

    ?>
  </body>
</html>
