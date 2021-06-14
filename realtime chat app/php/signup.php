<?php
    session_start();
    include_once "config.php";
    $fname = pg_escape_string($_POST['fname']);
    $lname = pg_escape_string($_POST['lname']);
    $email = pg_escape_string($_POST['email']);
    $password = pg_escape_string($_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //check user email valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if mail is valid
            //check email already exists or not
            $sql = pg_query($conn, "select email from users where email= '{$email}'");
            if(pg_fetch_row($sql) > 0){
                echo "$email - This email already exists!";
            }
            else{
                //check user uploads file or not
                if(isset($_FILES['image'])){ //if file is uploaded
                    $img_name = $_FILES['image']['name']; //getting user uploaded img name
                    $img_type = $_FILES['image']['type']; //getting image type
                    $tmp_name = $_FILES['image']['tmp_name']; //temporary name used to save file in our folder

                    //explode img to get extension like png jpg
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); //here we get the extension of img file

                    $extensions = ['png', 'jpeg', 'jpg']; //valid extensions
                    if(in_array($img_ext, $extensions) == true){ //if extension is valid
                        $time = time(); //returns current timestamp to store in unique name of file

                        //moving user uploaded img to particular folder
                        $new_img_name = $time.$img_name; //current time will be added to user uploaded file name (if user uploads file with same name so to distinguish them)
                        
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){ //if file moved successfully
                            $status = "Active now";
                            $random_id = rand(time(), 10000000); //random id for user

                            //inserting all user data in table
                            $sql2 = pg_query($conn, "insert into users (unique_id,fname,lname,email,password,img,status) values 
                                            ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                            if($sql2){ //if all values inserted 
                                $sql3 = pg_query($conn, "select * from users where email= '{$email}'");
                                if(pg_num_rows($sql3) > 0){
                                    $row = pg_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //using this session we need user unique_id in other php file 
                                    echo "success";
                                }
                            }
                            else{
                                echo "Something went wrong!";
                            }
                        }
                    }
                    else{
                        echo "Please select an image type - jpg, jpeg, png!";
                    }
                }
                else{
                    echo "Please select an image file!";
                }
            }
        }
        else{
            echo "$email - This is not valid email!";
        }
    }
    else{
        echo "All fields are required!";
    }
?>