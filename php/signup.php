<?php
    session_start();  //TODO   creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
    include_once "config.php";  //TODO   includes the DB connecter
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);  //TODO   escapes special characters in a string for use in an SQL statement
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);  //TODO   escapes special characters in a string for use in an SQL statement
    $email = mysqli_real_escape_string($conn, $_POST['email']);  //TODO   escapes special characters in a string for use in an SQL statement 
    $password = mysqli_real_escape_string($conn, $_POST['password']);  //TODO   escapes special characters in a string for use in an SQL statement
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password))  //TODO   checks if the fields are empty or not
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))  //TODO   checks if the email is valid or not
        { 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

            //TODO   sql query to select the users from the users table

            if(mysqli_num_rows($sql) > 0)  //TODO   checks if the number of rows in the query is greater than 0
            {
                echo "$email - This email already exist!";  //TODO   prints the email already exist
            }
            else  
            { 
                if(isset($_FILES['image']))  //TODO   checks if the image is set or not
                {
                    $img_name = $_FILES['image']['name'];  //TODO   stores the name of the image in the variable img_name
                    $img_type = $_FILES['image']['type'];  //TODO   stores the type of the image in the variable img_type
                    $tmp_name = $_FILES['image']['tmp_name'];  //TODO   stores the temporary name of the image in the variable tmp_name
                    
                    $img_explode = explode('.',$img_name);  //TODO   splits the string into an array
                    $img_ext = end($img_explode);  //TODO   gets the last element of the array
    
                    $extensions = ["jpeg", "png", "jpg"];  //TODO   stores the extensions in the variable extensions
                    if(in_array($img_ext, $extensions) === true)  //TODO   checks if the image extension is valid or not
                    {
                        $types = ["image/jpeg", "image/jpg", "image/png"];  //TODO   stores the types in the array types
                        if(in_array($img_type, $types) === true)  //TODO   checks if the image type is valid or not
                        {
                            $time = time();  //TODO   gets the current time
                            $new_img_name = $time.$img_name;  //TODO   stores the new image name in the variable new_img_name
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name))  //TODO   checks if the image is uploaded or not
                            {
                                $ran_id = rand(time(), 100000000);  //TODO   gets the random id
                                $status = "Active now";  //TODO   stores the status in the variable status
                                $encrypt_pass = md5($password);  //TODO   encrypts the password
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");

                                //TODO   sql query to insert the data into the users table

                                if($insert_query)  //TODO   checks if the data is inserted or not
                                {
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");  
                                    
                                    //TODO   sql query to select the users from the users table

                                    if(mysqli_num_rows($select_sql2) > 0)  //TODO   checks if the number of rows in the query is greater than 0
                                    {
                                        $result = mysqli_fetch_assoc($select_sql2);  //TODO   fetches a result row as an associative array
                                        $_SESSION['unique_id'] = $result['unique_id'];  //TODO   stores the unique id in the session
                                        echo "success";
                                    }
                                    else
                                    {
                                        echo "This email address not Exist!";
                                    }
                                }
                                else
                                {
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }
                        else
                        {
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }
                    else
                    {
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }
        else
        {
            echo "$email is not a valid email!";
        }
    }
    else
    {
        echo "All input fields are required!";
    }
?>