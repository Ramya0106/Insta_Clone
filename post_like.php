<?php
    session_start();
    include_once 'dbConnect.php';


    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');

    $username = $_SESSION['username'];
    echo $username+"hhh";
    $action = $_POST['action'];
    $post_pics = $_POST['post_pics'];
    $time = $date;
    $flag = 0;

    if($action == "like"){
        $sql="SELECT p_like from post where p_path = '$post_pics';";
        if(pg_query($db,$sql)){
            $result = pg_query($db,$sql);
            while($row = pg_fetch_row($result)){
                $json = $row[0];
                // echo $json;
                $decode_json = json_decode($json);
                $decode_json[] = ['username'=>rtrim($username),'action' => $action,'time'=>$time,'flag'=>$flag];
                $json1 = json_encode($decode_json);
                echo $json1;
            }
        }
        $sql1 = "UPDATE post set p_like='$json1' where p_path='$post_pics';";
        pg_query($db,$sql1);
    }
    
    else
    {
        $sql="SELECT p_like from post where p_path ='$post_pics';";
        if(pg_query($db,$sql))
        {
            $result = pg_query($db,$sql);
            while($row = pg_fetch_row($result))
            {
                $data=$row[0];
                $json_arr = json_decode($data, true);
                // get array index to delete
                $arr_index = array();
                foreach ($json_arr as $key => $value)
                {
                    if ($value['username'] == rtrim($username))
                    {
                        $arr_index[] = $key;
                    }
                }

                //delete data
                foreach ($arr_index as $i)
                {
                    // echo $json_arr[$i];
                    unset($json_arr[$i]);
                }

                // rebase array
                $json_arr = array_values($json_arr);

                // encode array to json and save to file
                // echo $json_arr;
                $f= json_encode($json_arr);
                //echo"yess";
                // echo $f;
                $sql2="UPDATE post set p_like='$f' where p_path='$post_pics';";
                pg_query($db,$sql2);
            }
       }
        
    }
?>