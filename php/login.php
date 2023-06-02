<?php
session_abort();
session_start();
include_once '../inc/connect.php';

$password = mysqli_real_escape_string($con, $_POST['password']);
$username = mysqli_real_escape_string($con, $_POST['username']);

if(!empty($username) || !empty($password))
{
    
    //TODO Login anonimo
    if(isset($_POST['anonymous'])){
        // Handle login with username and passwordq
            $stmt = mysqli_prepare($con, "SELECT password FROM users WHERE username = ?");
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_execute($stmt);
            mysqli_stmt_bind_result($stmt, $hashedPassword);
            mysqli_stmt_fetch($stmt);
            if (password_verify($password, $hashedPassword)) {
                //password verification sucessful
                $_SESSION['authenticated'] = true;
                $_SESSION['mainUserName'] = $username;
                $_SESSION['mainUserStatus'] = "Anonymous";
                mysqli_stmt_close($stmt);
                $sql = "UPDATE users SET status = 'Anonymous' WHERE username = '$username'";
                $query = mysqli_query($con, $sql);
                header("Location: users.php");
                exit;
            } else {
                //incorrect password
                include 'login.html';
                echo "<p style='font-size: 17px;font-weight: 400;border-radius: 5px; border: 2px solid black; width: 175px; height: 50px; color: white; background : red; text-align: center;padding-top: 12px; margin-bottom: 30px;'>ERROR LOGGING IN</p>";
                exit;
            }
    }
    //TODO Login normal
    elseif(!empty($_POST['username'])){
        // Handle login with username and passwordq
        if (!empty($password)) {
            
            $stmt = mysqli_prepare($con, "SELECT password FROM users WHERE username = ?");
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_execute($stmt);
            mysqli_stmt_bind_result($stmt, $hashedPassword);
            mysqli_stmt_fetch($stmt);
            if (password_verify($password, $hashedPassword)) {
                //password verification sucessful
                $_SESSION['authenticated'] = true;
                $_SESSION['mainUserName'] = $username;
                $_SESSION['mainUserStatus'] = "Active";
                mysqli_stmt_close($stmt);
                $sql = "UPDATE users SET status = 'Active' WHERE username = '$username'";
                $query = mysqli_query($con, $sql);
                header("Location: users.php");
                exit;
            } else {
                //incorrect password
                include 'login.html';
                echo "<p style='font-size: 17px;font-weight: 400;border-radius: 5px; border: 2px solid black; width: 175px; height: 50px; color: white; background : red; text-align: center;padding-top: 12px; margin-bottom: 30px;'>ERROR LOGGING IN</p>";
                exit;
            }
        } else {
            //password is empty
            include 'login.html';
            echo "<p style='font-size: 17px;font-weight: 400;border-radius: 5px; border: 2px solid black; width: 175px; height: 50px; color: white; background : red; text-align: center;padding-top: 12px; margin-bottom: 30px;'>Password is required</p>";
            exit;
        }
    }
    else{
        include 'login.html';
        echo "<p style='font-size: 17px;font-weight: 400;border-radius: 5px; border: 2px solid black; width: 175px; height: 50px; color: white; background : red; text-align: center;padding-top: 12px; margin-bottom: 30px;'>Username is empty</p>";
    }
} else{
    header("Location: login.html");
}