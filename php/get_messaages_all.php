<?php 
require 'verify.php';
require '../inc/connect.php';

$_SESSION['mainUserName'] = $_GET['sender'];

$sender = $_GET['sender'];
$receiver = 'Geral';

$query = "SELECT * 
FROM all_chat_logs
WHERE user_send = '$sender' AND user_receive = 'Geral'
OR user_send NOT LIKE '$sender' ORDER BY timestamp";


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
            elseif($row['user_send'] != $_SESSION['mainUserName'])
            {
                echo '<div class="chat incoming">
                        <img src="../inc/images/'.$sender.'.jpg" alt="">
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