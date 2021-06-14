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
    <link href="login.css" rel="stylesheet">
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
        <div id="formContent" style="margin-bottom:11px;">
          <div class="row">
              <div>
                <img class='navbar-brand col-lg-12 col-md-12 col-xl-12 col-sm-12 ' style = "padding-left: 75px; padding-right: 75px; height: 50%; width: 100%; padding-bottom: 30px;" src="instagram.png" alt="">
              </div>
          </div>
  
          <form method = "POST">
              <div class="form">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
                    <p style="color:red; font-size: 12px; float:left;" id="warning" hidden>Email or password Not Correct</p>
                  </div>
                </div>
                <div class="input_field">
                    <input type="text" placeholder="Enter Email" class="input" id="mail">
                </div>
                <div class="input_field">
                    <input type="password" placeholder="Password" class="input" oninput="myFunction()" id="pass">
                </div> 
                <button type="button" id = "btn" class="btn btn-sm btn-primary" style="width:100%;font-weight: 600; margin-top: 10px; margin-left: 3px; font-size: 15px;" onclick="logIn()" disabled>Log in</button> 
            </div>
          </form>
  
          <div class="or">
            <div class="line" style="margin-left: 10px;"></div>
            <p style="font-weight: bold; padding-top: 11px;">OR</p>
            <div class="line" style="margin-right: 3px;"></div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <a href="ForgotPassword.html" class="text-center" style="color:#003569">forgot password ?</a>
            </div>
          </div>
        </div>
        <div id="formContent1">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <p style="padding-top: 11px;">Don't have an account? <a href="SignUp.php" class="text-center" style="color:#0095f6; font-weight:600">Sign up</a></p>
            </div>
          </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="login.js"></script>
  </body>
</html>
<?php
	if(isset($_GET["register"])){
		if($_GET["register"] == 'success'){
			echo '<script>alert("Account Created Successfully")</script>';
		}
    if($_GET["register"] == 'success1'){
			echo '<script>alert("Account Not Exist")</script>';
		}
    if($_GET["register"] == 'successPassword'){
			echo '<script>alert("Passord Changed")</script>';
		}
    if($_GET["register"] == 'loginError'){
			echo '<script>document.getElementById("warning").hidden = false;</script>';
		}
	}
?>