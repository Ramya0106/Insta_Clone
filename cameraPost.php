<?php
    session_start();
    include_once 'dbConnect.php';

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    $path = 'Post/'; 
    if($_FILES['image'])
    {
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        echo "name:".$img;
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000,1000000).$img;
        // check's valid format
        if(in_array($ext, $valid_extensions)) 
        {  
            $path = $path.strtolower($final_image);
            // compressImage($_FILES['image']['tmp_name'],$path,60);

            // echo "\nSUCCESS FLAG :".$move_success;
            if(move_uploaded_file($_FILES['image']['tmp_name'],$path)) 
            {
                $query = "select u_id from user_detail where u_uname='".$_SESSION['username']."';";
                $result = pg_query($db,$query);
                while($row = pg_fetch_row($result)){
                    $id = $row[0];
                }
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d H:i:s');
                //echo $date;
                // $sql = "UPDATE user_detail SET u_photo='$path' WHERE u_uname='".$_SESSION['username']."';";
                $sql = "INSERT INTO post(u_id,p_path,p_time)VALUES('$id','$path','$date');";
                if (pg_query($db,$sql)) {
                    echo "Record updated successfully";
                    
                } 
                else {
                    echo "<br>Error updating record: ";
                }
    
             }
        } 
        else 
        {
            echo 'invalid';
        }
    }
    else{
        echo "FILE FIELD EMPTY";
    }
    
?>