<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pool";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_errno()){
	echo "Failed";
	exit();
}
echo "Success!"
?>