<?php
    session_start();  //TODO   creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
    include_once "config.php";  //TODO   includes the DB connecter
    $outgoing_id = $_SESSION['unique_id'];  //TODO   gets the unique_id of the user
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";  //TODO   sql query to select the users from the users table
    $query = mysqli_query($conn, $sql);  //TODO   executes the sql query
    $output = "";  //TODO   stores the output in the variable output
    if(mysqli_num_rows($query) == 0)  //TODO   checks if the number of rows in the query is equal to 0
    {
        $output .= "No users are available to chat";  //TODO   stores the output in the variable output
    }
    elseif(mysqli_num_rows($query) > 0)  //TODO   checks if the number of rows in the query is greater than 0
    {
        include_once "data.php";  //TODO   includes the data.php file, which contains the data of the users in the users table
    }
    echo $output;  //TODO   prints the output
?>