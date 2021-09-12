<?php
	
	include_once 'dbh_inc.php';
	$discid = $_POST[print_r($user->id)];
	$avatar = $_POST[$user->avatar];
	$username = $_POST[$user->username];
	$sql = "INSERT INTO id (discid, avatar, username) VALUES ('$discid', '$avatar', '$username');";
	mysqli_query($conn, $sql);
	
?>