<?php
session_start();
include 'connect.php';
$date = date("Y-m-d H:i:s");
$session_id = $_SESSION['id'];
$reply = $_POST['reply'];
$cid = $_POST['cid'];
$query = "INSERT INTO replies (uid, date, reply, comment_on) VALUES ($session_id, '$date', '$reply', $cid)";
$result = mysqli_query($connection, $query);
header ("Location: ".$_POST['link']);
?>
