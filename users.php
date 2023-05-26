<?php
require 'verify.php';
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


    <!-- body things -->
    <body>

        <div class = "wrapperUsers">
            <section class = "users">
                <header>
                    <div class = "content">
                        <img src = "img/img.jpg" alt = "">
                        <div class = "details">
                            <span>Psicologo Marco</span>
                            <p>Active Now</p>
                        </div>
                    </div>
                    <a href = "logout.php" class = "logout">Logout</a>
                </header>
                <div class = "search">
                    <span class = "text">Select an user to start chat</span>
                    <input type = "text" placeholder = "Enter name to search...">
                    <button><i class = "fas fa-search"></i></button>
                </div>
                <div class = "users-list">
                    <a href = "#" onclick="openChat('vitor')">
                        <div class = "content">
                            <img src = "img/img.jpg" alt = "">
                            <div class = "details">
                                <span>Vitor</span>
                                <p>O meu pai é padre</p>
                            </div>
                        </div>
                        <div class = "status-dot"><i class = "fas fa-circle"></i></div>
                    </a>
                    <a href = "#">
                        <div class = "content">
                            <img src = "img/img.jpg" alt = "">
                            <div class = "details">
                                <span>Pilas</span>
                                <p>No money no funny</p>
                            </div>
                        </div>
                        <div class = "status-dot"><i class = "fas fa-circle"></i></div>
                    </a>
                    <a href = "#">
                        <div class = "content">
                            <img src = "img/img.jpg" alt = "">
                            <div class = "details">
                                <span>Vasco</span>
                                <p>1/4 para dois</p>
                            </div>
                        </div>
                        <div class = "status-dot"><i class = "fas fa-circle"></i></div>
                    </a>
                    <a href = "#">
                        <div class = "content">
                            <img src = "img/img.jpg" alt = "">
                            <div class = "details">
                                <span>Antonino</span>
                                <p>Quem não mama não chora</p>
                            </div>
                        </div>
                        <div class = "status-dot"><i class = "fas fa-circle"></i></div>
                    </a>
                    <a href = "#">
                        <div class = "content">
                            <img src = "img/babyshark.jpg" alt = "">
                            <div class = "details">
                                <span>Velez</span>
                                <p>Caça-Kakayas</p>
                            </div>
                        </div>
                        <div class = "status-dot"><i class = "fas fa-circle"></i></div>
                    </a>
                    <a href = "#">
                        <div class = "content">
                            <img src = "img/img.jpg" alt = "">
                            <div class = "details">
                                <span>Marco</span>
                                <p>This is text message</p>
                            </div>
                        </div>
                        <div class = "status-dot"><i class = "fas fa-circle"></i></div>
                    </a>
                    <a href = "#">
                        <div class = "content">
                            <img src = "img/img.jpg" alt = "">
                            <div class = "details">
                                <span>Marco</span>
                                <p>This is text message</p>
                            </div>
                        </div>
                        <div class = "status-dot"><i class = "fas fa-circle"></i></div>
                    </a>
                    <a href = "#">
                        <div class = "content">
                            <img src = "img/img.jpg" alt = "">
                            <div class = "details">
                                <span>Marco</span>
                                <p>This is text message</p>
                            </div>
                        </div>
                        <div class = "status-dot"><i class = "fas fa-circle"></i></div>
                    </a>
                </div>
            </section>
        </div>
        <div id="chatContent"></div>
        <script src = "inc/users.js"></script>

    </body>
</html>