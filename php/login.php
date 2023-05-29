<?php 
    session_start();  //TODO   creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
    include_once "config.php";  //TODO   includes the DB connecter
    $email = mysqli_real_escape_string($conn, $_POST['email']);  //TODO   escapes special characters in a string for use in an SQL statement
    $password = mysqli_real_escape_string($conn, $_POST['password']);  //TODO   escapes special characters in a string for use in an SQL statement
    if(!empty($email) && !empty($password))  //TODO   checks if the email and password are empty
    {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");  //TODO   sql query to select the user from the users table
        if(mysqli_num_rows($sql) > 0)  //TODO   returns the number of rows in a result set
        {
            $row = mysqli_fetch_assoc($sql);  //TODO   fetches a result row as an associative array
            $user_pass = md5($password);  //TODO   encrypts the password
            $enc_pass = $row['password'];  //TODO   stores the encrypted password in the variable enc_pass  
            if($user_pass === $enc_pass)   //TODO   checks if the user_pass is equal to the enc_pass
            {  
                $status = "Active now";  //TODO   stores the status in the variable status
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");  //TODO   sql query to update the status of the user
                if($sql2)  //TODO   checks if the sql2 is true
                {
                    $_SESSION['unique_id'] = $row['unique_id'];  //TODO   stores the unique_id of the user in the session variable unique_id
                    echo "success";
                }
                else
                {
                    echo "Something went wrong. Please try again!";  
                }
            }
            else
            {
                echo "Email or Password is Incorrect!";     
            }
        }
        else
        {
            echo "$email - This email not Exist!";
        }
    }
    else
    {
        echo "All input fields are required!";
    }
?>