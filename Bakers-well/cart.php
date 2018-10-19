<?php
  error_reporting(E_PARSE | E_ERROR);
  include('session.php');
  $item_total1=0;
  $order='';
  require_once("dbcontroller.php");
  $db_handle = new DBController();
  if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
			unset($_SESSION["cart_item"]);
		break;	
	}
  }
  if(isset($_POST['OrderFood'])){
	  $items='';
	  for ($i=0;$i<count($_SESSION["cart_item"]);$i++){
	    $name=$_POST['name'][$i];
	    $quantity=$_POST['quantity'][$i];
	    $items.="$name"."-"."$quantity"."\n";
	  }
	  $price=$_POST['price'];
	  $con=mysqli_connect("localhost","root","") or die("not connected to database server");
      $db=mysqli_select_db($con,'restaurant') or die("not connected to database");
	  $select=mysqli_query("SELECT item-details,time,status from `orders` where Tableno='$table_no' AND status='unpaid'");
	  while($row=mysqli_fetch_array($mysql)){
		    $order=$row['item-details'];
			$time=$row['time'];
			$status=$row['status'];
		}
	  if(!empty($_SESSION["cart_item"])){
		  $select=mysqli_query("SELECT * from `orders` where Tableno='$table_no' AND status='unpaid'");
		  $num_rows = mysqli_num_rows($select);
		     if($num_rows==0){
			   $insert = "INSERT INTO orders (`Tableno`,`item-details`,`price`) VALUES ('$table_no', '$items', '$price')";
		       $query = mysqli_query($con,$insert);
			   echo "<script>javascript: alert('Your order has been placed.')</script>";
		     }
			 //else if($num_rows==1){
			   //$update = mysqli_query("UPDATE orders SET `item-details`='$items' WHERE Tableno='$table_no' AND status='unpaid'");
			   //echo "<script>javascript: alert('Your order has been updated.')</script>";
		     //}
		     else{
			   echo "<script>javascript: alert('Your order has already been placed.')</script>";
		     }		  
	  }
	  else{
         echo "<script> javascript: alert('You have not selected any item.') </script>";
	   }
  }
    if($status=='paid'){
      $query="Update `register` SET `logout_time`= CURRENT_TIMESTAMP() WHERE `Name`='$login_session' AND Tableno='$table_no'";
      $sql=mysqli_query($con,$query) or die("error detected");
	  include('logout.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bakers Well</title>
    <meta charset="utf-8">
	<!--<meta http-equiv="refresh" content="7-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
  </head>   
  <body>
  <form action="" method="post">
   <?php
    if(empty($_SESSION["cart_item"])){
     echo "<table align='center'><tr><th colspan='4'><h3>Your cart is empty</h3></th></tr>";
    }
    if(isset($_SESSION["cart_item"])){
     $item_total = 0;
   ?>	
  <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
				    <tr>
					    <th class="text-center" colspan='4'><h2>Cart</h2></th>
				    </tr>
                    <tr>
                        <th class="text-center">Item</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center"> Remove Item</th>
                    </tr>
                </thead>
				<?php foreach ($_SESSION["cart_item"] as $item) {
                          $item_total = ($item["price"]*$item["quantity"]);	
	                      $item_total1 += $item_total;
	                  //$product_info = $db_handle->runQuery("SELECT * FROM items WHERE code = '" . $item["code"] . "'");
                ?>
                <tbody>
                    <tr>
                        <td class="col-sm-1 col-md-3">
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $item["name"]; ?></h4>
								<input type="hidden" name="name[]" value=<?php echo $item["name"];?>>
                                <span>Status: </span><span class="text-success"><strong>Available</strong></span>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <?php echo $item["quantity"]; ?>
						<input type="hidden" name="quantity[]" value=<?php echo $item["quantity"];?>>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo "Rs.".$item_total.".00"; ?></strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href="cart?action=remove&code=<?php echo $item["code"]; ?>" title="Remove from Cart"><center><button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove" id="<?php echo $item["code"]; ?>"></span>
                        </button></center></a></td>
                    </tr>
					<?php
	                   }
					  }
                    ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total Amount</h3></td>
                        <td class="text-right"><h3><strong><?php echo "Rs.".$item_total1.".00";?></strong></h3></td>
						<input type="hidden" name="price" value=<?php echo $item_total1; ?>>
                    </tr>
                    <tr>
					    <td></td>
                        <td>
                        <a href="menu"><button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Ordering
                        </button></a></td>
                        <td><input type="submit" class="btn btn-success" name="OrderFood" value="Serve my Food"></td> 
						<td><button type="button" data-trigger="focus" data-placement="left" class="btn btn-md btn-primary" data-toggle="popover" title="" data-content="Payment option will be available soon. Please pay the bill at counter.">Pay</button>
                        </td>
                    </tr>
					<!--<tr><td colspan='2' align="center">Please provide us feedback to serve better.</td><td colspan='2' align="center"><input type="submit" class="btn btn-danger" name="logout" value="Logout"></td></tr>-->
                </tbody>
            </table><?php echo "</table>";?>
        </div>
    </div>
  </div>
  </form>
  <script>
   $(document).ready(function(){
     $('[data-toggle="popover"]').popover();   
   });
  </script>
 </body>
</html>