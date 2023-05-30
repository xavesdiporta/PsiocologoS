<?php
require 'verify.php';
require '../inc/connect.php';
?>

<!DOCTYPE html>
<html>

     
    <!-- head things -->
    <head>
        <meta charset="utf-8" />
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Psicologo da Mosca - Login</title>
        <link rel = "stylesheet" href = "../inc/main.inc.css">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    </head>


    <?php 
    $userInfo = $_GET['username'];
    $userInfoArray = explode(",", $userInfo);
    $username = $userInfoArray[0];
    $status = $userInfoArray[1];
    ?>
    <!-- body things -->
    <body id="hero">
        
        <div class = "wrapperChat">
            <section class = "chat-area">
                <header>
                    <a href="chat.php" class = "back-icon"><i class = "fas fa-arrow-left"></i></a>
                    <img src="<?php echo "../inc/images/".$username.".jpg"; ?>" alt="">
                    <div class = "details">
                        <span id="username"><?php echo $username ?></span>
                        <p id="status"><?php echo $status ?></p>
                    </div>
                </header>
                <div class = "chat-box">
                    
                </div>
                <form action="#" class="typing-area" id="message-form">
                    <input type="text" placeholder="Type a message here...">
                    <button type="submit"><i class="fab fa-telegram-plane"></i></button>
                    <input id="userSender" value="<?php echo $_SESSION['mainUserName'] ?>" hidden>
                    <input id="userSender" value="<?php echo $username ?>" hidden>
                </form>


                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Handle form submission

                        var mainUsername = "<?php echo $_SESSION['mainUserName'] ?>";
                        var username = "<?php echo $username ?>";

                        $('#message-form').submit(function(e) {
                            e.preventDefault(); // Prevent default form submission

                            var message = $('input[type="text"]').val(); // Get the message from the input field

                            // Make an AJAX request to insert the message into the database
                            $.ajax({
                                url: 'insert_message.php', // Replace with the PHP file to handle database insertion
                                method: 'POST',
                                data: {
                                    message: message,
                                    mainUsername: mainUsername,
                                    username: username
                                },
                                success: function(response) {
                                    // Call getMessagesFromDatabase function to update the chat
                                    getMessagesFromDatabase();
                                },
                                error: function(xhr, status, error) {
                                    console.log(error); // Log any errors
                                }
                            });

                            $('input[type="text"]').val(''); // Clear the input field
                        });

                        // Function to get messages from the database and update the chat
                        function getMessagesFromDatabase() {
                            // Make an AJAX request to retrieve messages from the database
                            $.ajax({
                                    url: 'get_messages.php',
                                    method: 'GET',
                                    data: {
                                        sender: $_SESSION['mainUserName'],
                                        receiver: $username,
                                    },
                                success: function(response) {
                                    // Update the chat with the retrieved messages
                                    $('.chat-box').html(response);
                                },
                                error: function(xhr, status, error) {
                                    console.log(error); // Log any errors
                                }
                            });
                        }
                        });
                </script>
            </section>
        </div>
    </body>
</html>