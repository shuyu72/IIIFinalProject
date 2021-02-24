
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
    //echo "資料庫連結成功3";
    return $con;
  }
}

  function memberGet(){
      $conn = connect();
      $Email = $_GET['email'];
     
  
       $stmt=mysqli_query($conn,"select * from member where email='".$Email."'");
       $tmp=[];
           while($row=mysqli_fetch_assoc($stmt)){
            $tmp[]=$row;
            }
            echo json_encode($tmp);
       
       
       mysqli_close($conn);
  } 
memberGet();
?>
