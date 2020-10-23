<html>
<head>
<?php 
include "Header.php";
?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include "Nav1.php";
?>
<div class="container"style="margin-top:50px">
<h1 class="text-center"style="font-family:'Monotype Corsiva';color:#0099FF">User Ragistration</h1>
<form method="post">
<div class="form-group">
<label><b>User Name</b></label>
<input type="text"name="username"class="form-control"placeholder="Enter your Name Here">
<label><b>Password</b></label>
<input type="password"name="password"class="form-control"placeholder="Enter your Password">
<label><b>City</b></label>
<input type="text"name="city"class="form-control"placeholder="Enter your city Here">
<label><b>Address</b></label>
<textarea name="address"class="form-control"placeholder="Enter your address Here"></textarea>
<label><b>EmailID</b></label>
<input type="Email"name="Email"class="form-control"placeholder="Enter your EmailID Here">
<label><b>Contact</b></label>
<input type="text"name="contact"class="form-control"placeholder="Enter your Contact Number Here">
<br>
<input type="submit"name="submit"value="Submit"class="btn btn-primary">
</div>
</form>
</div>
</body>
</html>
<?php
include"DBconfigure.php";
if(isset($_POST['submit']))
{
 $username = $_POST['username'];
 $password = $_POST['password'];
 $city = $_POST['city'];
 $address = $_POST['address'];
 $emailid = $_POST['Email'];
 $contact = $_POST['contact'];
 $query = "insert into siteuser values('$username','$password','$city','$address','$emailid','$contact')";
my_iud($query);
$n = my_iud($query);
if($n!=1)
{
    echo '<script>alert("Sign Up successful");
    window.location="login.php";
    </script>';
}
else
{
    echo '<script>alert("Somthing went to wrong");</script>';
}
}
?>