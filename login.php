<?php
  session_start();
  
  include "connect.php";
	
	$strUsername = mysqli_real_escape_string($conn,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($conn,$_POST['txtPassword']);

	$strSQL = "SELECT * FROM member WHERE Username = '".$strUsername."' and Password = '".$strPassword."'";
  	$objQuery = $conn->query($strSQL);
  	$row = mysqli_fetch_array($objQuery);

  	$_SESSION["Userlevel"] = $row["Userlevel"];
  
	if(!$row){
		echo "Username and Password Incorrect!";
		echo "<script type='text/javascript'>";
			echo "window.location = 'index.php'";
		echo "</script>";
		exit();
	}else{
		if($row["Loginstatus"] == "1"){
			echo "'".$strUsername."' Exists login!";
			exit();
		}else{
			$sql = "UPDATE member SET Loginstatus = '1' , Lastupdate = NOW() WHERE id_number = '".$row["id_number"]."' ";
			$query = mysqli_query($conn,$sql);
			$_SESSION["id_number"] = $row["id_number"];
      session_write_close();
      if($_SESSION["Userlevel"]=="A"){
        header("location: ../testhome/Admin/index.php");
      }
      if ($_SESSION["Userlevel"]=="S"){
        header("Location: ../testhome/Student/index.php");
	  }
	  if ($_SESSION["Userlevel"]=="T"){
        header("Location: ../testhome/Teacher/index.php");
      }
		}
	}
	mysqli_close($conn);
?>