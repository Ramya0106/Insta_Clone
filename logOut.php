<?php
    include_once 'dbConnect.php';
    session_start();
    if($_SESSION["username"]==NULL)
    {
       header("Location:instagram.html");
    }
    $sql = "update user_detail set status = 'Offline now' where u_uname = '{$_SESSION["username"]}'";
    $query = pg_query($db, $sql);
    session_unset();
    session_destroy();
    header("Location:login.php");


?>
<!-- <!DOCTYPE html>
<html>
<body>

    <?php
    // remove all session variables
    //session_unset(); 

    // destroy the session 
    //session_destroy();
    //header("Location:login.php"); 
    ?>

</body>
</html> -->
