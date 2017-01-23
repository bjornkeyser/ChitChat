<?php
session_start();
$search = $_POST["searchinput"];
$firstChar = substr($search, 0, 1);
$content = substr($search, 1);
if ($firstChar==="#"){
  header("Location: search.php?htag=$content&uid=".$_SESSION['id']);
}
else if ($firstChar==="@"){
  header("Location: search.php?tag=$content&uid=".$_SESSION['id']);
}
else {
  header("Location: search.php?search=$search&uid=".$_SESSION['id']);
}
?>