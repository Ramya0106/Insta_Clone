<?php
    session_start();
    include_once 'dbConnect.php';

    $email = $_SESSION['email'];
    $pass = $_GET['password'];
    // echo $email;

    $query = "update user_detail set u_password='$pass' where u_email = '$email';";
    $result = pg_query($db,$query);
    if($result){
       header("Location:login.php?register=successPassword");
       session_unset();
       session_destroy();
    }
?>