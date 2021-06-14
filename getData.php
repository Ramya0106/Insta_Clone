<?php
    session_start();
    include_once 'dbConnect.php';
    $query = "select u_photo from user_detail where u_uname='".$_SESSION['username']."';";
    $query1 ="select p_path,u_photo from user_detail,post where user_Detail.u_id=post.u_id and user_detail.u_id=(select u_id from user_detail where u_uname='".$_SESSION['username']."');";
    $query2 = "select count(following_id) from following_follower,user_detail where user_detail.u_id = following_follower.follower_id and u_uname ='".$_SESSION['username']."'  group by follower_id;";
    $query3 = "select count(follower_id) from following_follower,user_detail where user_detail.u_id = following_follower.following_id and u_uname ='".$_SESSION['username']."'  group by following_id;";
    $query4 = "select count(p_id) from post,user_detail where post.u_id=user_detail.u_id and u_uname='".$_SESSION['username']."';";
    $query5 = "select u_name from user_detail where u_uname='".$_SESSION['username']."'; ";
    // $query6 = "select u_uname,u_photo from user_detail where u_uname not in(select u_uname from user_detail where u_uname='".$_SESSION['username']."');";
    $query6 = "select u_uname,u_photo from user_detail where u_uname not in(select u_uname from user_detail where u_uname='".$_SESSION['username']."')INTERSECT select u_uname,u_photo from user_detail where u_id not in(select follower_id from following_follower where following_id in(select u_id from user_detail where u_uname='".$_SESSION['username']."'));";
    $query7 = "(select user_detail.u_uname,p_path,u_photo,p_time,p_like,p_comment from user_detail,post where user_detail.u_id=post.u_id  and user_detail.u_id =(select u_id from user_detail where u_uname = '".$_SESSION['username']."')) union (select user_detail.u_uname,p_path,u_photo,p_time,p_like,p_comment from user_detail,post where user_detail.u_id=post.u_id  and user_detail.u_id in(select follower_id from following_follower where following_id =(select u_id from user_detail where u_uname='".$_SESSION['username']."')))order by p_time desc;";
    $query8 = "select u_name,u_password,u_email,u_phone,u_dob,u_uname,u_photo from user_detail where u_uname='".$_SESSION['username']."';";
    $query9 = "select user_detail.u_uname,u_photo,p_path,p_like,p_comment from user_detail,post where user_detail.u_id=post.u_id and user_detail.u_id in(select u_id from user_detail where u_uname='".$_SESSION['username']."');";
    $query10 = "select u_id from user_detail where u_uname='".$_SESSION['username']."';";
    $result10 = pg_query($db,$query10);
    while($row10 = pg_fetch_row($result10)){
        $id = $row10[0];
    }
    $query11 = "select u_photo,u_uname from user_detail where u_id in( select follower_id from following_follower where following_id = $id) order by u_uname;";
    $query12 = "select u_photo,u_uname from user_detail where u_id in( select following_id from following_follower where follower_id = $id) order by u_uname;";
    $query13 = "select p_path from post where p_id in(select p_id from save where u_id in(select u_id from user_detail where u_uname='".$_SESSION['username']."'));";

    if($result = pg_query($db,$query) and $result1 = pg_query($db,$query1) and $result2 = pg_query($db,$query2) and $result3 = pg_query($db,$query3) and $result4 = pg_query($db,$query4) and $result5 = pg_query($db,$query5) and $result6 = pg_query($db,$query6) and $result7 = pg_query($db,$query7) and $result8 = pg_query($db,$query8) and $result9 = pg_query($db,$query9) and $result11 = pg_query($db,$query11) and $result12 = pg_query($db,$query12) and $result13 = pg_query($db,$query13)){
        $response = array();
        while($row = pg_fetch_row($result)){
            $profile = $row[0];
           // echo $row[0];
            $response['data']['profile'] = array(
                "dp" => $profile
            );
        }

        while($row11 = pg_fetch_row($result11)){
            $profile2 = $row11[0];
            $frnd_name = $row11[1];
           // echo $row[0];
            $response['data']['following'][] = array(
                "profile2" => $profile2,
                "frnd_name" => $frnd_name
            );
        }

        while($row12 = pg_fetch_row($result12)){
            $profile3 = $row12[0];
            $frnd_name2 = $row12[1];
           // echo $row[0];
            $response['data']['follower'][] = array(
                "profile3" => $profile3,
                "frnd_name2" => $frnd_name2
            );
        }

        while($row13 = pg_fetch_row($result13)){
            $savePath = $row13[0];
            $response['data']['save'][] = array(
                "savePath" => $savePath
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
        while($row6 = pg_fetch_row($result6))
        {
            $frnds_username = $row6[0];
            $frnds_profile = $row6[1];
            $response['data']['info'][] = array(
                "frnds_username" =>  $frnds_username,
                "frnds_profile" => $frnds_profile
            );
        }
        while($row7 = pg_fetch_row($result7))
        {
            $username1 = $row7[0];
            $pics1 = $row7[1];
            $profile1 = $row7[2];
            $time = $row7[3];
            $post_like = $row7[4];
            $post_cmnt =$row7[5];
            $response['data']['feed'][] = array(
                "username1" =>  $username1,
                "pics1" => $pics1,
                "profile1" => $profile1,
                "time" => $time,
                "post_like" => $post_like,
                "post_cmnt" => $post_cmnt
            );
        }
        while($row8 = pg_fetch_row($result8))
        {
            $username2 = $row8[0];
            $password = $row8[1];
            $email = $row8[2];
            $phone = $row8[3];
            $dob = $row8[4];
            $name = $row8[5];
            $profile1 = $row8[6];
            $response['data']['edit'] = array(
                "username2" => $username2,
                "password" => $password,
                "email" => $email,
                "phone" => $phone,
                "dob" => $dob,
                "name1" => $name,
                "profile1" => $profile1
            );
        }
        $Activity_Array = array();
        $Activity_Array_Done = array();
        $k = 0;
        $count = 0;
        while($row9 = pg_fetch_row($result9))
        {
            $pics3 = $row9[2];
            $flag =0;
            $notification_like = $row9[3];
            // echo $notification_like."<br>";
            $Decode_notification_like = json_decode($notification_like,true);
            // echo"decode data".$Decode_notification_like."<br>";
            foreach($Decode_notification_like as &$a){
                // echo"decode data".$a['flag']."<br>";

                if($a['flag'] == 0){
                //    echo"decode data".$a['username']."<br>";
                    $a['flag'] = 1;
                    $count = $count +1;
                    $flag =1;
                }
                // echo"decode data after".$a['flag']."<br>";
            }
            $encode_notification_like = json_encode($Decode_notification_like);
            // echo $encode_notification_like."<br>";
            if($flag == 1)
            {
                $sql_noti = "UPDATE post set p_like='$encode_notification_like' where p_path='$pics3'; ";
                pg_query($db, $sql_noti);
            }
            // echo $count."<br>".$flag."<br>";



            $post_like3 = $row9[3]; 
            $decode_like = json_decode($post_like3);
            $i=0;
            foreach($decode_like as $Done){
                $decode_like[$i]->pics3=$row9[2];
                $i=$i+1;
            }
            $encode_like = json_encode($decode_like);
            $flag_cmnt =0;
            $notification_cmnt = $row9[4];
            // echo $notification_cmnt."hey<br>";
            $Decode_notification_cmnt = json_decode($notification_cmnt,true);
            // echo"decode data".$Decode_notification_cmnt."<br>";
            foreach($Decode_notification_cmnt as &$a){
                // echo"decode data".$a['username']."<br>";
                if($a['flag'] == 0){
                    $a['flag'] = 1;
                    $count = $count +1;
                    $flag_cmnt =1;
                }
            }
            $encode_notification_cmnt = json_encode($Decode_notification_cmnt);
            // echo $encode_notification_cmnt."heyy<br>";
            if($flag_cmnt == 1)
            {
                $sql_noti1 = "UPDATE post set p_comment='$encode_notification_cmnt' where p_path='$pics3'; ";
                pg_query($db, $sql_noti1);
            }
            $post_cmnt3 = $row9[4];
            $decode_cmnt = json_decode($post_cmnt3);
            $j=0;
            foreach($decode_cmnt as $Done){
                $decode_cmnt[$j]->pics3=$row9[2];
                 $j=$j+1;
            }
            $encode_cmnt = json_encode($decode_cmnt);
            // echo $encode_cmnt."here<br>";    
            //  echo $encode_like."here<br>";

            $Activity_Array1=json_decode($encode_like,true);
            // echo $Activity_Array1."array1<br>";
            $Activity_Array2=json_decode($encode_cmnt,true);
            if($Activity_Array3 == null)
            {
                // echo $encode_like."if<br>";
                // echo $Activity_Array3."arrry";
                if($Activity_Array1 != null && $Activity_Array2 != null){
                    $Activity_Array3 =array_merge_recursive( $Activity_Array1,$Activity_Array2);
                    // echo json_encode($Activity_Array3)."check<br>";
                    $Activity_Array_Done[$k] = json_encode($Activity_Array3);
                    $k= $k+1;
                    // echo $Activity_Array_Done."lst<br>";
                }
                else if($Activity_Array1 != null && $Activity_Array2 == null){
                    $Activity_Array3 =array_merge_recursive( $Activity_Array1);
                    // echo json_encode($Activity_Array3)."check<br>";
                    $Activity_Array_Done[$k] = json_encode($Activity_Array3);
                    $k= $k+1;
                    // echo $Activity_Array_Done."lst<br>";
                }
                else if($Activity_Array1 == null && $Activity_Array2 != null){
                    $Activity_Array3 =array_merge_recursive($Activity_Array2);
                    // echo json_encode($Activity_Array3)."check<br>";
                    $Activity_Array_Done[$k] = json_encode($Activity_Array3);
                    $k= $k+1;
                    // echo $Activity_Array_Done."lst<br>";
                }
            }
            else
            {
                // echo $encode_like."else<br>";
                // echo json_encode($Activity_Array3)."inner<br>";
                // echo $Activity_Array3."arrry";
                // echo $encode_like."here<br>";
                // echo $encode_cmnt."here<br>";
                // echo json_encode($Activity_Array3)."checkElseBefore<br>";
                if($Activity_Array1 == null && $Activity_Array2 == null){
                    // $Activity_Array3 =array_merge_recursive($Activity_Array3, $Activity_Array1,$Activity_Array2);
                    // echo json_encode($Activity_Array3)."checkElseAfter<br>";
                    $Activity_Array_Done[$k] = json_encode($Activity_Array3);
                    $k= $k+1;
                }
                else if($Activity_Array1 == null && $Activity_Array2 != null){
                    // echo json_encode($Activity_Array3)."checkElseAfter<br>";
                    $Activity_Array3 =array_merge_recursive($Activity_Array3, $Activity_Array2);
                    // echo json_encode($Activity_Array3)."checkElseAfter<br>";
                    $Activity_Array_Done[$k] = json_encode($Activity_Array3);
                    $k= $k+1;
                }
                else if($Activity_Array1 != null && $Activity_Array2 != null){
                    $Activity_Array3 =array_merge_recursive($Activity_Array3, $Activity_Array1,$Activity_Array2);
                    // echo json_encode($Activity_Array3)."checkElseAfter<br>";
                    $Activity_Array_Done[$k] = json_encode($Activity_Array3);
                    $k= $k+1;
                }
                else{
                    // echo json_encode($Activity_Array3)."checkElseAfter<br>";
                    $Activity_Array3 =array_merge_recursive($Activity_Array3, $Activity_Array1);
                    // echo json_encode($Activity_Array3)."checkElseAfter<br>";
                    $Activity_Array_Done[$k] = json_encode($Activity_Array3);
                    $k= $k+1;
                }
                
            }
            // echo $Activity_Array_Done."kjfkdjfd<br>";

        }
        // echo $Activity_Array_Done."outer<br>";

        $response['data']['activity'] = array(
            "UnSorted_Activity" => $Activity_Array_Done
            
        );
        $response['data']['notification'] = array(
            "notification_count" => $count
        );
        echo json_encode($response);
    }
    else {
        echo "issue in query".$id;
    }
?>