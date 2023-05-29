<?php
require 'verify.php';
require 'inc/connect.php';
?>

<!DOCTYPE html>
<html>

     
    <!-- head things -->
    <head>
        <meta charset="utf-8" />
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Psicologo da Mosca - Login</title>
        <link rel = "stylesheet" href = "inc/main.inc.css">
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
                    <img src="<?php echo "inc/images/".$username.".jpg"; ?>" alt="">
                    <div class = "details">
                        <span id="username"><?php echo $username ?></span>
                        <p id="status"><?php echo $status ?></p>
                    </div>
                </header>
                <div class = "chat-box">
                    <?php
                        if($chat == "outgoing"){
                            echo "<div class = 'chat outgoing'>
                                        <div class = 'details'>
                                            <p>Ché olá tudo bem?.</p>
                                        </div>
                                    </div>";
                        }
                        else if($chat == "incoming"){
                            echo"
                            <div class = 'chat incoming'>
                                <img src = 'inc/images/".$username.".jpg' alt = ''>
                                <div class = 'details'>
                                    <p>Comigo está tudo yah, e contigo majé?</p>
                                </div>
                            </div>";
                        }
                    ?>
                </div>
                <form action = "#" class = "typing-area">
                    <input type = "text" placeholder = "Type a message here...">
                    <button><i class = "fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>
    </body>
</html>