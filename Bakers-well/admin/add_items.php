<?php
     $con = mysqli_connect("localhost", "root", "");
     $db = mysqli_select_db($con,"restaurant");
     session_start();
     $login_session ="Admin";
     if(!isset($login_session)){
       mysqli_close($con);
     header('Location: ../main');
    }
	 if(isset($_POST['submit'])){
		 //$id=$_POST['id'];
		 $name=$_POST['name'];
		 $code=$_POST['code'];
		 $price=$_POST['price'];
		 $category=$_POST['category'];
		 $con=mysqli_connect('localhost','root','','restaurant') or die("not connected to database server");
		 $sql="INSERT INTO `items`(`name`,`code`,`price`,`category`) VALUES ('$name','$code','$price','$category')";
		 $query = mysqli_query($con,$sql);
		 if($query){
		   echo "<script>javascript: alert('Item inserted successfully')</script>";
		 }

	 }
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Bakers Well</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="navbar.css">
 <style>
  td {
      padding-bottom: 10px;
	  padding-top:10px;
	  padding-right:5px;
	  padding-left:5px;
      text-align: left;
    }
	th{
	   padding-top:10px;
	   text-align:left;
    }
	h3{
		text-align:left;
		color:#4169E1;
	}
	h4{
		color:red;
	}
	hr{
		border:1px solid #dee7ec;
	}
	label{
		font-size:17px;
	}
	.container{
		background-color:#fff;		
		padding-left:30px;
		padding-right:30px;
		padding-bottom:20px;
	}
	input[type="text"]{
		height:20px;
		width:70%;
		border-radius:7px;
		padding:5px;
	}
     input[type="submit"]{
		background-color:#337ab7;
		color:#fff;
		height:30px;
		width:80px;
		border-radius:7px;
		border-color:#2e6da4;
	}
  .copyright {
        text-align:center;
	    background-color:#f6f6f6;
		padding:1px;
    }
	strong{
		color: grey;
	}
 </style>
 </head>
 <body>
  <div class="header">
   <div class="header-logo">
	  <strong><a href="" >Bakers Well</a></strong>
   </div>
   <div class="header-list">
    <ul>
   	  <h2>Admin Portal</h2>
	</ul>
   </div>
  </div>
  <div class="topnav" id="myTopnav">
   <div class="dropdown">
    <button class="dropbtn">Home&nbsp;
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="main">Dashboard</a>
    </div>
   </div>	
   <div class="dropdown">
     <button class="dropbtn">Items&nbsp;
	 <i class="fa fa-caret-down"></i>
     </button>
	 <div class="dropdown-content">
      <a href="">Add Items</a>
      <a href="status_of_item">Status of Item</a>
	  <a href="display_items">Display Items</a>
    </div>
   </div>	 
   <div class="dropdown">
     <button class="dropbtn">Table&nbsp;
	 <i class="fa fa-caret-down"></i>
     </button>
	 <div class="dropdown-content">
      <a href="table_details">Table details</a>
	 </div> 
   </div>
   <div class="dropdown" style="float:right;">
    <button class="dropbtn"><i class="fa fa-user"></i>&nbsp;<?php echo $login_session; ?></a> 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../logout">Log Out</a>
    </div>
   </div>   
  </div>
  <div class="container">
    <table id="t02" width="50%" align="center"> 
	 <form action="" method="post">
	  <div class="form-group">
       <tr><th><label>Item Name&emsp;&emsp;&nbsp;:</label></th><td><input type="text" class="form-control" name="name" placeholder="NAME OF ITEM" required></td></tr>
	  </div> 
      <div class="form-group">
       <tr><th><label>Code&emsp;&emsp;&emsp;&emsp;&nbsp;:</label></th><td><input type="text" class="form-control" name="code" placeholder="ITEM CODE" required></td></tr>
	  </div>
	  <div class="form-group">
       <tr><th><label>Price&emsp;&emsp;:</label></th><td><input type="text" class="form-control" name="price" placeholder="ITEM PRICE" required></td></tr>
	  </div>
	  <div class="form-group">
	   <tr><th><label>Category&emsp;&emsp;&emsp;&nbsp;:</label></th><td><input type="text" class="form-control" name="category" placeholder="CATEGORY" required></td></tr>
	  </div>
	  <div class="form-group">
      <tr><td><center><input class="btn btn-info" name="submit" type="submit" value="Submit"></center></td></tr>
	 </div>
     </form>	
	</table> 
   </div>	
   </form>
   </table>	
  </div>
  <div class="copyright">
		  <h5> Copyrights © 2018 All Rights Reserved	</h5>
    </div>
   <script>
   function myFunction() {
     var x = document.getElementById("myTopnav");
     if (x.className === "topnav") {
        x.className += " responsive";
     } else {
        x.className = "topnav";
     }
   }
  </script>
 </body>
</html>
   