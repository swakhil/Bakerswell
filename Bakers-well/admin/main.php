<?php
     $con = mysqli_connect("localhost", "root", "");
     $db = mysqli_select_db($con,"restaurant");
     session_start();
     $login_session ="Admin";
     if(!isset($login_session)){
       mysqli_close($con);
     header('Location: ../main');
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
  table {
    border-collapse: collapse;
	width:70%;
	margin-top:50px;
  }
   th {
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;
  }
  td{
	  padding: 8px;
    text-align: center;
  }
  thead{
	background-color:orange;
  }
  ul.breadcrumb {
    padding: 5px 16px;
    list-style: none;
    background-color: #eee;
  }
  ul.breadcrumb li {
    display: inline;
    font-size: 14px;
  }
  ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
  }
  ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
  }
  ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
  }
  .copyright {
        text-align:center;
	    background-color:#f6f6f6;
		padding:1px;
		margin-top:330px;
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
      <a href="#">Dashboard</a>
    </div>
   </div>	
   <div class="dropdown">
     <button class="dropbtn">Items&nbsp;
	 <i class="fa fa-caret-down"></i>
     </button>
	 <div class="dropdown-content">
      <a href="add_items">Add Items</a>
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
      <a href="logout">Log Out</a>
    </div>
   </div>   
  </div>
  <div class="container">
     <table width="70%" align="center">
	  <tr><td><i class="fa fa-user fa-4x" style="color:#736E6F"></td></tr>
	  <tr><th>Welcome Admin</th></tr>
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
  
