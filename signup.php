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
    <body id="bodyForm">

        <div class = "wrapperForm" id="wrapperForm">
            <section class = "form signup">
                <header>Realtime Chat App</header>
                <form action = "inc/signup.php"  enctype="multipart/form-data">
                    <div class = "error-txt"></div>
                    <div class = "name-details">
                        <div class = "field input">
                            <label>username</label>
                            <input type = "text" name = "username" placeholder = "First name" required>
                        </div>
                    </div>
                    <div class = "field input">
                        <label>Password</label>
                        <input type = "password" name = "password" placeholder = "Enter new password" required>
                        <i class = "fas fa-eye"></i>
                    </div>
                    <div class = "field image">
                        <label>Select Image</label>
                        <input type = "file" name = "image" required>
                    </div>
                    <div class = "field button">
                        <input type = "submit" value = "Continue to Chat">
                    </div>
                </form>
                <div class = "link">Already signed up? <a href = "login.html">Login now</a></div>
            </section>
        </div>

        <script src = "inc/pass-show-hide.js"></script>
        <script src = "inc/signup.js"></script>

    </body>
</html>