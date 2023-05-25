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

        <div class = "wrapper">
            <section class = "form signup">
                <header>Realtime Chat App</header>
                <form action = "#"  enctype="multipart/form-data">
                    <div class = "error-txt"></div>
                    <div class = "name-details">
                        <div class = "field input">
                            <label>First Name</label>
                            <input type = "text" name = "fname" placeholder = "First name" required>
                        </div>
                        <div class = "field input">
                            <label>Last Name</label>
                            <input type = "text" name = "lname" placeholder = "Last name" required>
                        </div>
                    </div>
                    <div class = "field input">
                        <label>Email Address</label>
                        <input type = "text" name = "email" placeholder = "Enter your email" required>
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
                <div class = "link">Already signed up? <a href = "#">Login now</a></div>
            </section>
        </div>

        <script src = "inc/pass-show-hide.js"></script>
        <script src = "inc/signup.js"></script>

    </body>
</html>