<?php 
  session_start(); //creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
  include_once "php/config.php"; //include the DB conection
  if(!isset($_SESSION['unique_id'])) //checks if the session variable unique_id is set or not
  {
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?> <!-- include the header file -->
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']); //escapes special characters in a string for use in an SQL statement
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}"); //sql query
          if(mysqli_num_rows($sql) > 0) //returns the number of rows in a result set
          {
            $row = mysqli_fetch_assoc($sql); //fetches a result row as an associative array
          }
          else
          {
            header("location: users.php"); //redirects to users.php 
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span> <!---- displays the first name and last name of the user ---->
          <p><?php echo $row['status']; ?></p> <!---- displays the status of the user ---->
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area"> <!---- form to send the message ---->
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
