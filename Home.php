<?php
    session_start();
    if($_SESSION['username'] == NULL){
        header("Location:login.php");
    }
?>

<html>
  <head>
      <title>some example</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- <link rel="icon" href="../../favicon.ico"> -->
  
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="Home.css" rel="stylesheet">
  
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      
  </head>
  <body>
      <nav class="navbar navbar-fixed-top" >
          <div class="container">
              <div class="navbar-header">
                  <svg aria-label="Instagram" class="_8-yf5 float-left" fill="#262626" height="48" viewBox="0 0 50 48" width="24"><path d="M13.86.13A17 17 0 008 1.26 11 11 0 003.8 4 12.22 12.22 0 001 8.28 18 18 0 00-.11 14.1c-.13 2.55-.13 3.38-.13 9.9s0 7.32.13 9.9A18 18 0 001 39.72 11.43 11.43 0 003.8 44 12.17 12.17 0 008 46.74a17.75 17.75 0 005.82 1.13c2.55.13 3.38.13 9.9.13s7.32 0 9.9-.13a17.82 17.82 0 005.83-1.13A11.4 11.4 0 0043.72 44a11.94 11.94 0 002.78-4.24 17.7 17.7 0 001.13-5.82c.13-2.55.13-3.38.13-9.9s0-7.32-.13-9.9a17 17 0 00-1.13-5.86A11.31 11.31 0 0043.72 4a12.13 12.13 0 00-4.23-2.78A17.82 17.82 0 0033.66.13C31.11 0 30.28 0 23.76 0s-7.31 0-9.9.13m.2 43.37a13.17 13.17 0 01-4.47-.83 7.25 7.25 0 01-2.74-1.79 7.25 7.25 0 01-1.79-2.74 13.23 13.23 0 01-.83-4.47c-.1-2.52-.13-3.28-.13-9.7s0-7.15.13-9.7a12.78 12.78 0 01.83-4.44 7.37 7.37 0 011.79-2.75A7.35 7.35 0 019.59 5.3a13.17 13.17 0 014.47-.83c2.52-.1 3.28-.13 9.7-.13s7.15 0 9.7.13a12.78 12.78 0 014.44.83 7.82 7.82 0 014.53 4.53 13.12 13.12 0 01.83 4.44c.13 2.51.13 3.27.13 9.7s0 7.15-.13 9.7a13.23 13.23 0 01-.83 4.47 7.9 7.9 0 01-4.53 4.53 13 13 0 01-4.44.83c-2.51.1-3.28.13-9.7.13s-7.15 0-9.7-.13m19.63-32.34a2.88 2.88 0 102.88-2.88 2.89 2.89 0 00-2.88 2.88M11.45 24a12.32 12.32 0 1012.31-12.35A12.33 12.33 0 0011.45 24m4.33 0a8 8 0 118 8 8 8 0 01-8-8"></path></svg>
                  <img class='navbar-brand ' src="instagram.png" alt="">
              </div>
              <ul class="nav navbar-nav">
                  <li><a href="Home.php"><i class="fa fa-home"></i></a></li>
                  <li><a href="search.php"><i class="fa fa-search"></i></a></li>
                  <li><a href="addPost.php" id="noti"><i class="fa fa-camera"></i></a></li>
                  <li><a href="realtime chat app/users.php"><i class="fa fa-envelope"></i></a></li>
                  <li><a href="profile.php"><i class="fa fa-fw fa-user"></i></a></li>
              </ul>
              <!-- <form class="navbar-form navbar-right hidden-xs">
                <div class = "wrapper">
                  <div class = "search-input">
						        <input  type="text" class="form-control" placeholder="Search..." data-toggle="popover" data-placement="bottom" data-content="Content<br/>jdfdjfhdjfdj"> -->
                    <!-- <input class="typeahead form-control" style="margin:0px auto;width:300px;" type="text" placeholder="Search..." value="">   -->
                    <!-- </div>
                  </div>
                </div>
              </form> -->
          </div>
      </nav>
      
      <nav class="navbar navbar-fixed-bottom">
          <a href="Home.php"><i class="fa fa-home"></i></a>
          <a href="#search"><i class="fa fa-search"></i></a>
          <a href="addPost.php"><i class="fa fa-camera"></i></a>
          <a href="realtime chat app/users.php"><i class="fa fa-envelope"></i></a>
          <a href="profile.php"><i class="fa fa-fw fa-user"></i></a>
      </nav>
      <div class="row">
        <div class="container theme-showcase mx-auto" role="main">
          <div id="feed_article" class="col-sm-6 col-md-8 col-lg-8 col-xl-9 yess "> 
          </div>
          
          
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-sm-offset-1 ">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="post1">
              <a id="pro1" href="profile.php"> 
                <!-- <img src="images/image1.png" alt="" width="40" class="img-circle"> -->
              </a>
              <div class="col-lg-6 col-sm-6 col-xl-6 col-md-6">
                <p  class="" style="font-weight:bold;"> <?php echo $_SESSION["username"] ?></p>
              </div>
            </div>
            
            <div class="card mt-n1 col-lg-12 col-md-12 col-sm-12 col-xl-12" >
              <h4>Suggestion For You</h4><hr>
              <div id="frnd_suggestion">
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> -->
      <script src="js/bootstrap.min.js"></script>
      
      <!-- <script src="js/docs.min.js"></script> -->
      <script src="getData.js"></script>
      <script src="Home.js"></script>
      
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->
  </body>
</html>
