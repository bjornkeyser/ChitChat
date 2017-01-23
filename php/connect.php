<?php
$servername = "mysql.hostinger.nl";
$username = "u770719746_bjorn";
$password = "ikbenbjorn";
$dbname = "u770719746_chit";
$connection = mysqli_connect($servername, $username, $password);
mysqli_select_db($connection, $dbname);

if (mysqli_connect_errno()) {
    die("Connection failed: " . $conn->connect_error);
}