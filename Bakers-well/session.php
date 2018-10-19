<?php
$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con,"restaurant");
session_start();
$user_check=$_SESSION['login_user'];
$tableno=$_SESSION['Tableno'];
$sql="select Name,Tableno from register where Name='$user_check' AND Tableno='$tableno'";
$ses_sql=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['Name'];
$table_no=$row['Tableno'];
if(!isset($login_session)){
  mysqli_close($con);
  header('Location: index');
}
?>