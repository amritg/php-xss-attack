<?php
	$serverName = "localhost";
	$userName  = "root";
	$password = "";
	$dbName = "trusty-bank";
	$conn = mysqli_connect($serverName, $userName, $password, $dbName);
	
	if(!$conn){
		die("Connection failed");
	}
?>
