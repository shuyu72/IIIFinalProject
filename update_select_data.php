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

$memberID ='';
$memberID=isset($_GET["memberID"])?$_GET["memberID"]:'';
$isSelect ='';
$isSelect=isset($_GET["isSelect"])?$_GET["isSelect"]:'';
$companyID ='';
$companyID=isset($_GET["companyID"])?$_GET["companyID"]:'';


$sql = "UPDATE member_select SET isSelect ='".$isSelect."'  WHERE memberID='".$memberID."' and companyID=".$companyID;
$do = mysqli_query($con, $sql);
if(mysqli_affected_rows($con) >0){
echo 0;
}
else{
   echo $memberID;
}  






if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}


?>
