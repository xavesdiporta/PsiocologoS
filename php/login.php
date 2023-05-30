<?php
include '../inc/connect.php';

session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = mysqli_prepare($con, "SELECT password FROM users WHERE username = ?");
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_execute($stmt);
      mysqli_stmt_bind_result($stmt, $hashedPassword);
      mysqli_stmt_fetch($stmt);
      if(password_verify($_POST['password'], $hashedPassword)){
        echo "Login complete";
        $_SESSION['authenticated'] = true;
        $_SESSION['mainUserName'] = $username; //introduzir nome que retorna da base dados para utilizar no website em geral
        $_SESSION['mainUserStatus'] = "Active";//introduzir status que retorna da base dados para utilizar no website em geral
        if($_SESSION['authenticated'] = true){
          mysqli_stmt_close($stmt); // Close the previous statement
          $sql = "UPDATE users SET status = 'Active' WHERE username = '$username'";
          $query = mysqli_query($con, $sql);
        }
        header("Location: users.php");
      }
      else{
        include 'login.html';
        echo "<p style='font-size: 17px;font-weight: 400;border-radius: 5px; border: 2px solid black; width: 175px; height: 50px; color: white; background : red; text-align: center;padding-top: 12px; margin-bottom: 30px;
        '>ERROR LOGGING IN</p>";
      }

?>