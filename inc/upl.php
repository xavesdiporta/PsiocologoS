<?php

include 'connect.php';

    if (isset($_POST['submit']))    {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0)   {
                if ($fileSize < 1000000)    {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    //send the image to the database
                    $sql = "INSERT INTO chat_logs (user_send, user_receive, message, timestamp) VALUES ('$mainUserName', '$username', '$fileNameNew', '$time')";
                    mysqli_query($con, $sql);
                    echo $fileNameNew;
                    //send the image to the uploads folder
                    $fileDestination = 'images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    //sql query to get the image from the database
                    $sql = "SELECT * FROM img_name WHERE img='$fileNameNew'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    //print the image that was get from the database
                    echo "<img src='images/".$row['img']."'>";
                    header("Location yourmum.html");
                }   else    {
                    echo "Your file is too big!";
                }
            }   else    {
                echo "There was an error uploading your file!";
            }
        }   else    {
            echo "You cannot upload files of this type!";
        }
    }


    echo "Upload";