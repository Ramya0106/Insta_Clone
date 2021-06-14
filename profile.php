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
        <link href="profile.css" rel="stylesheet">
    
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="AjaxFileUpload-master/js/jquery-1.11.3-jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="postData.js"></script>

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
                  <input type="text" class="form-control" placeholder="Search...">
                </form> -->
            </div>
        </nav>
        <nav class="navbar navbar-fixed-bottom">
            <a href="Home.php"><i class="fa fa-home"></i></a>
            <a href="search.php"><i class="fa fa-search"></i></a>
            <a href="addPost.php" id="noti"><i class="fa fa-camera"></i></a>
            <a href="realtime chat app/users.php"><i class="fa fa-envelope"></i></a>
            <a href="profile.php"><i class="fa fa-fw fa-user"></i></a>
        </nav>
    
        <div class="container">
            <div class="row ttt"> 
                <div class="col-xs-10 hidden-sm hidden-md hidden-lg hidden-xl">
                    <h2 id="username" class="col-xs-10" ><?php echo $_SESSION["username"] ?></h2> 
                </div>
                <div class="col-xs-2 hidden-sm hidden-md hidden-lg hidden-xl">
                    <i class="fa fa-align-justify dropdown-toggle col-xs-2"  data-toggle="dropdown" style="float:left;"></i>
                    <ul class="dropdown-menu">
                    <li><a href="logOut.php">Log Out</a></li>
                    </ul>        
                </div>
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2 ">
                    <button id="pro" title="change profile photo" data-toggle="modal" data-target="#exampleModalCenter"style="width:100%; height:15%; border-radius:50%; border-color:transparent; outline:none; background-color:transparent;"></button> 
                    <div id="err">

                    </div>
                </div>
                <section class="col-xs-8 col-sm-10 col-md-10 col-lg-7 col-xl-7">
                    <div class="row sec">
                        <div class=" col-sm-4 col-lg-4 col-md-4 col-xl-4" style="padding-left:0px">
                            <p id="username" class="hidden-xs" style="font-weight:552; font-size:20px;"><?php echo $_SESSION["username"] ?></p> 
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 hidden-xs"> 
                            <button type="button" class="btn btn-light" onclick="location.href='edit.php'">Edit Profile</button>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 hidden-xs">
                            <i class="fa fa-align-justify dropdown-toggle "  data-toggle="dropdown" style="float:left;margin-top:5px"></i>
                            <ul class="dropdown-menu">
                            <li><a href="logOut.php">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row sec">
                        <ul  class="list-inline">
                            <li id="post" class="col-sm-4 col-md-4 col-lg-4 col-xl-4" style="font-size:medium; letter-spacing:1px;">posts</li>
                            <li id="followers"  role ="button" class="col-sm-4 col-md-4 col-lg-4 col-xl-4" style="font-size:medium; letter-spacing:1px;" data-toggle="modal" data-target="#myModal">followers</li>
                            <li id="following"  role ="button" class="col-sm-4 col-md-4 col-lg-4 col-xl-4" style="font-size:medium; letter-spacing:1px;" data-toggle="modal" data-target="#myModal2">following</li>                          
                        </ul>  
                    </div>
                    <div id="name" class="row sec">
                    
                    </div>
                </section>
                <button type="button" class="btn btn-light hidden-sm hidden-sm hidden-md hidden-lg hidden-xl col-xs-12" onclick="location.href='testing.php'" >Edit Profile</button>   
            </div>
            <!-- <section>
                <ul class="nav nav-tabs col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ul">
                <li class="active col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"><a href="#">Post</a></li>
                <li class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"><a  href="#">Tagged</a></li>
                <li class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"><a href="#">Save</a></li>
                </ul>
            </section>
            <section id= "maincontent">
                <div id="x" data-toggle="modal" data-target="#myModal3">
                </div>
            </section> -->
            <div class="container row">
                <ul class="nav nav-tabs" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12>
                    <li class="active col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center"><a data-toggle="tab" href="#x" style="color:black;">Post</a></li>
                    <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center"><a data-toggle="tab" href="#menu1" style="color:black;">Save</a></li>
                </ul>

                <div class="tab-content">
                    <div id="x" class="tab-pane fade in active">
                    
                    </div>
                    <div id="menu1" class="tab-pane fade">
                    
                    </div>
                </div>
            </div>
        </div>

        
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->

        <div class="modal fade" id="exampleModalCenter" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <form id="form">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; padding-left:33%;">Change Profile Photo</h4>
                        </div>
                        <div >
                            <button type="button" class="btn btn-light" style="width:100%; outline:none; color:blue; font-weight:bold;"> change Profile Photo
                            <input id="uploadImage" type="file" accept="image/*" name="image"/>
                            <input class="btn btn-success"  type="submit" value="Upload" style="display:none;">
                            </button>
                        </div>
                        <div >
                            <button type="submit" class="btn btn-light" style="width:100%; outline:none; color:red; font-weight:bold;" onclick="phpcall()">Remove current Photo</button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-right:45%; outline:none;"> cancel </button> 
                        </div>
                    </div>
                </div>  
            </form>
        </div>

        <div class="modal fade" id="myModal2" role="dialog">
    		<div class="modal-dialog" style="width:20%;">
    
      			<div class="modal-content">
        			<div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title text-center">Following</h4>
        			</div>
        			<div id="following_name" class="modal-body" >
                    
        			</div>
                </div>
    		</div>
  	    </div>

          <div class="modal fade" id="myModal3" role="dialog">
    		<div class="modal-dialog" style="width:50%;">
    
      			<div class="modal-content">
        			<div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title text-center">Post</h4>
        			</div>
        			<div class="modal-body" id="postView" >
                    
        			</div>
                </div>
    		</div>
  	    </div>

          <div class="modal fade" id="myModal" role="dialog">
    		<div class="modal-dialog" style="width:20%">
    
      			<div class="modal-content">
        			<div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title">Followers</h4>
        			</div>
        			<div class="modal-body" id="follower_name">
                        
        			</div>
      			</div>
      
    		</div>
  	    </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/docs.min.js"></script>
        <script src="js/vendor/jquery.min.js"></script>
        <script src="profile.js"></script>
        <script src="getData.js"></script>
    </body>
</html>