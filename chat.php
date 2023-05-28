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
    $username = $_GET['username'];
    $status = $_GET['status'];
    ?>
    <!-- body things -->
    <body id="hero">

        <div class = "wrapperChat">
            <section class = "chat-area">
                <header>
                    <a href="chat.php" class = "back-icon"><i class = "fas fa-arrow-left"></i></a>
                    <img src = "img/img.jpg" alt = "">
                    <div class = "details">
                        <span id="username"><?php echo $username ?></span>
                        <p id="status"><?php echo $status ?></p>
                    </div>
                </header>
                <div class = "chat-box">
                    <div class = "chat outgoing">
                        <div class = "details">
                            <p>Ché olá tudo bem?.</p>
                        </div>
                    </div>
                    <div class = "chat incoming">
                        <img src = "img/img.jpg" alt = "">
                        <div class = "details">
                            <p>Comigo está tudo yah, e contio majé?</p>
                        </div>
                    </div>
                    <div class = "chat outgoing">
                        <div class = "details">
                            <p>Estou com os pés para a cova mas yah.</p>
                        </div>
                    </div>
                    <div class = "chat incoming">
                        <img src = "img/img.jpg" alt = "">
                        <div class = "details">
                            <p>Tá porra isso é mau yah, como aconteceu.</p>
                        </div>
                    </div>
                    <div class = "chat outgoing">
                        <div class = "details">
                            <p>Parti o antebraço a esgaçar o chouriço YY.</p>
                        </div>
                    </div>
                    <div class = "chat incoming">
                        <img src = "img/img.jpg" alt = "">
                        <div class = "details">
                            <p>Caralho desse Ramos, só faz merda.</p>
                        </div>
                    </div>
                    <div class = "chat outgoing">
                        <div class = "details">
                            <p>Memo aserio brro.</p>
                        </div>
                    </div>
                    <div class = "chat incoming">
                        <img src = "img/img.jpg" alt = "">
                        <div class = "details">
                            <p>Mas olha cheira meu pau ahah.</p>
                        </div>
                    </div>
                    <div class = "chat outgoing">
                        <div class = "details">
                            <p>Não obrigado, o medico não recomenda.</p>
                        </div>
                    </div>
                    <div class = "chat incoming">
                        <img src = "img/img.jpg" alt = "">
                        <div class = "details">
                            <p>Ai fiquei triste majé.</p>
                        </div>
                    </div>
                </div>
                <form action = "#" class = "typing-area">
                    <input type = "text" placeholder = "Type a message here...">
                    <button><i class = "fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>
    </body>
</html>