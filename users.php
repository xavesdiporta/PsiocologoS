<?php 

  session_start(); //creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
  include_once "php/config.php"; //includes the DB connecter
  if(!isset($_SESSION['unique_id'])) //checks if the session variable unique_id is set or not
  {
    header("location: login.php"); //redirects to login.php
  }

  include_once "header.php"; //includes the header.php file
?>


<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}"); //sql query
            if(mysqli_num_rows($sql) > 0) //returns the number of rows in a result set
            {
              $row = mysqli_fetch_assoc($sql); //fetches a result row as an associative array
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span> <!---- displays the first name and last name of the user ---->
            <p><?php echo $row['status']; ?></p> <!---- displays the status of the user ---->
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
