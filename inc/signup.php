
<?php

    session_start();
    include_once 'connect.php';

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pwd = mysqli_real_escape_string($con, $_POST['password']);

    // Error handlers

    // Check for empty fields

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($pwd)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            // check if email is already exists in the database or not
            $sql = mysqli_query($con, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0)
            {
                echo "$email - This email already exists!";
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
                        $time = time(); // this will return us current time.. 
                                        // we need this time because when you uploading user img to in our folder we rename user file with current time
                                        // so all the img file will have a unique name
                        // lets move the user uploaded img to our particular folder
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)) {
                            $status = "Active now"; // once user signed up then his status will be active now"
                            $random_id = rand(time(), 10000000); // creating random id for user

                            // lets insert all user data inside table
                            $sql2 = mysqli_query($con, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                        VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$pwd}', '{$new_img_name}', '{$status}')");

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
            echo "$email - This is not a valid email";
        }
       

    } else{
        echo "all fields are required";
    }