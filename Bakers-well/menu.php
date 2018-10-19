<?php
   include('session.php');
   require_once("dbcontroller.php");
   $db_handle = new DBController();
   if(!empty($_GET["action"])) {
   switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM items WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
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
  <?php
    $session_items = 0;
    if(!empty($_SESSION["cart_item"])){
	 $session_items = count($_SESSION["cart_item"]);
    }	
   ?>
  <body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="#">Bakers Well</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span>&nbsp;Menu
        </button>
        <a href="cart" title="Cart"> <img src="./images/cart.png"> (<?php echo $session_items; ?>)</a>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="#section-recommended" class="nav-link">Recommended</a></li>
            <li class="nav-item"><a href="#section-soups" class="nav-link">Soups</a></li>
            <li class="nav-item"><a href="#section-roties" class="nav-link">Roties</a></li>
            <li class="nav-item"><a href="#section-biryani" class="nav-link">Biryani</a></li>
            <li class="nav-item"><a href="#section-main-course" class="nav-link">Main Course</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
	<div class="container">
      <div class="row">
        <div class="col-md-10 text-center mb-5 ">
		 <h2><?php echo "Hello";?>&nbsp;<?php echo $login_session; ?></h2>
         <h5 class="display-4">Today's Menu</h5>
         <div class="row justify-content-center">
           <div class="col-md-7">
             <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
           </div>
         </div>
        </div>
	  </div>	
	  	<div class="text-center"><h4>---Recommended---</h4></div><br>
      <div class="col-md-10 text-center">
	    <?php
	     $product_array = $db_handle->runQuery("SELECT * FROM items where category='recommended' && status='Online' ORDER BY id ASC");
	     if (!empty($product_array)) { 
		  foreach($product_array as $key=>$value){
	    ?>
        <form method="post" action="menu?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
         <div class="tab-content text-left">
          <div class="row">
            <div class="col-md-10 ftco-animate">
              <div class="media menu-item">
                <img class="mr-3" src="<?php echo $product_array[$key]["image"]; ?>" class="" alt="Will be uploaded soon">
                <div class="media-body">
                  <h5 class="mt-0"> <?php echo $product_array[$key]["name"]; ?> </h5>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <h6 class="text-primary menu-price"><?php echo "Rs.".$product_array[$key]["price"]; ?></h6>
				  <select name="quantity" class="col-sm-2">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
				          <option value="5">5</option>
				          <option value="6">6</option>
			      </select>
				  <input type="submit" class="btn btn-primary" value="Add to cart" /><br><br>
                </div>
              </div>
            </div>
		  </div>	
		 </div>		 
		</form> 
        <?php
		   }
	     }
	    ?>
                    
      </div>  
    </div>
	</section>
	<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row ftco-animate">
          <div class="col-md text-left">
            <p>&emsp;&emsp;&emsp;&copy; Future Express Solutions 2018. <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;All Rights Reserved. </p>
          </div>
        </div>
      </div>
    </footer>
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