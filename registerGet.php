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

  function addmember(){
  $conn = connect();
  
      $FastName = $_GET['fname'];
      $Email = $_GET['email'];
      $Phone = $_GET['phone'];
      $Password = $_GET['password'];

      $stmt1=mysqli_query($conn,"select email from member where email = '".$Email."'");
      $num = mysqli_num_rows($stmt1);
      if($num==0){
       $stmt2=mysqli_query($conn,"insert into member(fname,email,phone,password)
                     values('".$FastName."','".$Email."','".$Phone."','".$Password."')");
            $tmp2=[];
            $row2 = array("count" => "1");
            $tmp2[] = $row2;
            echo json_encode($tmp2);
       mysqli_close($conn);
      }else{
           $tmp=[];
            $row = array("count" => "0");
            $tmp[] = $row;
            
           echo json_encode($tmp);
           mysqli_close($conn);
      }

  } 
addmember();
?>
