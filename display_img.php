<?php
$db_host="23.101.12.30";
$db_username='root';
$db_passwd='password';
$db_db='test';

$conn = mysqli_connect($db_host, $db_username, $db_passwd,$db_db);
if (!$conn) { 
 die("Connection failed: " . mysqli_connect_error()); 
}else{
 echo "連接成功"; 
$conn->query("SET NAMES 'utf8'"); 
}

$sql="SELECT Image FROM Images";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
 // 輸出每行數據
 while ($row=$result->fetch_assoc()) {
  
  echo '<img src="data:image/jpeg;base64,' . $row["Image"] . '" width="640px" height="480px">';
 }
} else {
 echo "0 個結果";
}

$conn->close();
?>
