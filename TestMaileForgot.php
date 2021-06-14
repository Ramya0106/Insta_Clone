<?php
    session_start();
	include_once 'dbConnect.php';

	use PHPMailer\PHPMailer\PHPMailer; 
	use PHPMailer\PHPMailer\Exception; 

	require 'vendor/autoload.php'; 

	$email = $_GET['mail'];
    $otp = rand(1000,10000);
	$otp_encrypt = md5($otp);
	//echo $otp;
	$query = "select u_name from user_detail where u_email = '$email';";
    $result = pg_query($db,$query);
    if($row = pg_fetch_row($result)){
        $mail = new PHPMailer(); 
		try { 
            $mail->SMTPDebug = 2;									 
            $mail->isSMTP(true);											 
            $mail->Host = 'smtp.gmail.com';					 
            $mail->SMTPAuth = "true";							 
            $mail->Username = 'instagramrvclone@gmail.com';				 
            $mail->Password = 'Instagram@rv123';						 
            $mail->SMTPSecure = 'ssl';							 
            $mail->Port = 465; 

            $mail->setFrom('instagramrvclone@gmail.com', 'Instagram Clone');		 
            $mail->addAddress($email); 
            $mail->addAddress($email, $fname); 
            
            $mail->isHTML(true);								 
            $mail->Subject = 'Checking'; 
            $mail->Body = ' <b>Your OTP is </b> '.$otp; 
            $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
            $mail->send(); 
            $_SESSION["otp_encrypt"] = $otp_encrypt;
            $_SESSION['email'] = $email;
            header("Location:ForgotPasswordC.php");
		} 
		catch (Exception $e) { 
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
		}
	}
    else{
        header("Location:login.php?register=success1");
	}

?>