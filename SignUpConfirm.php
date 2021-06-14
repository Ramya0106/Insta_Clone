<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Page</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="SignUpConfirm.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body>
      <div class="wrapper">
        <div id="formContent" style="margin-bottom:11px;" >

          <div class="row">
            <div>
              <img class='navbar-brand col-lg-12 col-md-12 col-xl-12 col-sm-12 ' style = "padding-left: 116px; padding-right: 116px; height: 50%; width: 100%; padding-bottom: 15px;" src="www.instagram.com_accounts_emailsignup_.png
              " alt="">
            </div>
          </div>

          <div class="row" id="third">
            <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
                <p style="font-weight: 600; color: #070707; font-size: 17px;padding-left: 45px; padding-right: 45px;" id="user_otp">Enter Confirmation Code</p>
            </div>
          </div>

          <form id="fourth" method = "GET">
            <div class="form">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
                  <p style="color:red; font-size: 12px; float:left;" id="warning" hidden>Enter Correct OTP</p>
                </div>
              </div>
              <div class="input_field">
                  <input type="text" placeholder="Confirmation Code" class="input" name="number">
              </div>
              <!-- <button id="btn" type="button" class="btn btn-sm btn-primary" style="width:100%; font-weight: 600; margin-top: 10px; margin-left: 3px; font-size: 15px; margin-bottom: 10px;" onclick="confirmation()">Next</button> -->
              <!-- <a href="" class="text-center" style="color:#0095f6; font-weight:900;">Log in</a> -->
              <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Next" style="width:100%; font-weight: 600; margin-top: 10px; margin-left: 3px; font-size: 15px; margin-bottom: 10px;"/>
            </div>  
          </form>
      </div>
        <div id="formContent1">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <p style="padding-top: 11px;">Have an account? <a href="login.php" class="text-center" style="color:#0095f6; font-weight:600">Log in</a></p>
            </div>
          </div>
        </div>
      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
  session_start();
  include_once 'dbConnect.php';
  $user_otp = $_GET['number'];
  
  if(isset($_GET['submit'])){
    if($_SESSION["otp_encrypt"] == md5($user_otp)){
      $email =$_SESSION['email'];
      $username = $_SESSION['username'];
      $fname =$_SESSION['fname'];
		  $password = $_SESSION['password'];
		  $bod = $_SESSION['bod'];
      $phone = 0;
      $photo = "images/image1.png";
      $query = "INSERT INTO user_detail(u_uname,u_name,u_password,u_email,u_phone,u_dob,u_photo)VALUES('$username', '$fname','$password', '$email', '$phone','$bod','$photo');";
	    $ret = pg_query($db, $query);
      header("Location:login.php?register=success");
      session_unset();
      session_destroy();
    }
    else{
      echo '<script type="text/JavaScript">  
      document.getElementById("warning").hidden = false;
     </script>'; 
    }
  }
?>