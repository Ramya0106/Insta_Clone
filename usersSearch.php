<?php

$array = array();//array("aaaa", "cccc", "dddd", "ggggg");
//echo json_encode($array);

$conn = pg_connect("host=localhost dbname=instagram port=5432 user=postgres password=123") or die('could not establish the connection');

$sql = "select u_uname from user_detail";
$result = pg_query($conn, $sql);

while($row = pg_fetch_assoc($result)){
    array_push($array, $row['u_uname']); //2d array uphoto also
}


echo json_encode($array);


// session_start();
    // include_once "dbConnect.php";
    // $outgoing_id = $_SESSION['username'];
    // $searchterm = pg_escape_string($db, $_POST['searchTerm']);
    // $output = "";
    // $sql = pg_query($db, "select * from user_detail where not u_name = {'$outgoing_id'} and u_name like '%{$searchterm}%'");
    // if(pg_num_rows($sql) > 0){
    //     include "data.php";
    // }
    // else{
    //     $output .= "No user found !";
    // }

    // echo $output;
?>