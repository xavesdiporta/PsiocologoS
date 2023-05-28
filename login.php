<?php
include 'connect.php';

session_start();
    $stmt = mysqli_prepare($con, "SELECT password FROM users WHERE {$_POST['username']} = ?");
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_execute($stmt);
      mysqli_stmt_bind_result($stmt, $hashedPassword);
      mysqli_stmt_fetch($stmt);
      if(password_verify($_POST['password'], $hashedPassword)){
        echo "Login complete";
        $_SESSION['authenticated'] = true;
        $_SESSION['mainUserName']; //introduzir nome que retorna da base dados para utilizar no website em geral
        $_SESSION['mainUserStatus']; //introduzir status que retorna da base dados para utilizar no website em geral
        header("Location: users.php");
      }
      else{
        echo "Error logging in  ";
        header("Location: login.html");
      }

?>