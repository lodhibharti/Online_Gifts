<?php
$servername="localhost";
$dbuser="root";
$dbpassword="";
$dbname="giftshopphp";
function my_iud($query)
{
    global $servername, $dbuser, $dbpassword, $dbname;
$cid=mysqli_connect($servername, $dbuser, $dbpassword) or die("Connection Failed");
mysqli_select_db($cid,$dbname);
mysqli_query($cid,$query);
$n=mysqli_affected_rows($cid);
mysqli_close($cid);
return $n;
}

function my_select($query)
{
    global $servername, $dbuser, $dbpassword, $dbname;
    $cid=mysqli_connect($servername, $dbuser, $dbpassword) or die("Connection Failed");
    mysqli_select_db($cid,$dbname);
    $recieve=mysqli_query($cid,$query);
   mysqli_close($cid);
    return $recieve;
}

function my_one($query)
{
    global $servername, $dbuser, $dbpassword, $dbname;
    $cid=mysqli_connect($servername, $dbuser, $dbpassword) or die("Connection Failed");
    mysqli_select_db($cid,$dbname);
    $recieve=mysqli_query($cid,$query);
    $row=mysqli_fetch_array($recieve);
    mysqli_close($cid);
    return $row[0];
}

function varifyadmin()
{
    $u="";
    $p="";
    if(isset($_COOKIE['cun']) && isset($_COOKIE['cpwd']))
    {
        $u=$_COOKIE['cun'];
        $p=$_COOKIE['cpwd'];
    }
    else
    {
        if(isset($_SESSION['sun']) && isset($_SESSION['spwd']))
        {
            $u=$_SESSION['sun'];
        $p=$_SESSION['spwd'];
        }
    }
    $query="select count(*) from admin where adminname='$u' and password='$p'";
    $n=my_one($query);
    if($n==1)
    {
        return true;
    }
    else
    {
       return false;
    }
}
function varifyuser()
{
    $u="";
    $p="";
    if(isset($_COOKIE['cun']) && isset($_COOKIE['cpwd']))
    {
        $u=$_COOKIE['cun'];
        $p=$_COOKIE['cpwd'];
    }
    else
    {
        if(isset($_SESSION['sun']) && isset($_SESSION['spwd']))
        {
            $u=$_SESSION['sun'];
        $p=$_SESSION['spwd'];
        }
    }
    $query = "select count(*) from siteuser where emailid='$u' and password='$p'";
    $n = my_one($query);
    if($n==1)
    {
        return true;
    }
    else
    {
       return false;
    }
}
?>