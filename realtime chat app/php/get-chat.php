<?php
    session_start();
    if(isset($_SESSION['username'])){
        include_once "config.php";
        $outgoing_id = pg_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = pg_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = "select * from message 
                left join user_detail on user_detail.u_id = message.sender_id
                where (sender_id = {$outgoing_id} and receiver_id = {$incoming_id})
                or (sender_id = {$incoming_id} and receiver_id = {$outgoing_id}) order by msg_id";
        $query = pg_query($conn, $sql);
        if(pg_num_rows($query) > 0){
            while($row = pg_fetch_assoc($query)){
                if($row['sender_id'] === $outgoing_id){ //if equals then it is a sender
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['m_chat'] .'</p>
                                    </div>
                                </div>';
                }
                else{ //he is reciever
                    $output .= '<div class="chat incoming">
                                    <img src="../'. $row['u_photo'] .'" alt="">
                                    <div class="details">
                                        <p>'. $row['m_chat'] .'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
    }
    else{
        header("../login.php");
    }
?>