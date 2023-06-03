<?php 
require '../inc/connect.php';



$sender = $_GET['sender'];
$receiver = $_GET['receiver'];

$query = "SELECT * FROM chat_logs WHERE user_send = $sender && user_receive != $sender ORDER BY timestamp";


$result = mysqli_query($con, $query);
if($result)
{
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['user_send'] == $sender)
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