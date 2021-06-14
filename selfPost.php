<?php
    session_start();
    include_once('dbConnect.php');
    
    $postName = $_POST['postName'];
    $_SESSION['photo_name'] = $postName;
    echo $_SESSION['photo_name'];
    // $sql = "select p_path,u_photo,p_like,p_comment,p_time,u_uname from user_detail,post where user_detail.u_id = post.u_id and p_path='$postName';";
    // $result = pg_query($db, $sql);
    // $response = array();
    // while($row = pg_fetch_row($result))
    // {
    //     $photo = $row[0];
    //     $profile = $row[1];
    //     $like = $row[2];
    //     $comment = $row[3];
    //     $time = $row[4];
    //     $username = $row[5];

    //     $response['data']['selfPost'] = array(
    //         "photo" => $photo,
    //         "profile" => $profile,
    //         "like" => $like,
    //         "comment" => $comment,
    //         "time" => $time,
    //         "username" => $username
    //     );
    //     echo json_encode($response);
    // }
?>