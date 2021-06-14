<?php
    session_start();
    include_once('dbConnect.php');
    
    $followerName = $_POST['followingName'];
    
    $sql = "select u_id from user_detail WHERE u_uname='".$_SESSION['username']."';";
    $result = pg_query($db, $sql);
    while($row = pg_fetch_row($result))
    {
        $frndid = $row[0];
    }

    $sql1 = "select u_id from user_detail WHERE u_uname='$followerName';";
    $result1 = pg_query($db, $sql1);
    while($row1 = pg_fetch_row($result1))
    {
        $selfid = $row1[0];
    }

    $sql2 = "delete from following_follower WHERE following_id='$frndid' and follower_id='$selfid ';";
    if(pg_query($db, $sql2)){
        echo"done";
    }
    else{
        echo"not";
    }

?>