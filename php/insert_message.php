<?php

include '../inc/connect.php';

// Retrieve the message, mainUsername, and username values from the AJAX request
$message = $_POST['message'];
$mainUserName = $_POST['mainUsername'];
$username = $_POST['username'];
$time = date('Y-m-d H:i:s', time());
$images = $_POST['images'];

// Here, you can insert the message into the database along with the relevant user information
// Implement your database insertion logic accordingly

// Assuming you have already established a database connection
$query = "INSERT INTO chat_logs (user_send, user_receive, message, timestamp, images) VALUES ('$mainUserName', '$username', '$message', '$time', '$images')";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    header("Location yourmum.html");
} else {
    header("Location yourmumfailed.html");
    header("HTTP/1.1 500 Internal Server Error");
    echo "Error inserting message into the database.";
}
?>
