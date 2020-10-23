<?php
session_start();
include"DBconfigure.php";
if(varifyuser())
{
  $name=$_SESSION['sun'];
}
else
{
  header("location:index.php");
}
?>
<html>
<head>
<?php 
include"header.php"; 
?>
<meta charset="utf-8">
  <meta name="viewport"content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php  
include "nav2.php"; 
?>
<div class="container"style="margin-top:50px">
<h1 class="text-center"style="font-family:'Comic Sans MS';color:#0099FF;font-size:40px">Product Order</h1>
<form method=POST enctype="multipart/form-data">
<div class="form-group">
<label><b>Product Name</b></label>
<input type=text name="name"class="form-control"placeholder="Enter product name here">
<br>
<label><b>Category</b></label>
<select name="category"class="form-control">
<?php
$query="select * from category";
$recieve=my_select($query);
while($row=mysqli_fetch_array($recieve))
{
  echo"<option value='$row[0]'>'$row[1]'</option>";
}
?>
</select>
<br>
<label><b>Price</b></label>
<input type="text"name="price"class="form-control">
<br>
<label><b>Description</b></label>
<textarea name="description"class="form-control">
</textarea>
<br>
<input type="submit"class="btn btn-primary"name="submit"value="submit">
<br>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  move_uploaded_file($_FILES['image']['tmp_name'],"uploadimage/".$_FILES['image']['name']);
  $image="uploadimage/".$_FILES['image']['name'];
  $category=$_POST['category'];
  $price=$_POST['price'];
  $description=$_POST['description'];

  $query="insert into product(name,image,category,price,description) values('$name','$image','$category','$price','$description')";

$n=my_iud($query);
if($n==1)
{
  echo'<script>alert("Product Added Succesfully");
  window.location="viewproduct.php";
  </script>';
}
else
{
 echo'<script>alert("Something went to wrong");
 </script>';
}
}
?>
