<?php 
$sender = $_GET['sender'];
$receiver = $_GET['receiver'];

$query = "SELECT * 
FROM messages
WHERE (user_send = {$sender} AND user_receive = {$receiver})
OR (user_send  = {$receiver} AND user_receive = {$sender}) ORDER BY timestamp";


$result = mysqli_query($con, $query);

if($result)
{
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['user_send'] === $sender)
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
                    <img src="../php/images/'.$receiver.'.jpg" alt="">
                    <div class="details">
                        <p>'. $row['message'] .'</p>
                    </div>
                    </div>';
        }
    }
}
?>