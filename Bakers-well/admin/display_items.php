<?php
     $con = mysqli_connect("localhost", "root", "");
     $db = mysqli_select_db($con,"restaurant");
     session_start();
     $login_session ="Admin";
     if(!isset($login_session)){
       mysqli_close($con);
     header('Location: ../index');
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
      text-align: center;
    }
	th{
	   padding-top:10px;
	   text-align:center;
    }
	h3{
		text-align:center;
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
      <a href="add_items">Add Items</a>
      <a href="status_of_item">Status of Item</a>
	  <a href="#">Display Items</a>
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
   <div class="container"><br>
   <center><h3>Items</h3></center>
   <table width="100%" id="t01" border='1' align="center"> 
    <thead>
	 <tr><th>Id</th><th>Name</th><th>Code</th><th>Price in Rs.</th><th>Category</th><th>Status</th></tr>
    </thead>
	<tbody>
	 <form action="" method="post">
	<?php 
	  $con=mysqli_connect('localhost','root','','restaurant') or die("not connected to database server");
	  $sql="select * from items";
      $result=mysqli_query($con,$sql) or die('error getting data');
	  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
		    $id = $row['id'];
			$name = $row['name'];
			$code = $row['code'];
			$price = $row['price'];
			$category = $row['category'];
			$status = $row['status'];
			  echo "<tr align='center'>
			         <td>".$id."</td>
					 <td>".$name."</td>
					 <td>".$code."</td>
					 <td>".$price."</td>
					 <td>".$category."</td>
					 <td>".$status."</td></tr>";
			 }
	  ?>
	  </form>
	  </tbody>
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
   