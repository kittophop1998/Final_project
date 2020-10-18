<html>
<head>
        <title>โรงเรียนLine Beacon</title>
        <link rel="SHORTCUT ICON" href="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style type="text/css">
        .simply{
            font:14px Trebuchet MS, Tahoma;
            margin: 45px;
            width: 630px;
            border-collapse: collapse;
            text-align: left;
        }
        .simply th{
            font:normal 16px Trebuchet MS, Tahoma;
            color: #222;
            background:#cbeffd;
            padding: 10px 8px;
            border-bottom: 2px solid #ccc;
        }
        .simply td{
            border-bottom: 1px solid #ccc;
            color: #666;
            background: #fff;
            padding: 5px;
        }
        .simply tbody tr:hover td{
            color: #222;
            background: #eee;
        }
    </style>

    <?php
        include "../connect.php";
        @ini_set('display_errors', '0');
    ?>
     <?php session_start();?>
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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white"> ยื่นคำร้องขอแก้ไขสถานะ</font></td></tr>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="index.php"><font color="white">กลับ</font></a></td></tr>
                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>
        <center>
        <br>
            <h1>ยื่นคำร้องขอแก้ไขสถานะการมาเรียน</h1>
        <br>
        <hr>
        <?php
            $student_number = $_SESSION["id_number"];
        ?>

        <?php
               $sql="SELECT * FROM student WHERE student_number = '".$student_number."' ";
               $r = $conn->query($sql);
               $row = $r->fetch_array();

               $student_name = $row['student_name'];
               $student_surname = $row['student_surname'];
               $student_number = $row['student_number'];

                echo '<script type="text/javascript">';
                echo "var student_name = '$student_name';";
                echo "var student_surname = '$student_surname';";
                echo "var student_number = '$student_number';";
                echo '</script>';
        ?>

        <form action="petition.php" method="get">
            <input type="hidden" value="<?php echo $student_number;?>" name="student_number" />
            <table class="simply">
                <tr>
                    <td><font size="4">ชื่อ - สกุล : </font>&nbsp; <label id="name"></label></td>
                    <td><font size="4">รหัสนักเรียน : </font>&nbsp; <label id="number"></label></td>
                </tr>
                <tr>
                    <td><font size="4">วันที่</font></td>
                    <td><input type="date" name="date_fix"></td>
                </tr>
                <tr>
                    <td><font size="4">แก้ไขสถานะจาก : </font>&nbsp; 
                        <select name="status_leave">
                            <option value="ขาด">ขาด</option>
                            <option value="สาย">สาย</option>
                        </select>
                    </td>
                    <td>
                    <font size="4">เป็น : </font>&nbsp;
                        <select name="status_leave_fix">
                            <option value="ลา">ลา</option>
                            <option value="ไม่สาย">มา</option>
                            <option value="สาย">สาย</option>  
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><font size="4">เหตุผลการขอเปลี่ยนสถานะ : </font></td>
                    <td>
                            <textarea name="message" rows="10" cols="40" placeholder="กรุณากรอกเหตุผล" style="resize:none"></textarea>
                            <br><br>
                    </td>
                </tr>
            </table>
           <input type="submit" name="submit" value="ตกลง">
        </forn>
        </center>

        <br>
        <center><font size="5">สถานะการเข้าโรงเรียน 7 วันล่าสุด</font><center><br>
        <?php
                $sql2 = "SELECT * FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon INNER JOIN student ON student.student_number = beacon_student.student_number WHERE student.student_number = '$student_number' ORDER BY date DESC LIMIT 7";
                $l = $conn->query($sql2);
                echo "<table class='table table-striped'>";
                echo "<tr>";
                echo "<td> รหัสนักเรียน</td>";
                echo "<td> ชื่อ-สกุล</td>";
                echo "<td> วันที่</td>";
                echo "<td> สถานะ</td>";
        
                while($row2 = $l->fetch_array()){
                    echo "<tr>";
                    echo "<td>".$row2["student_number"]."</td>";
                    echo "<td>".$row2["student_name"]." &nbsp;".$row2["student_surname"]."</td>";
                    echo "<td>".$row2["date"]."</td>";
                    echo "<td>".$row2["status"]."</td>";
                }
                echo "</table>";
            ?>

            <?php
            if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ตกลง'){
                $sql = "INSERT IGNORE INTO `petition` (`student_number`,`date_petition`, `status_fix_before`, `status_fix_after` , `reason`,`accept`) VALUES ('".$_REQUEST['student_number']."','". $_REQUEST['date_fix']."','".$_REQUEST['status_leave']."','".$_REQUEST['status_leave_fix']."','".$_REQUEST['message']."','รอการอนุมัติ')";
                $r = $conn->query($sql);
                echo "<script type=\"text/javascript\">";
                echo "alert(\"บันทึกแบบคำร้องเรียบร้อย\");";
                echo "location.href = 'petition.php';";
                echo "</script>";
            }
            ?>
        <script>
            document.getElementById("name").innerHTML = student_name+" "+student_surname;
            document.getElementById("number").innerHTML = student_number;
        </script>

        
    </body>
</html>
