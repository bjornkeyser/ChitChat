<?php
session_start();
include "connect.php";

$first = addslashes(mysqli_real_escape_string($connection, $_POST["first"]));
$last = addslashes(mysqli_real_escape_string($connection, $_POST["last"]));
$uname = addslashes(mysqli_real_escape_string($connection, $_POST["uname"]));
$pwd = addslashes(mysqli_real_escape_string($connection, $_POST["pwd"]);
$pwdconf = addslashes(mysqli_real_escape_string($connection, $_POST["pwdconf"]));
$email = addslashes(mysqli_real_escape_string($connection, $_POST["email"]));
//$row=mysqli_fetch_object($result);
$query_unamecheck = "SELECT * FROM users WHERE uname = '$uname'";
$result_unamecheck = mysqli_query($connection, $query_unamecheck);
if (mysqli_num_rows($result_unamecheck) !== 0) {
 echo "Username already exists"; 
}
$query_emailcheck = "SELECT * FROM users WHERE email = '$email'";
$result_emailcheck = mysqli_query($connection, $query_emailcheck);
if (mysqli_num_rows($result_emailcheck) !== 0) {
 echo "Email already taken"; 
}
else if ($pwd===$pwdconf){
  session_start();
  $hashed=md5($pwd);
  $query = "INSERT INTO users (last, first, pwd, uname, email) VALUES ('$last', '$first', '$hashed', '$uname', '$email')";
  $result = mysqli_query($connection, $query);
  $obj = mysqli_fetch_object($result);
  $query2 = "SELECT * FROM users WHERE uname = '$uname' AND pwd = '$hashed'";
  $result2 = mysqli_query($connection, $query2);
  $obj2 = mysqli_fetch_object($result2);
  $_SESSION["id"]=$obj2->id;
  $_SESSION["user"]=$obj2->uname;
  $_SESSION["first"]=$obj2->first;
  $_SESSION["last"]=$obj2->last;
  $_SESSION["pwd"]=$obj2->pwd;
  $_SESSION["email"]=$obj2->email;
  $_SESSION["bio"]=$obj2->bio;
  $_SESSION["img"]=$obj2->img;
  header("Location: ../profile.php?uid=".$_SESSION["id"]);
  }
else {
  echo "Passwords were not the same";
}
?>