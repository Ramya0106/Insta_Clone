<?php 

// echo "otp sent";


/*use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true); 

try { 
	$mail->SMTPDebug = 2;									 
	$mail->isSMTP(true);											 
	$mail->Host	 = 'smtp.gmail.com';					 
	$mail->SMTPAuth = "true";							 
	$mail->Username = 'gamingonlyacc619@gmail.com';				 
	$mail->Password = 'gamingonly619';						 
	$mail->SMTPSecure = 'ssl';							 
	$mail->Port	 = 465; 

	$mail->setFrom('smithsteyn13@gmail.com', 'Smith Steyn');		 
	$mail->addAddress('shettyramya0106@gmail.com'); 
	$mail->addAddress('shettyramya0106@gmail.com', 'Ramya Shetty'); 
	
	$mail->isHTML(true);								 
	$mail->Subject = 'Checking'; 
	$mail->Body = ' <b>Your OTP is ....</b> '; 
	$mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
	$mail->send(); 
	echo "Mail has been sent successfully!"; 
} catch (Exception $e) { 
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
 } */

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true); 

try { 
	$mail->SMTPDebug = 2;									 
	$mail->isSMTP(true);											 
	$mail->Host	 = 'smtp.gmail.com';					 
	$mail->SMTPAuth = "true";							 
	$mail->Username = 'instagramrvclone@gmail.com';				 
	$mail->Password = 'Instagram@rv123';						 
	$mail->SMTPSecure = 'ssl';							 
	$mail->Port	 = 465; 

	$mail->setFrom('instagramrvclone@gmail.com', 'Instagram Clone');		 
	$mail->addAddress('shettyramya0106@gmail.com'); 
	$mail->addAddress('shettyramya0106@gmail.com', 'Ramya Shetty'); 
	
	$mail->isHTML(true);								 
	$mail->Subject = 'Checking'; 
	$mail->Body = ' <b>Your OTP is ....</b> '; 
	$mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
	$mail->send(); 
	echo "Mail has been sent successfully!"; 
} catch (Exception $e) { 
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
 } 
?> 

