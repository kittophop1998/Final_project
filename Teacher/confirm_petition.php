<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <?php
        include "../connect.php";
        $sql = "SELECT * FROM petition INNER JOIN student ON student.student_number = petition.student_number INNER JOIN beacon_student ON beacon_student.student_number = student.student_number INNER JOIN status ON status.beacon = beacon_student.beacon WHERE accept = 'รอการอนุมัติ' AND date_petition = date ";
        $sql = "UPDATE member SET Lastupdate = NOW() WHERE UserID = '".$_SESSION["id_number"]."' ";
        $query = $conn->query($sql);
    ?>
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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white"> Admin</font></td></tr>
                        <tr height="25" bgcolor="#1881fe"><td align="center"><a href="admin_2.php"><font color="white">ยืนยันการขาด</font></a></td></tr>
                        <tr height="30" bgcolor="#1881fe"><td align="center"><a href="student_manage.php"><font color="white">จัดการข้อมูลนักเรียน</font></a></td></tr>
                        <tr height="30" bgcolor="#1881fe"><td align="center"><a href="teacher_manage.php"><font color="white">จัดการข้อมูลบุคลากร</font></a></td></tr>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="index.php"><font color="white">back</font></a></td></tr>
                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>
        <br>
        <center><font size="5">รายชื่อบุคคลยื่นคำร้องขอเปลี่ยนสถานะ</font></center>
        <br>
        <br>
        <from action='admin_leave' method='post'>
            <table class='table table-striped'>
            <tr>
            <td> รหัสนักเรียน </td>
            <td> ชื่อ - สกุล </td>
            <td> วันที่ขอเปลี่ยน </td>
            <td> สถานะก่อน </td>
            <td> สถานะหลัง</td>
            <td> เหตุผล </td>

            <?php
                $result = $conn->query($sql);
                while($row = mysqli_fetch_array($result)  ){
            ?>
                <tr>
                    <td><?php echo $row["student_number"]?></td>
                    <td><?php echo $row["student_name"]?>&nbsp;&nbsp;<?php echo $row["student_surname"]?></td>
                    <td><?php echo $row["date_petition"]?></td>
                    <td><?php echo $row["status_fix_before"]?></td>
                    <td><?php echo $row["status_fix_after"]?></td>
                    <td><?php echo $row["reason"]?></td>
                    <!-- <td><input class='w3-button w3-green' type='button' name='submit' value='ยืนยัน'></td> -->
                    <td><a href='confirm_petition_2.php?student_number=<?php echo $row[0]?>&&date=<?php echo $row[1]?>&&beacon=<?php echo $row[13]?>&&date_status=<?php echo $row[17]?>&&status_fix=<?php echo $row[3]?>'><input class='w3-button w3-green' type='button' name='submit' value='ยืนยัน'></a></td>
            <?php
                }
            ?>
            </table>
        </form>
        <!-- <center>
        <form action="admin_leave.php" method="get">
            <input type="submit" name="submit" value="ตกลง">
        </form>
        </center> -->

        <?php
            // if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ยืนยัน'){
            //     $sql = "SELECT * FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon INNER JOIN student ON student.student_number = beacon_student.student_number INNER JOIN l_leave ON l_leave.student_number = student.student_number WHERE l_leave.date_leave = status.date AND status = 'ขาด' ";
            //     $result = $conn->query($sql);
            //     while($row = $result->fetch_assoc()) {
            //         $beacon = $row["beacon"];
            //         $date = $row["date"];
            //         $student_number = $row["student_number"];

            //         $sql2 = "UPDATE status SET status = 'ลา' WHERE beacon = '$beacon' AND status.date='$date' ";
            //         $sql3 = "UPDATE `l_leave` SET `accept` = 'อนุมัติ' WHERE l_leave.student_number='$student_number' AND l_leave.date_leave='$date' ";
            //         $conn->query($sql2);
            //         $conn->query($sql3);
            //     }
            // }
        ?>
    </body>
</html>
