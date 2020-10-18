<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database:
include('db1.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า student_number จากไฟล์แสดงข้อมูล
$student_number = $_REQUEST["student_number"];

//ลบข้อมูลออกจาก database ตาม student_number ที่ส่งมา

$sql = "DELETE FROM student WHERE student_number='$student_number' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('delete Succesfuly');";
	echo "window.location = 'showmember.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to delete again');";
	echo "</script>";
}
?>
