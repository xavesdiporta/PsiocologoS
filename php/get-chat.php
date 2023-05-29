<?php 
    session_start();  //TODo   creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
    if(isset($_SESSION['unique_id']))    //TODO    checks if the session variable unique_id is set or not
    {
        include_once "config.php";   //TODO     include the DB conection
        $outgoing_id = $_SESSION['unique_id'];   //TODO    stores the unique_id of the user in the variable outgoing_id
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);    //TODO     escapes special characters in a string for use in an SQL statement
        $output = "";   //TODO    stores the output
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";

                //TODO  sql query to select the messages from the messages table and the users table where the outgoing_msg_id is equal to the outgoing_id 
                //TODO  and the incoming_msg_id is equal to the incoming_id or the outgoing_msg_id is equal to the incoming_id and the 
                //TODO  incoming_msg_id is equal to the outgoing_id and order the messages by msg_id

        $query = mysqli_query($conn, $sql);   //TODO    sendes a query to the DB
        if(mysqli_num_rows($query) > 0)  //TODO    checks if the number of rows in a result set is greater than 0
        {
            while($row = mysqli_fetch_assoc($query))  //TODO    fetches a result row as an associative array
            {
                if($row['outgoing_msg_id'] === $outgoing_id)  //TODO    checks if the outgoing_msg_id is equal to the outgoing_id
                {
                    $output .= '<div class="chat outgoing">   
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';  //TODO    stores the message in the output variable
                }
                else
                {
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['img'].'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';  //TODO    stores the message in the output variable
                }
            }
        }
        else
        {
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';  //TODO    stores the message in the output variable
        }
        echo $output;  //TODO    displays the output
    }
    else
    {
        header("location: ../login.php");  //TODO    redirects to login.php
    }

?>