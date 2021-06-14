<?php
    session_start();
    include_once 'dbConnect.php';

    $name = $_POST['name1'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $mail = $_POST['email'];
    $phone = $_POST['number'];
    $dob = $_POST['dob'];

    $query = "select u_id from user_detail where u_uname='".$_SESSION['username']."';";
    $result = pg_query($db,$query);
    while($row = pg_fetch_row($result)){
        $id = $row[0];
        // echo $id;
    }
    $query = "UPDATE user_detail SET u_uname='$username',u_name='$name',u_password='$password',u_email='$mail',u_phone='$phone',u_dob='$dob' WHERE u_id='$id';";
    if (pg_query($db,$query)) {
        echo "Record updated successfully";
        
    } 
    else {
        echo "<br>Error updating record: ";
    }
?>