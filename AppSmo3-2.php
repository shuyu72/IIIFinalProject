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
$getTodayDate=getToday();




$myname = $_GET['name'];

$result=mysqli_query($con,"select * from stock_data 
where date >= date_sub(date_sub(CURDATE(),interval 1911 year),interval 7 day)  and  date <= date_sub(date_sub(CURDATE(),interval 1911 year),interval 1 day)  and  companyID LIKE '".$myname."'
ORDER BY `stock_data`.`date` DESC  LIMIT 1" );



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






function getToday(){
	date_default_timezone_set("Asia/Taipei");
	$today = getdate();
	date("Y/m/d H:i");  //?��??��???
	$year=$today["year"]; //�?
	$month=$today["mon"]; //??
	$day=$today["mday"];  //??
 
	if(strlen($month)=='1')$month='0'.$month;
	if(strlen($day)=='1')$day='0'.$day;
	$today=$year."-".$month."-".$day;
	//echo "今天?��? : ".$today;
 
	return $today;
}



?>
