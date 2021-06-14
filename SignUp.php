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
    <link href="SignUp.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="SignUp.js"></script>

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
                <img class='navbar-brand col-lg-12 col-md-12 col-xl-12 col-sm-12 ' style = "padding-left: 75px; padding-right: 75px; height: 50%; width: 100%; padding-bottom: 15px;" src="instagram.png" alt="">
              </div>
          </div>

          <div class="row" id="first">
            <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
                <p style="font-weight: 600; color: #8c8c8c; font-size: 17px;padding-left: 45px; padding-right: 45px;">Sign up to see photos and videos from your friends.</p>
            </div>
          </div>

            <form id="second" method="GET">
                <div class="form">
                    <div class="input_field">
                        <input type="email" placeholder="Email" class="input" id="mail">
                    </div>
                    
                    <div class="input_field">
                        <input type="text" placeholder="Full Name" class="input" id="Uname">
                    </div>

                    <div class="input_field">
                        <input type="text" placeholder="Username" class="input" id="u">
                    </div>

                    <div class="input_field">
                        <input type="password" placeholder="Password" class="input" id="p">
                    </div> 

                    <div class="input_field">
                        <input type="date" placeholder="Date of birth" class="input" id="d" oninput="myfunction()">
                    </div>

                    <button id="btn" type="button" class="btn btn-sm btn-primary" style="width:100%; font-weight: 600; margin-top: 10px; margin-left: 3px; font-size: 15px;" onclick="phpcall()" disabled>Sign Up</button> 
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
	if(isset($_GET["register"])){
		if($_GET["register"] == 'success'){
			echo '<script>alert("Account Already Exist")</script>';
		}
	}
?>