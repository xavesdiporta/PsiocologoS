<?php

  //TODO: Simple Data Base connection

  //!variables
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chat";

  $conn = mysqli_connect($hostname, $username, $password, $dbname); //!connects to the database
  if(!$conn){
    echo "Database connection error".mysqli_connect_error(); //!outputs the error message
  }
?>
