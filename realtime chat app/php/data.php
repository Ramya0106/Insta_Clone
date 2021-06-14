<?php
    include_once "config.php";
    $sql3 = "select u_id from user_detail where u_uname='{$outgoing_id}'";
    $query3 = pg_query($conn, $sql3);
    $row3 = pg_fetch_row($query3);
    while($row = pg_fetch_assoc($sql)){
        $sql2 = "select * from message where (receiver_id = {$row['u_id']}
                or sender_id = {$row['u_id']}) and (sender_id = {$row3[0]}
                or receiver_id = {$row3[0]}) order by msg_id desc limit 1";
        $query2 = pg_query($conn, $sql2);
        $row2 = pg_fetch_assoc($query2);
        if(pg_num_rows($query2) > 0){
            $result = $row2['m_chat'];
        }
        else{
            $result = "No messages available";
        }

        //trimming message if word area more than 28
        (strlen($result) > 28) ? $msg = substr($result, 0, 28). '....' : $msg = $result;
        //adding you: text before msg if login id sends msg
        ($outgoing_id == $row2['sender_id']) ? $you = "You: " : $you = "";
        //checking user is online or offline
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

        $output .= ' <a href="chat.php?user_id='.$row['u_id'].'">
                        <div class="content">
                            <img src="../'. $row['u_photo'] .'" alt="">
                            <div class="details">
                                <span>'. $row['u_uname'] .'</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                        </div>
                        <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>