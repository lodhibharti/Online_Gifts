<?php
session_start();
$_SESSION['semail'] = "";
$_SESSION['spassword'] = "";
session_destroy();
setcookie('cun',$adminname,time()-60*60*24*7);
     setcookie('cpwd',$password,time()-60*60*24*7);
     header("location:index.php");


?>