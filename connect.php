<?php
	
	ini_set('display_errors', 1);
	error_reporting(~0);

	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "check_system";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

	// if (mysqli_connect_errno())
	// {
	// 	echo "Database Connect Failed : " . mysqli_connect_error();
	// 	exit();
	// }

	$intRejectTime = 1; // Minute
	$sql = "UPDATE member SET Loginstatus = '0', Lastupdate = '0000-00-00 00:00:00'  WHERE Loginstatus = '1' AND DATE_ADD(Lastupdate, INTERVAL $intRejectTime MINUTE) <= NOW() ";
	$query = mysqli_query($conn,$sql);

?>