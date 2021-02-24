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





$myemail = $_GET['email'];

$stmt=mysqli_query($con,
"select companyID , company_name from stock_title where companyID not IN ( SELECT companyID FROM optional WHERE email = '".$myemail."')ORDER BY companyID ASC");

while($srow=mysqli_fetch_assoc($stmt)){
    $tmp[]=$srow;
}




    
echo json_encode($tmp);
mysqli_close($con);







if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}






?>
