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
   $address=$row[3];
   $contact=$row[5];
 }
}
else
{
	header("location:login.php");
}
?>
<html>
<head>
<style>
td{
  color : #673AB7;
}
</style>
<?php 
include"Header.php";
?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
</head>
<body>
<?php
include"Nav2.php";
echo"<br>&nbsp;&nbsp;<b style='color:#0099FF; text-transform:capatalize; font-family:monotype corsiva;font-size:150%;'>Welcome $username</b>";
?>
<div class="container">
<h2 class="text-center"style='font-family:monotype corsiva;color:#0099FF;';><b>Edit profile</b></h2>
<br>
<br>
<form method="post">
<table class="table">
<tr>
<th>UserName</th>
<td><input type="text" name="username1" class="form-control" placeholder="<?php echo $username;?>"></td>
</tr>
<tr>
<th>City</th>
<td><input type="text" name="city1" class="form-control" placeholder="<?php echo $city;?>"></td>
</tr>
<tr>
<th>Address</th>
<td><input type="text" name="address1" class="form-control" placeholder="<?php echo $address;?>"></td>
</tr>
<tr>
<th>Contact</th>
<td><input type="text" name="contact1"class="form-control" placeholder="<?php echo $contact;?>"></td>
</tr>
</table>
<input type="submit" name="submit" value="submit" class="btn btn-primary">
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{   $emailid= $_SESSION['semail'];
    $username1=$_POST['username1'];
    $city1=$_POST['city1'];
    $address1=$_POST['address1'];
    $contact1=$_POST['contact1'];
    $query="update siteuser set username='$username1',city='$city1',address='$address1',contact='$contact1' where emailid='$emailid'";
    $n=my_iud($query);
    if($n==1)
    {
      echo'<script>
      alert("Profile Updated Successfully");
      window.location="Home.php";
      </script>';
    }
    else
    {
      echo'<script>
      alert("something went to wrong");
      window.location="Editprofile.php";
      </script>';
    }
}
?>