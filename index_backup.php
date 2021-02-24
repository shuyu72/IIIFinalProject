<?php
ini_set("display_errors","On");
error_reporting(E_ALL);
$host='23.101.12.30';
$name='root';
$pwd='password';
$db='test';
$con=mysqli_connect($host,$name,$pwd)or die("connection failed");
mysqli_set_charset($con,"utf8");
mysqli_select_db($con,$db)or die("db selection failed");
$result=mysqli_query($con,"SELECT * FROM test");
while($row=mysqli_fetch_assoc($result)){
$tmp[]=$row;
}
echo json_encode($tmp);
mysql_close($con);
?>
