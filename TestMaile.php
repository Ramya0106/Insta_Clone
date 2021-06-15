<?php 

	// echo "otp sent";
	session_start();
	include_once 'dbConnect.php';

	use PHPMailer\PHPMailer\PHPMailer; 
	use PHPMailer\PHPMailer\Exception; 
	//use PHPMailer\PHPMailer\SMTP;


	require 'vendor/autoload.php'; 

	$email = $_GET['mail'];
	$username = $_GET['username'];
	$fname = $_GET['firstname'];
	$password = $_GET['password'];
	$bod = $_GET['bod'];

	$otp = rand(1000,10000);
	$otp_encrypt = md5($otp);
	//echo $otp;
	$query = "select u_name from user_detail where u_email = '$email';";
    $result = pg_query($db,$query);
    if($row = pg_fetch_row($result)){
      // echo $row[0];
	//   echo '<script>alert("Account Already Exist")</script>';
	  header("Location:SignUp.php?register=success");
	}
	else{
		$mail = new PHPMailer(true); 
		try { 
		//$mail->SMTPDebug = 2;									 
		$mail->isSMTP(true);											 
		$mail->Host = 'smtp.gmail.com';					 
		$mail->SMTPAuth = "true";							 
		$mail->Username = 'mail@gmail.com';				 
		$mail->Password = 'password';						 
		$mail->SMTPSecure = 'ssl';							 
		$mail->Port = 465; 

		$mail->setFrom('mail@gmail.com', 'Instagram Clone');		 
		$mail->addAddress($email); 
		$mail->addAddress($email, $fname); 
		
		$mail->isHTML(true);								 
		$mail->Subject = 'Checking'; 
		$mail->Body = ' <b>Your OTP is </b> '.$otp; 
		$mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
		$mail->send(); 
		//echo "Mail has been sent successfully!"; 
		$_SESSION["otp_encrypt"] = $otp_encrypt;
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $username;
		$_SESSION['fname'] = $fname;
		$_SESSION['password'] = $password;
		$_SESSION['bod'] = $bod;
		header("Location:SignUpConfirm.php");
		//$_SERVER['PHP_SELF']
		} 
		catch (Exception $e) { 
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
		}
	}
?> 

