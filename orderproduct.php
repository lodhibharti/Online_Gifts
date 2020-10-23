<html>
<head>
<?php 
include "Header.php";
?>
<meta charset="utf-8">
  <meta name="viewport"content="width=device-width, initial-scale=1">
  <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include "Nav1.php";
?>
<div class="container"style="margin-top:50px">
<h1 class="text-center"style="font-family:'Monotype Corsiva';color:#673AB7"> User Login </h1>
<form method=post>
<div class="form-group">
<label><b>Email id</b></label>
<input type="email" name="emailid" class="form-control" placeholder="Enter your Name">
<label><b>Password</b></label>
<input type="password" name="password" class="form-control" placeholder="Enter your Password">
<br>
<input type="submit" name="submit" value="Login" class="btn btn-primary">
</div>
</form>
</div>
</body>
</html>
<?php 
session_start();
include "DBconfigure.php";
if(isset($_POST['submit']))
{
  $emailid=$_POST['emailid'];
  $password=$_POST['password'];
  if(isset($_POST['rem']))
  {
    $remember="yes";
  }
  else
  {
    $remember="no";
  }
  $query="select count(*) from siteuser where Emailid='$emailid' and password='$password'";

$ans= my_one($query);
if($ans==1)
{
  $_SESSION['semail']=$emailid;
  $_SESSION['spassword']=$password;

  if($remember=='yes')
  {
    setcookie('cemail',$emailid,time()+60*60*24*7);
    setcookie('cemail',$password,time()+60*60*24*7);
  }
  
  header("location:order.php");
 
}
else
{
  echo'<script>alert("invalid login credentials,Try again")</script>';
}
}
?>
