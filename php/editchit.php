<?php
session_start();
include 'connect.php';
$query_edit = "UPDATE cheets SET cheet = '".$_POST['newContent']."' WHERE cid=".$_POST['cid'];
$result_edit = mysqli_query($connection, $query_edit);
  if (mysqli_query($connection, $query_edit)) {
  header("Location: ../profile.php?uid=".$_SESSION["id"]);
} else {
    echo "Error updating chit";
  }
?>