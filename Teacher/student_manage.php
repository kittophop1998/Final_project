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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white">จัดการข้อมูลนักเรียน</font></td></tr>
                        <td> </td>
                        <td> </td>
                        <tr height="30" bgcolor="#1881fe"><td align="center"><a href="showmember.php"><font color="white">แก้ไขข้อมูลนักเรียน</font></a></td></tr>
                        <td> </td>
                        <td> </td>
                        <tr height="30" bgcolor="#FF0000"><td align="center"><a href="admin_2.php"><font color="white">back</font></a></td></tr>
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
        $sql = "insert into student values('" . $_REQUEST['student_number']."','".$_REQUEST['student_name']."', '".$_REQUEST['student_surname']."','".$_REQUEST['student_tel']."', '".$_REQUEST['student_year']."', '".$_REQUEST['student_room']."')";
        $r = $conn->query($sql);

        if(!$r){
            print("error [".$conn->errno."] " . $conn->error);
            $id = $_REQUEST['student_number'];
            $name = $_REQUEST['student_name'];
            $sername = $_REQUEST['student_sername'];
            $tel = $_REQUEST['student_tel'];
            $year = $_REQUEST['student_year'];
            $room = $_REQUEST['student_room'];
        }else{
            echo "Add complete!!!!!! <br> Click <a href='datast.php'>Back</a> to home page";
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
    <h1>เพิ่มข้อมูลนักเรียน</h1>
    <form action="student_manage.php" method="get">
        <table>
        <br>
            <tr>
                <th>รหัสนักเรียน</th>
                <td><input type="text" name="student_number" required  maxlength="50" value="<?php echo $number;?>"/></td>
            </tr>
            <tr>
                <th>ชื่อ</th>
                <td><input type="text" name="student_name" required  maxlength="50" value="<?php echo $name;?>"/></td>
            </tr>
            <tr>
                <th>นามสกุล</th>
                <td><input type="text" name="student_surname" required  maxlength="50" value="<?php echo $sername;?>"/></td>
            </tr>
            <tr>
                <th>เบอร์โทร</th>
                <td><input type="text" name="student_tel" required  maxlength="50" value="<?php echo $tel;?>"/></td>
            </tr>
            <tr>
                <th>ชั้นปี</th>
                <td>
                <select required  name="student_year">
                    <option <?php echo ($type == 1)?"selected":"";   ?>value="1">1</option>
                    <option <?php echo ($type == 2)?"selected":"";   ?> value="2">2</option>
                    <option <?php echo ($type == 3)?"selected":"";   ?> value="3">3</option>
                </select>
                </td>
            </tr>
            <tr>
                <th>ห้อง</th>
                <td>
                <select required  name="student_room">
                    <option <?php echo ($type == 1)?"selected":"";   ?>value="1">1</option>
                    <option <?php echo ($type == 2)?"selected":"";   ?> value="2">2</option>
                    <option <?php echo ($type == 3)?"selected":"";   ?> value="3">3</option>
                </select>
                </td>
            </tr>
            <tr>

                <th></th>
                <td><input type="submit" value="เพิ่มข้อมูล" name='submit'></td>
            </tr>

        </table>
    </form>
    </center>
</body>
</html>
