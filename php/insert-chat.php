<?php 
    session_start();  //TODO   creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
    if(isset($_SESSION['unique_id']))  //TODO   checks if the session variable unique_id is set or not
    {  
        include_once "config.php"; //TODO   includes the DB connecter
        $outgoing_id = $_SESSION['unique_id'];  //TODO   gets the unique_id of the user
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);  //TODO   escapes special characters in a string for use in an SQL statement
        $message = mysqli_real_escape_string($conn, $_POST['message']);   //TODO   escapes special characters in a string for use in an SQL statement
        if(!empty($message)) //TODO   checks if the message is empty
        {
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)  
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();  //TODO   sql query to insert the message in the messages table
        }
    }
    else
    {
        header("location: verify.php");  //TODO   redirects to login.php
    }


    
?>