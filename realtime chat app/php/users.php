<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['username'];
    $sql = pg_query($conn, "select * from user_detail where not u_uname = '{$outgoing_id}'");
    $output = "";
    if(pg_num_rows($sql) == 1){ //if onlyone row in db then it is the current user logged in
        //$output .= "No users available to chat";
        include "data.php";
    }
    elseif(pg_num_rows($sql) > 0){ //else show all active users
        include "data.php";
    }
    echo $output;
?>