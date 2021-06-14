<?php
    session_start();
    include_once('dbConnect.php');
    
    $path="images/image1.png";
    
    $sql = "UPDATE user_detail SET u_photo='$path' WHERE u_uname='".$_SESSION['username']."';";
    $result = pg_query($db, $sql);
    while($row = pg_fetch_row($result))
    {
        echo $row;
    }

?>