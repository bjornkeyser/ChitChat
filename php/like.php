<?php
session_start();
include 'connect.php';
$link = $_POST['link'];
$query_likes = "SELECT likes FROM cheets WHERE cid =".$_POST['cid'];
$result_likes = mysqli_query($connection, $query_likes);
$obj_likes=mysqli_fetch_object($result_likes);
$newlikes = $obj_likes->likes + 1;
$query_like = "UPDATE cheets SET likes = ".$newlikes." WHERE cid = ".$_POST['cid'];
$result_like = mysqli_query($connection, $query_like);
  if (mysqli_query($connection, $query_like)) {
  header("Location: ".$link."&liked=".$_POST['cid']);
} else {
    echo "Error liking";
  }
?>