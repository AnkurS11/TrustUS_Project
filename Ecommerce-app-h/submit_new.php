<?php
if(isset($_POST['submit_password']) && $_POST['email'] && $_POST['password'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $pass = md5($pass);
  include "db.php";

  $select=mysqli_query($con, "update user_info set password='$pass' where email='$email'");

  echo "<script> window.location.assign('index.php'); </script>";
}
?>