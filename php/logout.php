<?php
    session_start();  //TODO   creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
    if(isset($_SESSION['unique_id']))  //TODO   checks if the session variable unique_id is set or not
    {
        include_once "config.php";  //TODO   includes the DB connecter
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);  //TODO   escapes special characters in a string for use in an SQL statement
        if(isset($logout_id))  //TODO   checks if the logout_id is set or not
        {
            $status = "Offline now";  //TODO   stores the status in the variable status
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");  //TODO   sql query to update the status of the user
            if($sql)  //TODO   checks if the sql is true
            {
                session_unset();  //TODO   frees all session variables currently registered
                session_destroy();  //TODO   destroys all of the data associated with the current session
                header("location: ../login.php");  //TODO   redirects to login.php
            }
        }
        else
        {
            header("location: ../users.php");  //TODO   redirects to users.php
        }
    }
    else
    {  
        header("location: ../login.php");  //TODO   redirects to login.php
    }
?>