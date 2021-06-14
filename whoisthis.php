<?php
session_start();
echo json_encode(array(
    'session'=>$_SESSION
    // Be sure that you're not storing any sensitive data in $_SESSION.
    // Better is to create an array with the data you need on client side:
    // 'session'=>array('user_id'=>$_SESSION['user_id'], /*etc.*/),
));
?>