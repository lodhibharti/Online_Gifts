<html>
<head>
<?php 
include "Header.php";
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
<html>
</html>
<?php
include"Nav2.php";
?>
<head>
<div class="container"style="margin-top:50px">
<h1 class="text-center"style="font-family:'Monotype Corsiva';color:#0099FF">View All Feedback</h1>
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
  <link rel="stylesheet"href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
</head>
<body>
<?php  
include"DBconfigure.php";
?>
<?php
$query="select * from feedback";
$recieve=my_select($query);
echo"<br><table class = 'table table-hover' id=example>";
echo"<thead style='background-color:lightblue;color:black' >";
echo"<tr>";
echo"<th> Sr. No. </th>";
echo"<th> Name </th>";
echo"<th> Contact </th>";
echo"<th> EmailID </th>";
echo"<th> Date </th>";
echo"<th> Message </th>";
echo"<th> Action </th>";
echo"</thead>";
echo"<tbody>";
$index = 0;
while($row = mysqli_fetch_array($recieve) )
{
    $index++;
 echo"<tr>";
 echo"<td>$index</td>";
 echo"<td>$row[1]</td>";
 echo"<td>$row[2]</td>";
 echo"<td>$row[3]</td>";
 echo"<td>$row[4]</td>";
 echo"<td>$row[5]</td>";
 echo"<td><a href='deletefeedback.php?id=$row[0]'class='btn btn-primary'>Delete</td>";
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