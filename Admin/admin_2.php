<html>
    <head>
    <title>โรงเรียนLine Beacon</title>
            <link rel="SHORTCUT ICON" href="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png">
            <script language="Javascript">
                <!--
                    function printWindow(){
                        browserVersion = parseInt(navigator.appVersion)
                        if (browserVersion >= 4) window.print()
                    }

            </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
            $(document).ready(function(){
                setInterval(function(){
                    $("#autodata").load("readAp.php");
                    refresh();
                },2000);
            });
    </script>
        <?php
            include "../connect.php";
        ?>
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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white">Admin</font></td></tr>
                        <tr height="25" bgcolor="#1881fe"><td align="center"><a href="admin_leave.php"><font color="white">ยืนยันการลา</font></a></td></tr>
                        <tr height="25" bgcolor="#1881fe"><td align="center"><a href="confirm_petition.php"><font color="white">ยืนยันการยื่นคำร้อง</font></a></td></tr>
                        <tr height="30" bgcolor="#1881fe"><td align="center"><a href="student_manage.php"><font color="white">จัดการข้อมูลนักเรียน</font></a></td></tr>
                        <tr height="30" bgcolor="#1881fe"><td align="center"><a href="teacher_manage.php"><font color="white">จัดการข้อมูลบุคลากร</font></a></td></tr>
                        <tr height="30" bgcolor="#1881fe"><td align="center"><a href="add_user.php"><font color="white">เพิ่มข้อมูลลงทะเบียน</font></a></td></tr>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="index.php"><font color="white">กลับ</font></a></td></tr>

                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>
        <br>
        <center><font size="5">รายชื่อนักเรียนขาดเรียน วันที่ : <?php echo date("Y-m-d")?></font></center><br>
        <div id="autodata"></div>
        <!-- <center>
        <form action="admin_2.php" method="get">
            <input type="submit" name="submit" value="ตกลง">
        </form>
        </center> -->

        <?php
            

            if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ตกลง'){
                $sql = "SELECT beacon , curdate() as date FROM beacon_student INNER JOIN student on beacon_student.student_number=student.student_number WHERE beacon_student.beacon NOT IN (SELECT beacon FROM timestamp WHERE date(Datetime)=curdate())";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $beacon = $row["beacon"];
                    $date = $row["date"];
                    $sql2="INSERT IGNORE INTO status (beacon,date,status) VALUES ('$beacon','$date','ขาด')";
                    $r=$conn->query($sql2);
                    
                }
                if($r){
                    echo "<script> alert('บันทึกการขาดเรียบร้อย') </script>";
                }
            }

        ?>


    </body>

</html>
