<html>
<head>
<?php 
include"Header.php";
?>
<style>
  .table tr th {
    background-color:#0099FF;
  }
</style>
<meta charset="utf-8">
  <meta name="viewport"content="width=device-width, initial-scale=1">
  <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include"Nav1.php";
?>
<div id="demo" class="carousel slide" data-ride="carousel" style="margin-top:5px">
<ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
</ul>
<div class="carousel-inner">
<div class="carousel-item active">
<img src="assets/image/image1.jpg" width="1400" height="400">
</div>
<div class="carousel-item">
<img src="assets/image/birthday-gifts-for-women.webp" width="2000" height="400">
</div>
<div class="carousel-item">
<img src="assets/image/download (1).jpg" width="2000" height="400">
</div>
<div class="carousel-item">
<img src="assets/image/download (2).jpg" width="2000" height="400">
</div>
<div class="carousel-item">
<img src="assets/image/download.jpg" width="2000" height="400">
</div>
<div class="carousel-item">
<img src="assets/image/gifts.jpg" width="2000" height="400">
</div>
<div>
<a class="carousel-control-prev" href="#demo" data-slide="prev">
<span class="carousel-control-prev-icon"></span></a>
<a class="carousel-control-next" href="#demo" data-slide="next">
<span class="carousel-control-next-icon"></span></a>
</div>
</div>
</div>
<br>
<!--carousel end--> 
<div class="container">
<h1 class="text-center"style='font-family:monotype corsiva;color:#0099FF';><b>Our project Categories</b></h1>
<br>
<br>
<?php
include"DBconfigure.php";
$query="select * from category";
$recieve=my_select($query);
echo"<div class='row'>";
while($row=mysqli_fetch_array($recieve))
{
echo"<div class='col-sm-4'>";
echo"<h3 class='text-center'style='font-family:monotype corsiva;color:#003322';>$row[1]</h3>";
$loc="admin/".$row[2];
echo"<img class='zoom' src='$loc' style='width:300px; height:200px'>";
echo"</div>";
}
echo"</div>";
?>
</div>
