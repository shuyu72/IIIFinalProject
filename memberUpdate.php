<?php
function connect(){
  ini_set("display_errors","On");//除錯用
  error_reporting(E_ALL);
  $host='23.101.12.30';
  $name='root';
  $pwd='p@ssw0rd';
  $db='stock';

  $con=mysqli_connect($host,$name,$pwd,$db);
  mysqli_set_charset($con,"utf8");
  if($con == false){
    //echo "資料庫連線失敗";
    die("connection failed");
  }else{
    //echo "mysqli_connect($host,$name,$pwd)";
    //echo "資料庫連結成功";
    return $con;
  }
}

function memberUpdate(){
    $conn = connect();

      $Email = $_GET['email'];
      $FastName = $_GET['name'];
      $Phone = $_GET['phone'];
      $Birthday = $_GET['birthday'];
      $Address = $_GET['address'];
      $Gender = $_GET['gender'];
      $Password = $_GET['password'];
      $Phone2 = $_GET['phone2'];

      $stmt=mysqli_query($conn,"update member set fname='".$FastName."',password='".$Password."',gender='".$Gender."',
                            birthday='".$Birthday."',address='".$Address."',phone='".$Phone."',phone2='".$Phone2."'
                            where email='".$Email."'");
      mysqli_close($conn);
}
memberUpdate();


?>