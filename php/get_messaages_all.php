<?php 
require 'verify.php';
require '../inc/connect.php';

$_SESSION['mainUserName'] = $_GET['sender'];

$sender = $_GET['sender'];
$receiver = 'Geral';

$query = "SELECT * 
          FROM chat_logs
          WHERE  user_receive = 'Geral' ORDER BY timestamp";


$result = mysqli_query($con, $query);
if($result)
{
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['user_send'] == $_SESSION['mainUserName'])
            {
                echo '<div class="chat outgoing">
                        <div class="details">
                            <p>'. $row['message'] .'</p>
                        </div>
                        </div>';
            }
            else
            {
                echo '<div class="chat incoming">
                        <img src="../inc/images/'.$receiver.'.jpg" alt="">
                        <div class="details">
                            <p>'. $row['message'] .'</p>
                        </div>
                        </div>';
            }
        }
    }else{
        echo "<br>Begin chatting!";
    } 
}else{
    echo "Error: ";
}
?>