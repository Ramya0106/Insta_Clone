<?php  
       
   	$db = pg_connect("host=localhost dbname=instagram user=postgres password=yournewpass") or die('Could not connect');

    $sql = "SELECT u_photo,u_uname FROM user_detail order by u_uname;";   
    $result = pg_query($db,$sql);  
      
    $response = array();

    while($row = pg_fetch_row($result)){  
         $photo = $row[0]; 
         $name = $row[1]; 

         $response[] = array(
                "photo" => $photo,
                "name" => $name
        ); 
    }  
  
    echo json_encode($response);  
?>