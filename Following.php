<?php
    session_start();
    include_once 'dbConnect.php';
    $username = $_SESSION['username'];
    $follow = $_POST['section'];

    $query = "select u_id from user_detail where u_uname='".$_SESSION['username']."';";
    $result = pg_query($db,$query);
    while($row = pg_fetch_row($result)){
        $id = $row[0];
    }
    
    $query1 = "select u_id from user_detail where u_uname='$follow';";
    $result1 = pg_query($db,$query1);
    while($row1 = pg_fetch_row($result1)){
        $id1 = $row1[0];
    }
    
    $sql = "INSERT INTO following_follower(following_id,follower_id)VALUES('$id','$id1');";
    if (pg_query($db,$sql)) {
        echo "Record updated successfully";
        
    } 
    else {
        echo "<br>Error updating record: ";
    }
    $sql = "INSERT INTO `insta_following`(`username`,`following`) VALUES ('$username','$following');";

?>