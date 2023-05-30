<?php

require 'verify.php';
include '../inc/connect.php';

// Retrieve the message, mainUsername, and username values from the AJAX request
$message = $_POST['message'];
$mainUsername = $_POST['mainUsername'];
$username = $_POST['username'];

// Here, you can insert the message into the database along with the relevant user information
// Implement your database insertion logic accordingly

// Example code to insert the message into the database
// Assuming you have already established a database connection
$query = "INSERT INTO chat_logs (user_send, user_receive, message, timestamp) VALUES ('$mainUsername', '$username', '$message', time())";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    echo "Message inserted into the database successfully.";
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo "Error inserting message into the database.";
}
?>