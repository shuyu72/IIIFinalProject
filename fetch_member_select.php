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


$set_var=mysqli_query($con,"SET @t1=0;");
$result=mysqli_query($con,"SELECT @t1 := @t1+1 as serial_number, member_select.* from member_select where memberID=1;");



$tmp=[];
while($row=mysqli_fetch_assoc($result)){
        $tmp[]=$row;
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
