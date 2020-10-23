<?php
include "nav2.php"; 
session_start();
include"DBconfigure.php";
if(varifyadmin())
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

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="margin-top:15px">
<h1 class="text-left" style="font-family:'Arial Rounded MT'; color:#0099FF; font-size:30px">Dashboard</h1>
</div>
<div class="container" style="background-color:white; margin-top:15px; border:2px solid black; width:1000px; height:300px;">
<h6 class="text-left" style="font-family:'Arial Rounded MT'; color:#000000; font-size:20px">Types of Traffic</h6>
<?php
 
$dataPoints = array( 
	array("y" => 3373.64, "label" => "Bhopal" ),
	array("y" => 2435.94, "label" => "Indore" ),
	array("y" => 1842.55, "label" => "Vidisha" ),
	array("y" => 1828.55, "label" => "Mandideep" ),
	array("y" => 1039.99, "label" => "MP Nagar" ),
	array("y" => 765.215, "label" => "Jaipur" ),

);
 
?>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Gifties"
	},
	axisY: {
		title: "Gifties"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height:200px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                              
</div>
</body>
</html>
