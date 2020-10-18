<meta charset="UTF-8">
<?php
include('db1.php');  
$beacon = $_REQUEST["beacon"];
$date = $_REQUEST["date"];
$student_number = $_REQUEST["student_number"];

$sql = "UPDATE status SET status = 'ลา' WHERE beacon='$beacon' AND date ='$date' ";
$sql3 = "UPDATE `l_leave` SET `accept` = 'อนุมัติ' WHERE l_leave.student_number='$student_number' AND l_leave.date_leave='$date' ";
//$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
// $result1 = mysqli_query($con, $sql3) or die ("Error in query: $sql3 " . mysqli_error());
$result=$con->query($sql);
$result1=$con->query($sql3);
	if($result && $result1){
	echo "<script type='text/javascript'>";
	echo "alert('update Succesfuly');";
	echo "window.location = 'admin_leave.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to delete again');";
	echo "</script>";
}
?>
