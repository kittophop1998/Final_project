<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
        <link rel="STYLESHEET" type="text/css" href="style/STYLE.css" charset="windows-874&quot;">


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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white">จัดการข้อมูลบุคลากร</font></td></tr>
                        <td> </td>
                        <td> </td>
                        <tr height="25" bgcolor="#1881fe"><td align="center"><a href="showmembertc.php"><font color="white">แก้ไขข้อมูลบุคลากร</font></a></td></tr>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="admin_2.php"><font color="white">back</font></a></td></tr>
                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มข้อมูล</title>

<?php

    error_reporting(0);
    $conn = new mysqli('localhost', 'root', '', 'check_system');

    if($conn->connect_errno){
        die("Error [".$conn->connect_errno."]" . $conn->connect_error);
    }
    $price = 0;
    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'เพิ่มข้อมูล'){
        $sql = "insert into teacher values('" . $_REQUEST['teacher_id']."','".$_REQUEST['teacher_name']."', '".$_REQUEST['teacher_surname']."','".$_REQUEST['teacher_tel']."', '".$_REQUEST['teacher_beacon']."', '".$_REQUEST['teacher_rfid']."', '".$_REQUEST['teacher_day']."')";
        $r = $conn->query($sql);

        if(!$r){
            print("error [".$conn->errno."] " . $conn->error);
            $id = $_REQUEST['teacher_id'];
            $name = $_REQUEST['teacher_name'];
            $sername = $_REQUEST['teacher_sername'];
            $tel = $_REQUEST['teacher_tel'];
            $beacon = $_REQUEST['teacher_beacon'];
            $rfid = $_REQUEST['teacher_rfid'];
            $day = $_REQUEST['teacher_day'];
        }else{
            echo "Add complete!!!!!! <br> Click <a href='datatc.php'>Back</a> to home page";
            exit;
        }

    }
?>
</head>

<br>
<br>
<br>

<body>
    <center>
    <h1>เพิ่มข้อมูลบุคลากร</h1>
    <form action="teacher_manage.php" method="get">
        <table>
        <br>
            <tr>
                <th>รหัสบุคลากร</th>
                <td><input type="text" name="teacher_id" required  maxlength="50" value="<?php echo $id;?>"/></td>
            </tr>
            <tr>
                <th>ชื่อ</th>
                <td><input type="text" name="teacher_name" required  maxlength="50" value="<?php echo $name;?>"/></td>
            </tr>
            <tr>
                <th>นามสกุล</th>
                <td><input type="text" name="teacher_surname" required  maxlength="50" value="<?php echo $sername;?>"/></td>
            </tr>
            <tr>
                <th>เบอร์โทร</th>
                <td><input type="text" name="teacher_tel" required  maxlength="50" value="<?php echo $tel;?>"/></td>
            </tr>
            <tr>
                <th>Beacon</th>
                <td><input type="text" name="teacher_beacon" required  maxlength="50" value="<?php echo $beacon;?>"/></td>
            </tr>
            <tr>
                <th>RFID</th>
                <td><input type="text" name="teacher_rfid" required  maxlength="50" value="<?php echo $rfid;?>"/></td>
            </tr>
            <tr>
                <th>เวรประจำวัน</th>
                <td>
                <select required  name="teacher_day">
                    <option <?php echo ($type == 1)?"selected":"";   ?>value="จันทร์">จันทร์</option>
                    <option <?php echo ($type == 2)?"selected":"";   ?> value="อังคาร">อังคาร</option>
                    <option <?php echo ($type == 3)?"selected":"";   ?> value="พุธ">พุธ</option>
                    <option <?php echo ($type == 4)?"selected":"";   ?> value="พฤหัสบดี">พฤหัสบดี</option>
                    <option <?php echo ($type == 5)?"selected":"";   ?> value="ศุกร์">ศุกร์</option>
                </select>
                </td>
            </tr>


                <th></th>
                <td><input type="submit" value="เพิ่มข้อมูล" name='submit'></td>
            </tr>

        </table>
    </form>
    </center>
</body>
</html>
