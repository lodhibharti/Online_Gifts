<?php
include "nav2.php"; 
session_start();
include"DBconfigure.php";
if(varifyadmin())
{
  $name=$_SESSION['sun'];
  echo"<br>&nbsp;&nbsp;<b style='color:#0099FF; text-transform:capatalize; font-family: monotype corsiva;font-size:22;'>Welcome $name</b>";
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container"style="margin-top:50px">
<h1 class="text-center"style="font-family:'Comic Sans MS';color:#0099FF;font-size:40px">Add Category</h1>
<form method=POST enctype="multipart/form-data">
<div class="form-group">
<label><b>Category Name</b></label>
<input type=text name="categoryname" class="form-control" placeholder="Enter Category name here">
<br>
<label><b>Category Image</b></label>
<input type="file" name="image" class="form-control">
<br>
<input type="submit"class="btn btn-primary"name="submit"value="submit">
<br>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
  $categoryname = $_POST['categoryname'];
  move_uploaded_file($_FILES['image']['tmp_name'],"uploadimage/".$_FILES['image']['name']);
  $image="uploadimage/".$_FILES['image']['name'];
  $query="insert into Category(categoryname,image) values('$categoryname','$image')";
$n=my_iud($query);
if($n==1)
{
  echo'<script>alert("Category Added Succesfully");
  window.location="viewcategory.php";
  </script>';
}
else
{
 echo'<script>alert("Something went to wrong");
 </script>';
}
}
?>
</div>
</body>
</html>
