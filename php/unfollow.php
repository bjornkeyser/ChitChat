<?php
session_start();
include 'connect.php';
$link = $_POST['link'];
$query_unfollow = "DELETE FROM follow WHERE follower_id =".$_SESSION['id']." AND following_id = ".$_POST['id'];
$result_unfollow = mysqli_query($connection, $query_unfollow);
header("Location: ".$link);
?>