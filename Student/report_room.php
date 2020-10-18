<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <?php
        include "../connect.php";
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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white"> report ระดับห้อง</font></td></tr>
                        <tr height="25" bgcolor="#1881fe"><td align="center"><a href="report_number.php"><font color="white">สรุปสถานะ</font></a></td></tr>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="report.php"><font color="white">back</font></a></td></tr>

                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>

        <center><p style="font-size:30px">รายงานการมาเรียนของนักเรียน</p>
        <hr/>
        <form action="report_room.php" method="get">
        <table >
            <tr>
                <th><p style="font-size:20px">ชั้นปีการศึกษา : <p></th>
                <td>
                    <select name="year">
                        <option value="">--select--</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </td>
                <th><p style="font-size:20px"> ห้อง : <p></th>
                <td>
                    <select name="room">
                        <option value="">--select--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </td>
                <th><p style="font-size:20px"> วันที่ : <p></th>
                <td>
                    <input type="date" name="date">
                </td>
                <td><input type="submit" name="submit" value="ตกลง"></td>
            </tr>

        </table>
        </form>
        </center>


        <?php
            if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ตกลง'){
                $sql = "SELECT * FROM student inner join beacon_student on student.student_number = beacon_student.student_number inner join status on status.beacon = beacon_student.beacon  WHERE student_year ='".$_REQUEST["year"]."' AND student_room ='".$_REQUEST["room"]."' AND date ='".$_REQUEST["date"]."'";
                $rs = $conn->query($sql);

                echo "<center>";
               echo "<table>";
               echo "<tr>";
               echo "<td>"."ห้อง : ".$_REQUEST["year"]."/".$_REQUEST["room"]."</td>";
               echo "</tr>";
               echo "<tr>";
               echo "<td> วันที่ : ".$_REQUEST["date"]."</td>";
               echo "</tr>";
               echo "</table>";
               echo "</center>";
               echo "<br>";



                echo "<center><h2>ข้อมูลนักเรียน</h2></center>";
                echo "<table  class='table table-striped'>";
                echo "<tr>";
                echo "<th>รหัสนักเรียน</th>";
                echo "<th>ชื่อ</th>";
                echo "<th>นามสกุล</th>";
                echo "<th>วันที่</th>";
                echo "<th>สถานะ</th>";
                echo "</tr>";

                while($row = $rs->fetch_assoc()){

                echo "<tr>";
                echo "<td>".$row["student_number"]."</td>";
                echo "<td>".$row['student_name']."</td>";
                echo "<td>".$row['student_surname']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "</tr>";
                }
                echo "</table>";

            }else{
                echo "<center><h2>---------------------------------no match record---------------------------------</h2></center>";
            }

        ?>

    </body>

</html>
