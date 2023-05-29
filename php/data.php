<?php

    while($row = mysqli_fetch_assoc($query))    //TODO    fetches a result row as an associative array
    {
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

                //TODO    selects the last message from the messages table

        $query2 = mysqli_query($conn, $sql2);   //TODO    sendes a query to the DB
        $row2 = mysqli_fetch_assoc($query2);    //TODO    fetches a result row as an associative array

        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";       //TODO    checks if the number of rows in a result set is greater than 0
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;               //TODO     returns the portion of string specified by the start and length parameters
        if(isset($row2['outgoing_msg_id']))   //TODO    checks if the variable is set or not
        {
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = ""; 
            //TODO checks if the outgoing_msg_id is equal to the outgoing_id, if yes then sets the variable to "You: "
        }
        else
        {
            $you = "";      //TODO   sets the variable to an empty string
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";   //TODO   checks if the status is equal to "Offline now", if yes then sets the variable to "offline"
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";      //TODO   checks if the outgoing_id is equal to the unique_id, if yes then sets the variable to "hide"

        $output .= '<a href="#" onclick="openChat(\'' . $row['unique_id'] . '\', \'' . $row['status'] . '\')">             
                <div class="content">                                                
                    <img src="php/images/' . $row['img'] . '" alt="">                 
                    <div class="details">                                           
                        <span>' . $row['fname'] . ' ' . $row['lname'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                </div>
                <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
            </a>';
    }
?>