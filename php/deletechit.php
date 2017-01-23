<?php
session_start();
include 'connect.php';
$query_delete = "DELETE FROM cheets WHERE cheets.cid = ".$_POST['cid'];
$result_delete = mysqli_query($connection, $query_delete);
  if (mysqli_query($connection, $query_delete)) {
  header("Location: ../profile.php?uid=".$_SESSION["id"]);
} else {
    echo "Error deleting record";
  }
$query_delete_hashtag = "DELETE FROM hashtags WHERE hashtags.cid = ".$_POST['cid'];
$result_delete_hashtag = mysqli_query($connection, $query_delete_hashtag);
  if (mysqli_query($connection, $query_delete_hashtag)) {
  header("Location: ../profile.php?uid=".$_SESSION["id"]);
} else {
    echo "Error deleting record";
  }
?>