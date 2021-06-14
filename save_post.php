<?php
    session_start();
    include_once 'dbConnect.php';

    $post_path = $_POST['postId'];
    //echo $post_path;

    $query = "select u_id from user_detail where u_uname='".$_SESSION['username']."';";
    $result = pg_query($db,$query);
    while($row = pg_fetch_row($result)){
        $user_id = $row[0];
    }

    $query1 = "select p_id from post where p_path='$post_path';";
    $result1 = pg_query($db,$query1);
    while($row1 = pg_fetch_row($result1)){
        $post_id = $row1[0];
    }

    $sql = "INSERT INTO save(p_id,u_id)VALUES('$post_id','$user_id');";
    if (pg_query($db,$sql)) {
        echo "Record updated successfully";
        
    } 
    else {
        echo "<br>Error updating record: ";
    }
?>