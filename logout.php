<?php
include 'inc/connect.php';

session_start();
$sql = "UPDATE users SET status = 'Offline' WHERE username = '" . $_SESSION['mainUserName'] . "'";
$query = mysqli_query($con, $sql);
session_destroy();
header('Location: login.html');
?>