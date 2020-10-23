<?php
session_start();
include"DBconfigure.php";
if(varifyuser())
{
  $u=$_SESSION['semail'];
  $query="select * from siteuser where emailid='$u'";
  $recieve=my_select($query);
  if($row=mysqli_fetch_array($recieve))
  {
    $username=$row[0];
    $city=$row[2];
    $Address=$row[3];
    $Emailid=$row[4];
    $contact=$row[5];
  }
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

<div class="container"style="margin-top:20px">
<h1 class="text-center"style="font-family:'Comic Sans MS';color:#0099FF;font-size:40px">Send Feedback</h1>
<form method=POST>

<h2 class="text-center" style="font-family:'Arial'; color:#0099ff; font-size:15px; font-weight:bold;">Please provide your Feedback Below:</h2>
<br>
<br>
<label><b> your Message:</b></label>
<br>
<textarea class="form-control" type="textarea" name="msg" id="Msg" placeholder="Your Comments" rows="10"></textarea>
<br>
<button type="submit" name="submit" class="btn btn-success" >Post</button>
</div>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
  $msg = $_POST['msg'];
  $date=date("d-m-y");
  $query = "insert into feedback(name,contact,emailid,date,msg) values('$username','$contact','$u','$date','$msg')";
  $n=my_iud($query);
  if($n==1)
  {
    echo'<script>alert("Feedback Send Succesfully");
    window.location="admin/viewfeedback.php";
    </script>';
  }
  else
  {
   echo'<script>alert("Something went to wrong");
   </script>';
  }
}
?>


  







0



