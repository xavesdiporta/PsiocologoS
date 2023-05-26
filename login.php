<?php
include 'connect.php';

session_start();
    $stmt = mysqli_prepare($con, "SELECT password FROM users WHERE username = ?");
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_execute($stmt);
      mysqli_stmt_bind_result($stmt, $hashedPassword);
      mysqli_stmt_fetch($stmt);
      if(password_verify($password, $hashedPassword)){
        echo "Login complete";
        $_SESSION['authenticated'] = true;
        header("Location: users.php");
      }
      else{
        echo "Error logging in  ";
        header("Location: login.html");
      }

?>