<?php
session_start();
include 'connect.php';
$link = $_POST['link'];
$query_follow = "INSERT INTO follow (follower_id, following_id) VALUES ('".$_SESSION["id"]."', '".$_POST["id"]."')";
if ($result_follow = mysqli_query($connection, $query_follow)){
  header("Location: ".$link);
}
?>