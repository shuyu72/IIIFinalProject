<?php
ini_set("display_errors","On");
error_reporting(E_ALL);
$host='23.101.12.30';
$name='root';
$pwd='p@ssw0rd';
$db='stock';

$con=mysqli_connect($host,$name,$pwd)or die("connection failed");
mysqli_set_charset($con,"utf8");
mysqli_select_db($con,$db)or die("db selection failed");


$copy_sql=mysqli_query($con,"INSERT into member_select (companyID) SELECT companyID FROM stock_title;");


$do_set_is_select=mysqli_query($con,"call set_is_select();");
$do_set_memberID=mysqli_query($con,"call set_memberID(1);");



mysqli_close($con);




if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}






?>
