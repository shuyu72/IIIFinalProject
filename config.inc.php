<?php

$servername = "23.101.12.30";
$username = "root";
$password = "p@ssw0rd";
$dbname = "stock";

try {
    	$connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	mysqli_set_charset($connection,"utf8");
    }
catch(PDOException $e)
    {
    	die("OOPs something went wrong");
    }

?>
