
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

  function memberin(){
      $conn = connect();
      $Email = $_GET['email'];
      $Password = $_GET['password'];
     
  
       $stmt=mysqli_query($conn,"select email from member where email='".$Email."' and password = '".$Password."'");
       $num = mysqli_num_rows($stmt);
       if($num==0){
           $tmp2=[];
            $row = array("email" => "0");
            $tmp2[] = $row;
            
           echo json_encode($tmp2);
           //die(FormatErrors(mysqli_error()));
       }else{
           //echo("<br>登入成功<br>");
           $tmp=[];
           while($row=mysqli_fetch_assoc($stmt)){
            $tmp[]=$row;
            }
            echo json_encode($tmp);
           
       }
       
       mysqli_close($conn);
  } 
memberin();
?>
