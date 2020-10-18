<?php
	session_start();
    include "connect.php";
	$sql = "UPDATE member SET Loginstatus = '0' , Lastupdate = '0000-00-00 00:00:00' WHERE id_number = '".$_SESSION["id_number"]."' ";
    $conn->query($sql);
	session_destroy();
	header("location: ../testhome/index.php");
?>