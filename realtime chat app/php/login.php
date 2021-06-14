<?php
    session_start();
    include_once "config.php";
    $email = pg_escape_string($_POST['email']);
    $password = pg_escape_string($_POST['password']);
    
    if(!empty($email) && !empty($password)){
        //checking email and password match in db table
        $sql = pg_query($conn, "select * from users where email = '{$email}' and password = '{$password}'");
        if(pg_num_rows($sql) > 0){ //user credentials matched
            $row = pg_fetch_assoc($sql);
            $status = "Active now";
            //updating user status to active now if logged in successfully
            $sql2 = pg_query($conn,"update users set status = '{$status}' where unique_id = {$row['unique_id']}");
            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id']; //using this session we need user unique_id in other php file 
                echo "success";
            }
        }
        else{
            echo "Email or Password is incorrect!";
        }
    }
    else{
        echo "All input fields required!";
    }
?>