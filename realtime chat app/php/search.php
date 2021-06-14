<?php
    session_start();
    include_once "../../dbConnect.php";
    $outgoing_id = $_SESSION['username'];
    $searchTerm = pg_escape_string($db, $_POST['searchTerm']); //response are sending ajax to php and getting from php to ajax
    $output = "";
    $sql = pg_query($db, "select * from user_detail where not u_uname = '{$outgoing_id}' and 
                    u_name like '%{$searchTerm}%'");
    if(pg_num_rows($sql) > 0){
        include "data.php";
    }
    else{
        $output .= "No user found!";
    }

    echo $output;
?>