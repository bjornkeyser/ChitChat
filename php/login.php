<?php
session_start();
include "connect.php";

$uname = mysqli_real_escape_string($connection, $_POST["uname"]);
$pwd = mysqli_real_escape_string($connection, $_POST["pwd"]);
$hashed = md5($pwd);
$email = mysqli_real_escape_string($connection, $_POST["email"]);
$query = "SELECT * FROM users WHERE uname = '$uname' AND pwd = '$hashed'";
$result = mysqli_query($connection, $query, MYSQLI_ASSOC);
if(!$obj=mysqli_fetch_object($result)){
 //echo "Your username or password is incorrect";
  $error = "Your username or password is incorrect";
  header("Location: ../index.php");
}
else {
  $_SESSION["id"]=$obj->id;
  $_SESSION["user"]=$obj->uname;
  $_SESSION["first"]=$obj->first;
  $_SESSION["last"]=$obj->last;
  $_SESSION["pwd"]=$obj->pwd;
  $_SESSION["email"]=$obj->email;
  $_SESSION["bio"]=$obj->bio;
  $_SESSION["img"]=$obj->img;
  header("Location: ../profile.php?uid=".$_SESSION["id"]);
}
?>