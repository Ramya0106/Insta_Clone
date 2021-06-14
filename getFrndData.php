<?php
    session_start();
    include_once 'dbConnect.php';
    $query = "select u_photo from user_detail where u_uname='".$_SESSION['frndName']."';";
    $query1 = "select p_path from post where u_id in(select u_id from user_detail where u_uname='".$_SESSION['frndName']."');";
    $query2 = "select count(following_id) from following_follower,user_detail where user_detail.u_id = following_follower.follower_id and u_uname ='".$_SESSION['frndName']."'  group by follower_id;";
    $query3 = "select count(follower_id) from following_follower,user_detail where user_detail.u_id = following_follower.following_id and u_uname ='".$_SESSION['frndName']."'  group by following_id;";
    $query4 = "select count(p_id) from post,user_detail where post.u_id=user_detail.u_id and u_uname='".$_SESSION['frndName']."';";
    $query5 = "select u_name from user_detail where u_uname='".$_SESSION['frndName']."'; ";

    if($result = pg_query($db,$query) and $result2 = pg_query($db,$query2) and $result3 = pg_query($db,$query3) and $result4 = pg_query($db,$query4) and $result5 = pg_query($db,$query5) and $result1 = pg_query($db,$query1)){
        $response = array();
        while($row = pg_fetch_row($result)){
            $profile = $row[0];
           // echo $row[0];
            $response['data']['profile'] = array(
                "dp" => $profile
            );
        }
        while ($row1 = pg_fetch_row($result1)){
            $pics=$row1[0];
            $profile=$row1[1];        
            $response['data']['images'][] = array(
                "pics" =>   $row1[0] 
            );
        }
        while($row2 = pg_fetch_row($result2))
        {
            $followers=$row2[0];
            $response['data']['count'] = array(
                "followers" => $followers  
            );

        }
        while($row3 = pg_fetch_row($result3))
        {
            $following=$row3[0];
            $response['data']['count_following'] = array(
                "following" => $following  
            );

        }
        while($row4 = pg_fetch_row($result4))
        {
            $post=$row4[0];
            $response['data']['count_pics'] = array(
                "post" => $post  
            );

        }
        while($row5 = pg_fetch_row($result5))
        {
            $fname = $row5[0];
            $response['data']['first'] = array(
                "fname" => $fname
            );
        }
        echo json_encode($response);
    }
    else {
        echo "issue in query";
    }
?>