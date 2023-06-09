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
        <link rel = "stylesheet" href = "../inc/css.css">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    </head>
    
    
    <?php 
    $userInfo = $_GET['username'] ?? ''; // Set a default empty value if $_GET['username'] is not set
    $userInfoArray = explode(",", $userInfo);
    
    if (count($userInfoArray) >= 1) {
        $username = $userInfoArray[0];
    } else {
        // Handle the case when the array doesn't have enough elements
        // You can set default values or display an error message
        $username = '';
        $status = '';
        // Display an error message or redirect to an error page
        echo "Invalid username format!";
        exit;
    }

    ?>
    <!-- body things -->
    <body id="hero">
        
        <div class = "wrapperChat">
            <section class = "chat-area">
                <header>
                    <img src="<?php echo "../img/disocrd.png"?>" alt="">
                    <div class = "details">
                        <span id="username">Geral Chat</span>
                    </div>
                </header>
                <div class = "chat-box">
                    
                    </div>
                    <form action="#" class="typing-area" id="message-form" method="post">
                        <input type="text" name="message" placeholder="Type a message here...">
                        <input type="hidden" name="mainUserName" value="<?php echo $_SESSION['mainUserName']; ?>">
                        <input type="hidden" name="username" value="<?php echo "Geral"; ?>">
                        <button type="submit"><i class="fab fa-telegram-plane"></i></button>
                    </form>
                    
                    
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="../inc/users.js"></script>
                    <script>
                    $(document).ready(function() {
                    // Handle form submission
                    let mainUserName = "<?php echo $_SESSION['mainUserName']; ?>";
                    let userName = "<?php echo $username; ?>";
                    $('#message-form').submit(function(e) {
                        e.preventDefault(); // Prevent default form submission
                        
                        let message = $('input[name="message"]').val(); // Get the message from the input field
                        mainUserName = $('input[name="mainUserName"]').val(); // Get the mainUserName value
                        userName = $('input[name="username"]').val(); // Get the username value
                        console.log(message + " " + mainUserName + " " + userName)
                        
                        // Make an AJAX request to insert the message into the database
                        $.ajax({
                            url: 'insert_all_message.php',
                        method: 'POST',
                        data: {
                            message: message,
                            mainUsername: mainUserName,
                            username: userName,
                        },
                        success: function(response) {
                            // Call getMessagesFromDatabase function to update the chat
                            getMessagesFromDatabase();
                            console.log("sucess");
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
                            url: 'get_messaages_all.php',
                            method: 'GET',
                            data: {
                                sender: mainUserName,
                                receiver: userName,
                            },
                        success: function(response) {
                            // Update the chat with the retrieved messages
                            $('.chat-box').html(response);
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.log(error); // Log any errors
                        }
                    });
                }
                getMessagesFromDatabase();
                setInterval(getMessagesFromDatabase, 8000);
                });


                </script>


                    

            </section>
        </div>
    </body>
</html>