<?php
    session_start();
    if(isset($_SESSION['username'])){
        include_once "config.php";
        $outgoing_id = pg_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = pg_escape_string($conn, $_POST['incoming_id']);
        $message = pg_escape_string($conn, $_POST['message']);

        // $outgoing_id = $_POST['outgoing_id'];
        // $incoming_id = $_POST['incoming_id'];
        // $message = $_POST['message'];

        if(!empty($message)){
            $sql = pg_query($conn, "insert into message (receiver_id, sender_id, m_chat)
                            values ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }
    else{
        header("../login.php");
    }
?>