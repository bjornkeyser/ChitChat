<?php    
session_start();
include "connect.php";
$sessie_id = $_SESSION["id"];
$first = mysqli_real_escape_string($connection, $_POST["first"]);
$last = mysqli_real_escape_string($connection, $_POST["last"]);
$email = mysqli_real_escape_string($connection, $_POST["email"]);
$uname = mysqli_real_escape_string($connection, $_POST["uname"]);
$bio = mysqli_real_escape_string($connection, $_POST["bio"]);
$query_update = "UPDATE users SET first='$first', last='$last', email='$email', uname='$uname', bio='$bio' WHERE id=$sessie_id";
$result_update = mysqli_query($connection, $query_update);
header("Location: ../profile.php?uid=".$_SESSION["id"]);
/*$cheet = mysqli_real_escape_string($connection, $_POST["cheet"]);
$date = date("Y-m-d H:i:s");
$uid = $obj_users->id;
$query = "INSERT INTO cheets (uid, date, cheet) VALUES ('$uid', '$date', '$cheet')";
$result = mysqli_query($connection, $query);
header("Location: ../profile.php?uname=".$_SESSION['user']."&posted=1");
*/
?>