<?php
session_start();
include "DBconfigure.php";
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
<?php 
include"Header.php";
?>
<style>
td{
  color:#0099FF;
}
</style>
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
echo"<br>&nbsp;&nbsp;<b style='color:#0099FF; text-transform:capatalize; font-family: monotype corsiva;font-size:22;'>Welcome $username</b>";
?>
<div class="container">
<h2 class="text-center"style='font-family:monotype corsiva;color:#0099FF';><b>Change password</b></h2>
<br>
<br>

<form method=post>
<label><b>Old password</b></label>
<input type="password" name="oldpassword" class="form-control">
<label><b>New password</b></label>
<input type="password" name="newpassword" class="form-control">
<label><b>Confirm New password</b></label>
<input type="password" name="confirmpassword" class="form-control">
<br>
<input type="submit" name="submit" value="submit" class="btn btn-primary">
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $opassword = $_POST['oldpassword'];
    $npassword=$_POST['newpassword'];
    $cpassword=$_POST['confirmpassword'];

    if($npassword==$cpassword)
    {
        $query="update siteuser set password='$npassword' where emailid='$u' and password='$opassword'";
        $n=my_iud($query);
        if($n==1)
        {
            echo'<script>alert("Password updated successfully");window.location="login.php"</script>';
        }
        else
        {
            echo'<script>alert("something went to wrong,please Try again");window.location="login.php"</script>';

        }

    }
    else
    {
        echo'<script>alert("Password and confirm password does not match");</script>';

    }
}