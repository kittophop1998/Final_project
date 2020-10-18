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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white">แก้ไขข้อมูลนักเรียน</font></td></tr>
                        <td> </td>
                        <td> </td>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="zadd.php"><font color="white">back</font></a></td></tr>>
                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>

</html>

<body>
<center>
<br>
<br>
<br>
<br>
    <h1>แก้ไขข้อมูลนักเรียน</h1>
    <form action="editdb.php">
        <table>
            <tr>
            <br>
<br>

                <th>รหัสนักเรียน</th>
                <td><input type="text" name="keyword"></td>
                <td><input type="submit" name="submit" value="ค้นหา"></td>
            </tr>
        </table>
    </form>

<?php
    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'บันทึกข้อมูล'){
        $sql = "update student set ";
        $sql .= " student_name = ' ".$_REQUEST['student_name']." ', ";
        $sql .= " student_sername = ' ".$_REQUEST['student_sername']." ' ";
        $sql .= " where student_number = ' ".$_REQUEST['student_number']." ' ";
        $r = $conn->query($sql);

        if(!$r){
            print("error [".$conn->errno."] " . $conn->error);
            $id = $_REQUEST['student_number'];
            $name = $_REQUEST['student_name'];
            $price = $_REQUEST['student_sername'];
        }else{
            echo "update complete!!!!!! <br> Click <a href='testhome.php'>Back</a> to home page";
            exit;
        }
    }

    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ค้นหา'){
        $sql = "select * from student ";
        $sql = $sql . " where student_number = '".$_REQUEST['keyword']."' ";
        $rs = $conn->query($sql);
        if ($rs->num_rows == 0){
            echo "--------------  No match record---------------";
            exit;
        }else{
            $row = $rs->fetch_array();
            $id = $row['student_number'];
            $name = $row['student_name'];
            $sername = $row['student_sername'];
?>

<form action="editdb.php" method="get">
            <input type="hidden" value="<?php echo $id;?>" name="student_number" />
        <table>
            <tr>
                <th>รหัสนักเรียน</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>ชื่อ</th>
                <td><input type="text" name="student_name" required  maxlength="50" value="<?php echo $name;?>"/></td>
                <th>สกุล</th>
                <td><input type="text" name="student_sername" maxlength="4" min=0 max=9999 value="<?php echo $sername;?>"/></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="บันทึกข้อมูล" name='submit'> <input type="reset" /> </td>
            </tr>

        </table>
    </form>

<?php


        }
    }




?>
</center>

</body>
</html>
