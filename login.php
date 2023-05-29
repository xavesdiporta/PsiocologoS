<?php
include 'inc/connect.php';

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
        echo "<br><span style='color: red; font-family: verdana; font-size: 30px; background-color: rgba(170,0,0,0.1); height: 40px; justify-content: center; text-align: center; vertical-align: center; '>Error logging in</span>";
      }

?>