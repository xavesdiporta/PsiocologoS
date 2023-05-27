
<?php

    session_start();
    include_once 'connect.php';

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $pwd = mysqli_real_escape_string($con, $_POST['password']);

    // Error handlers

    // Check for empty fields

    if (!empty($username) && !empty($pwd)) {
        $stmt = mysqli_prepare($con, "SELECT username FROM users WHERE username = ?" );
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_bind_result($stmt, $result);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_fetch($stmt);

        // check if email is already exists in the database or not
            if(mysqli_num_rows($result) > 0)
            {
                echo "$username - This username already exists!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name']; // getting user uploaded img name
                    $img_type = $_FILES['image']['type']; // getting user uploaded img type
                    $tmp_name = $_FILES['image']['tmp_name']; // this temporary name is used to save/move file in our folder

                    // lets explode image and get the last extension like jpg png
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); // here we get the extension of an user uploaded img file

                    $extensions = ['png', 'jpeg', 'jpg']; // these are some valid img ext and we've store them in array
                    if(in_array($img_ext, $extensions) === true){
                        // lets move the user uploaded img to our particular folder
                        $new_img_name = $username;
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)) {


                        //encrypt password, para fazer login basta comparar again usando password_verify($password, $hashedPassword)
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                            // lets insert all user data inside table
                            $sql2 = mysqli_query($con, "INSERT INTO users (username,password)
                                                        VALUES ('{$username}','{$hashedPassword}'");

                            if($sql2){
                                $sql3 = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php file
                                    echo "success";
                                }
                            }else{
                                echo "Something went wrong!";
                            }
                        }

                    } else{
                        echo "This extension file not allowed, Please choose a JPG or PNG file!";
                    }
                }else{
                    echo "Please select an image file!";
                }
            }
       

    } else{
        echo "all fields are required";
    }