<?php
session_start();
include "DBconfigure.php";
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
<style>
  .table tr th {
    background-color:#0099FF;
  }
</style>
<?php 
include"header.php"; 
?>
<meta charset="utf-8">
  <meta name="viewport"content="width=device-width, initial-scale=1">
  <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
include"nav2.php"; 
?>
<div class="container"style="margin-top:50px">
<h1 class="text-center"style="font-family:'Comic Sans MS';color:#0099FF;font-size:40px">View Category</h1>
<?php
$query="select * from category";
$recieve=my_select($query);
echo"<br><table class = 'table table-hover' id=example>";
echo"<thead style='background-color:lightblue;color:black' >";
echo"<tr>";
echo"<th>Sr.No</th>";
echo"<th>Category ID</th>";
echo"<th>Category Name</th>";
echo"<th>image</th>";
echo"<th>Action</th>";
echo"</thead>";
echo"<tbody>";

$index = 0;
while($row = mysqli_fetch_array($recieve) )
{
    $index++;
 echo"<tr>";
 echo"<td>$index</td>";
 echo"<td>$row[0]</td>";
 echo"<td>$row[1]</td>";
 echo"<td><img src = $row[2] width=150 height=100></td>";
 echo"<td><a href='deletecategory.php?id=$row[0]' class='btn btn-danger'>Delete</td>";
 echo"</tr>";
}
echo"</tbody>";
echo"</table>";
?>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
</div>
</body>
</html>
