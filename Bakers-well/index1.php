<?php
   $servername="localhost";
   $db_user="root";
   $db_pwd="";
   $db_name="restaurant";
   $con=mysqli_connect($servername,$db_user,$db_pwd) or die("not connected to database server");
   $db=mysqli_select_db($con,$db_name) or die("not connected to database");
   session_start();
   if(isset($_POST['submit'])){
     $Name=($_POST['Name']);
	 $Mobile=($_POST['Mobile']);
	 $table='T1';
	 $query="INSERT INTO `register`(`Tableno`,`Name`,`Mobile`) VALUES ('$table','$Name','$Mobile')";
	 $sql=mysqli_query($con,$query) or die("error detected");
	 if($sql){
	     //echo "<script> javascript: alert('Success') </script>";
		 $_SESSION['login_user']=$Name;
		 $_SESSION['Tableno']=$table;
	     $Name=$_POST['Name'];
		 echo "<script> document.location='menu' </script>";
		 }
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bakers Well</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="#">Bakers Well</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="#section-home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#section-about" class="nav-link">About</a></li>
            <li class="nav-item"><a href="#section-menu" class="nav-link">Menu</a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section class="ftco-cover" style="background-image: url(images/main_bg.jpg);" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">
          <div class="col-md-12">
            <h1 class="ftco-heading ftco-animate mb-3">Bakers Well</h1>
            <h2 class="h5 ftco-subheading mb-5 ftco-animate">Our service at your fingers</h2>
            <p><a href="" target="_blank" class="btn btn-outline-white btn-lg " data-toggle="modal" data-target="#foodorderModal">Order Food</a></p>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
	
	<section class="ftco-section" id="section-about">
      <div class="container">
        <div class="row">
          <div class="col-md-5 ftco-animate mb-5">
            <h4 class="ftco-sub-title">Our Story</h4>
            <h2 class="ftco-primary-title display-4">Welcome</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

            <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p><a href="#" class="btn btn-secondary btn-lg">Our Story</a></p>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate img" data-animate-effect="fadeInRight">
            <img src="images/about_img_1.jpg" >
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
	
	<section class="ftco-section bg-light" id="section-contact">
      <div class="container">
        <div class="row">

          <div class="col-md-12 text-center mb-5 ftco-animate">
            <h2 class="display-4">Contact Us</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <!--<p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>-->
              </div>
            </div>
          </div>

          <div class="col-md mb-5 ftco-animate">
            <form action="" method="post">
              <div class="form-group">
                <label for="name" class="sr-only">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name">
              </div>
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter your email">
              </div>
              <div class="form-group">
                <label for="message" class="sr-only">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write your message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" value="Send Message">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </section>
    
    <!-- END section -->
    

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md ftco-animate">
                <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Bakers Well & Cake</h2>
                  <ul class="list-unstyled">
                    <li><a href="#section-about" class="py-2 d-block">About Us</a></li>
                    <li><a href="#" class="py-2 d-block">Chefs</a></li>
                    <li><a href="#section-contact" class="py-2 d-block">Contact</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <ul class="ftco-footer-social list-unstyled float-md-right float-lft">
                <li class="ftco-animate"><a href=""><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href=""><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href=""><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md text-left">
            <p>&copy; Future Express Solutions 2018. All Rights Reserved. </p>
          </div>
        </div>
      </div>
    </footer>

    
    

    <!-- Modal -->
    <div class="modal fade" id="foodorderModal" tabindex="-1" role="dialog" aria-labelledby="foodorderModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12 p-5">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <small>CLOSE </small><span aria-hidden="true">&times;</span>
                </button>
                <h1 class="mb-4">Details</h1>  
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="m_name">Name</label>
                      <input type="text" name="Name" class="form-control" id="m_name" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="m_phone">Phone</label>&nbsp;(optional)
                      <input type="text" name="Mobile" class="form-control" id="m_phone">
                    </div>
                  </div>                  
                  <div class="row">
                    <div class="col-md-7 form-group">
                      <input type="submit" name="submit" class="btn btn-primary btn-lg btn-success" value="Proceed">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <!-- END Modal -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
	
	<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
	
    <script src="js/jquery.animateNumber.min.js"></script>
	
    <script src="js/main.js"></script>

    
  </body>
</html>