<?php
    session_start();
    include_once 'dbConnect.php';

    $id = $_POST['value'];
    $action = $_POST['message'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');
    $flag = "0";
    $username = rtrim($_SESSION['username']);

    $sql="SELECT p_comment from post where p_path = '$id'; ";
    if(pg_query($db,$sql)){
        $result = pg_query($db,$sql);
        while($row = pg_fetch_row($result)){
            $json = $row[0];
            $decode_json = json_decode($json);
            $decode_json[] = ['username' => $username, 'cmnt' => $action,'time'=>$date,'flag'=>$flag];
            $json1 = json_encode($decode_json);
            echo $json1;
        }
    }
    $sql1 = "UPDATE post set p_comment='$json1' where p_path='$id';";
    pg_query($db,$sql1);
?>