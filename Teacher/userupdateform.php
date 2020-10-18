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
                        <td> </td>
                        <td> </td>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="student_manage.php"><font color="white">back</font></a></td></tr>
                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>

</html>

<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database:
include('db1.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//ตรวจสอบถ้าว่างให้เด้งไปหน้าหลัก
if($_GET["student_number"]==''){
echo "<script type='text/javascript'>";
echo "alert('Error Contact Admin !!');";
echo "window.location = 'showmember.php'; ";
echo "</script>";
}

//รับค่าไอดีที่จะแก้ไข
$student_number = mysqli_real_escape_string($con,$_GET['student_number']);

//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM student WHERE student_number='$student_number' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>

<form action="userupdate_db.php" method="post" name="updateuser" id="updateuser">
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40" colspan="2" align="center" bgcolor="#D6D5D6"><b>แก้ไขข้อมูลนักเรียน</b></td>
    </tr>
    <br>
    <br>
    <tr>
      <td align="right" bgcolor="#EBEBEB"> รหัสนักเรียน </td>
      <td width="583" bgcolor="#EBEBEB"><input name="student_number" type="int" id="student_number" value="<?=$student_number;?>" size="30" placeholder="ภาษาไทยหรืออังกฤษ"  required="required"  /></td>
    </tr>
    </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
      <td bgcolor="#EBEBEB">&nbsp;</td>
    </tr>
    <tr>
      <td width="117" align="right" bgcolor="#EBEBEB">ชื่อ </td>
      <td width="583" bgcolor="#EBEBEB"><input name="student_name" type="text" id="student_name" value="<?=$student_name;?>" size="30" placeholder="ภาษาไทยหรืออังกฤษ"  required="required"  /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
      <td bgcolor="#EBEBEB">&nbsp;</td>
    </tr>
    <tr>
      <td width="117" align="right" bgcolor="#EBEBEB">สกุล</td>
      <td width="583" bgcolor="#EBEBEB"><input name="student_surname" type="text" id="student_surname" value="<?=$student_surname;?>" size="30" placeholder="ภาษาไทยหรืออังกฤษ"  required="required"  /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
      <td bgcolor="#EBEBEB">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#EBEBEB"> เบอร์โทร </td>
      <td bgcolor="#EBEBEB"><input type="int" name="student_tel" id="student_tel" value="<?=$student_tel;?>"  placeholder="ตัวเลขเท่านั้น"  required="required"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
      <td bgcolor="#EBEBEB">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#EBEBEB"> ชั้นปี
        <label> </label></td>
      <td bgcolor="#EBEBEB"><input type="int" name="student_year" id="student_year" value="<?=$student_year;?>" placeholder="ตัวเลข" required/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
      <td bgcolor="#EBEBEB">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#EBEBEB"> ห้อง </td>
      <td bgcolor="#EBEBEB"><input name="student_room" type="int" id="student_room" value="<?=$student_room;?>" size="30" placeholder="ตัวเลข"  required="required"/></td>
    </tr>
    <tr>
      <td bgcolor="#EBEBEB">&nbsp;</td>
      <td bgcolor="#EBEBEB">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#EBEBEB">&nbsp;</td>
      <td bgcolor="#EBEBEB">&nbsp;
        <input type="button" value=" ยกเลิก " onclick="window.location='showmember.php' " /> <!-- ถ้าไม่แก้ไขให้กลับไปหน้าแสดงรายการ -->
        &nbsp;
        <input type="submit" name="Update" id="Update" value="Update" /></td>
    </tr>
    <tr>
      <td bgcolor="#EBEBEB">&nbsp;</td>
      <td bgcolor="#EBEBEB">&nbsp;</td>
    </tr>
  </table>
</form>
