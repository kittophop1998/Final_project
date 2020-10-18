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
        <?php @ini_set('display_errors', '0');?>
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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white"> การลาของนักเรียน</font></td></tr>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="index.php"><font color="white">back</font></a></td></tr>

                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>
        <center>
        <br>
        <h1>การลา</h1>
        <br>

        <form action="leave.php">
            <table>
                <tr>
                    <th>รหัสนักเรียน</th>
                    <td><input type="text" name="student_number" placeholder="พิมพ์รหัสนักเรียน"></td>
                    <td><input type="submit" name="submit" value="ค้นหา"></td>
                </tr>
            </table>
        </form>

        <?php
            include "../connect.php";

            if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ตกลง'){
                $sql = "INSERT IGNORE INTO `l_leave` (`student_number`,`date_leave`, `title_leave`, `content_leave` , `accept`) VALUES ('".$_REQUEST['student_number']."','". $_REQUEST['date']."','".$_REQUEST['cars']."','".$_REQUEST['message']."','รอการอนุมัติ')";
                $r = $conn->query($sql);
                echo "<script type=\"text/javascript\">";
                echo "alert(\"บันทึกการลาเรียบร้อย\");";
                echo "location.href = 'leave.php';";
                echo "</script>";
            }

            if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ค้นหา'){
                $sql1 = "SELECT * FROM student WHERE student_number = '".$_REQUEST["student_number"]."' ";
                $r = $conn->query($sql1);
                if ($r->num_rows == 0){
                    echo "--------------  No match record---------------";
                    exit;
                }else{
                    $row = $r->fetch_array();
                    $student_number = $row["student_number"];
                    $name = $row["student_name"];
                    $surname = $row["student_surname"];

                    echo '<script type="text/javascript">';
                    echo "var student_name = '$name';";
                    echo "var student_surname = '$surname';";
                    echo "var student_number = '$student_number';";
                    echo '</script>';

        ?>
        <?php
                }
                
            }
        ?>

    <form action="leave.php" method="get">
                <input type="hidden" value="<?php echo $student_number;?>" name="student_number" />
                <table class="simply">
                    <tr>
                    <br>
                        <td>รหัสนักเรียน : </td>
                        <td><label id="number"></label></td>
                    </tr>
                    <tr>
                        <td>ชื่อ - สกุล : </td>
                        <td><label id="name_sur"></label></td>
                    </tr>
                    <tr>
                        <td><label for="cars">หัวข้อการลา</label></td>
                        <td>
                            <div id="test">
                            <select id="cars" name="cars">
                                <option value="">--select--</option>
                                <option value="E1">ลากิจ</option>
                                <option value="E2">ลาป่วย</option>
                            </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>วันที่จะลาหยุด</td>
                        <td><input type="date" name="date" placeholder="1998-09-27(ค.ศ.-เดือน-วัน)"></td>
                    </tr>
                    <tr>
                        <td>เหตุผลการลา</td>
                        <td>
                            <form action="">
                                <textarea name="message" rows="15" cols="50" placeholder="กรุณากรอกเหตุผลการลา" style="resize:none"></textarea>
                                <br><br>
                            </form>
                        </td>
                    </tr>

                </table>
                <input type="submit" value="ตกลง" name='submit'>
                <br>
            </form>
            <br>
            <?php
                $sql2 = "SELECT * FROM l_leave INNER JOIN student ON student.student_number = l_leave.student_number WHERE student.student_number = '".$_REQUEST['student_number']."' ";
                $l = $conn->query($sql2);
                echo "<table class='table table-striped'>";
                echo "<tr>";
                echo "<td> รหัสนักเรียน</td>";
                echo "<td> ชื่อ-สกุล</td>";
                echo "<td> เหตุผลที่ลา</td>";
                echo "<td> วันที่ขอลา</td>";
                echo "<td> การอนุมัติ</td>";
        
                while($row2 = $l->fetch_array()){
                    echo "<tr>";
                    echo "<td>".$row2["student_number"]."</td>";
                    echo "<td>".$row2["student_name"]." &nbsp;".$row2["student_surname"]."</td>";
                    echo "<td>".$row2["content_leave"]."</td>";
                    echo "<td>".$row2["date_leave"]."</td>";
                    echo "<td>".$row2["accept"]."</td>";
                }
                echo "</table>";
            ?>


    </center>

    <script>
        document.getElementById("number").innerHTML = student_number;
        document.getElementById("name_sur").innerHTML = student_name+" "+student_surname;
    </script>

    </body>
</html>
