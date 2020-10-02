<?php

if(isset($_FILE['file']) && isset($_POST['submit'])){
  $filename = $_FILE['file']['name'];
  $file_tmp =$_FILES['file']['tmp_name'];
  $file_type=$_FILES['file']['type'];
  $introduction = $_POST['introduction'];
  $username = $_GET['username'];
  move_uploaded_file($file_tmp,"signup-signin/uploads/$username.$filename");
}
