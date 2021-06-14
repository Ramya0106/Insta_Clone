<?php
    session_start();
    include_once 'dbConnect.php';

    $email = $_GET['mail'];
    $password = $_GET['password'];
    // echo $email." ".$password;
    $query = "select u_password from user_detail where u_email = '$email';";
    $query1 = "select u_uname from user_detail where u_email = '$email';";

    $result = pg_query($db,$query);
    $result1 = pg_query($db,$query1);

    $row1 = pg_fetch_row($result1);

    if($row = pg_fetch_row($result)){
        if($row[0] == $password){
            header("Location:Home.php");
            $_SESSION['username'] = $row1[0];
            $status = 'Active now';
            $query2 = pg_query($db, "update user_detail set status = '{$status}' where u_uname = '{$row1[0]}'");
        }
        else{
            header("Location:login.php?register=loginError");
        }
	}
    else{
        header("Location:login.php?register=loginError");
    }
?>