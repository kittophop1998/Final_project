<title>โรงเรียนLine Beacon</title>
            <link rel="SHORTCUT ICON" href="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png">
            <script language="Javascript">
                <!--
                    function printWindow(){
                        browserVersion = parseInt(navigator.appVersion)
                        if (browserVersion >= 4) window.print()
                    }

            </script>
<meta charset="UTF-8">
<?php
include('db1.php');  
$beacon = $_REQUEST["beacon"];
$date = $_REQUEST["date"];
$date_status = $_REQUEST["date_status"];
$student_number = $_REQUEST["student_number"];
$status_fix = $_REQUEST["status_fix"];

$sql = "UPDATE status SET status = '$status_fix' WHERE status.beacon = '$beacon' AND status.date = '$date_status';";
$sql3 = "UPDATE petition SET accept = 'อนุมัติ' WHERE petition.student_number = '$student_number' AND petition.date_petition = '$date' ";

$result=$con->query($sql);
$result1=$con->query($sql3);

	if($result && $result1){
	echo "<script type='text/javascript'>";
	echo "alert('update Succesfuly');";
	echo "window.location = 'confirm_petition.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to delete again');";
	echo "</script>";
}
?>
