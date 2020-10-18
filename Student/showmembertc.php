<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
        <link rel="STYLESHEET" type="text/css" href="style/STYLE.css" charset="windows-874&quot;">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


        <title>โรงเรียนLine Beacon</title>
            <link rel="SHORTCUT ICON" href="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png">
            <script language="Javascript">
                <!--
                    function printWindow(){
                        browserVersion = parseInt(navigator.appVersion)
                        if (browserVersion >= 4) window.print()
                    }

            </script>
    </head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF" text="#000000" alink="#003399" link="#003399" vlink="#003399">
    <img src= "https://www.img.in.th/images/9fcf3f685b7d75520d2230401b80e1e9.png" width="100%" height="50%">
        <table width="100%" height="50%" border="1" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr valign="middle">
                        <tr height="100%" valign="top">
                            <td bgcolor="#FFCC00" align="center" width="180">
                            <table width="180">

                    <tbody>
                        <tr size="1" width=100%""><td align="center"><img src="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png"><a href="home.asp?lang=2"></a></td></span></tr>
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white">แก้ไขข้อมูล</font></td></tr>

                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="teacher_manage.php"><font color="white">back</font></a></td></tr>
                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>

</html>



<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database:
include('db1.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//2. query ข้อมูลจากตาราง:
$query = "SELECT * FROM teacher ORDER BY teacher_id asc" or die("Error:" . mysqli_error());
//3. execute the query.
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา:

//ใช้ตารางในการจัดข้อมูล
echo "<table align='center' width='700' class='table table-striped'>";
//หัวข้อตาราง
echo "<tr align='left' bgcolor='#CCCCCC'><td>รหัส</td><td>ชื่อ</td><td>สกุล</td><td>แก้ไข</td><td>ลบ</td></tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" .$row["teacher_id"] .  "</td> ";
  echo "<td>" .$row["teacher_name"] .  "</td> ";
  echo "<td>" .$row["teacher_surname"] .  "</td> ";

  //แก้ไขข้อมูลส่่ง member_id ที่จะแก้ไขไปที่ฟอร์ม
  echo "<td><a href='userupdateformtc.php?teacher_id=$row[0]'>แก้ไขข้อมูล</a></td> ";

    //ลบข้อมูล
    echo "<td><a href='UserDeletetc.php?teacher_id=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\">ลบข้อมูล</a></td> ";
    echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($con);
?>
