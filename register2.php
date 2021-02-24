<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Receive Form</title>
<style type="text/css"></style>
<script type="application/javascript"></script>

</head >
<body>
<?php

header("Content-Type: text/html;charset=utf-8"); 
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
    echo "資料庫連線失敗";
    die("connection failed");
  }else{
    echo "mysqli_connect($host,$name,$pwd)";
    echo "資料庫連結成功3";
    return $con;
  }
}

  function addmember(){
  $conn = connect();
  
  
  $stmt=mysqli_query($conn,"insert into member_test(fname,sname,email,phone,password)values('游','偉雄','lala@gmail.com','0912345678','123123123'),('劉','一郎','test@gmail.com','505050','eerr'),('方','二郎','test2@gmail.com','6668888','oooo'),('張','曼玉','test3@gmail.com','1100000','pppp')");
  echo $stmt;
  
       if($stmt == false){
           echo("<br>資料新增失敗<br>");
           //die(FormatErrors(mysqli_error()));
       }else{
           echo("<br>資料新增成功<br>");
       }
       
       mysqli_close($conn);
  } 
addmember();
?>


</body>
</html>
