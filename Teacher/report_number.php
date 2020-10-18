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
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="report.php"><font color="white">กลับ</font></a></td></tr>

                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>
        <br>
        <br>
        <center><p style="font-size:30px">รายงานการมาเรียนของนักเรียน</p>
        <hr/>
        <form action="report_number.php" method="get">
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
                <th><p style="font-size:20px">ตั้งแต่วันที่ : <p></th>
                <td>
                <td>
                    <input type="date" name="datestart"></input>
                </td>
                </td>

                <th><p style="font-size:20px">ถึงวันที่ : <p></th>
                <td>
                <td>
                    <input type="date" name="dateend">  
                <td><input type="submit" name="submit" value="ตกลง"></td>
            </tr>

        </table>
        </form>
        </center>


        <?php
            if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ตกลง'){
                $sql = "SELECT * FROM beacon_student INNER JOIN student ON student.student_number = beacon_student.student_number WHERE student_year = '".$_REQUEST['year']."' AND student_room = '".$_REQUEST['room']."' ";
                $rs = $conn->query($sql);

                echo "<center>";
                echo "<table>";
                echo "<tr>";
                echo "<td> <font size = '5'> ห้อง : </font>".$_REQUEST["year"]."/".$_REQUEST["room"]." <font size = '5'>วันที่ : </font>".$_REQUEST["datestart"]." <font size = '5'>ถึงวันที่ :</font> ".$_REQUEST["dateend"]."</td>";
                echo "</tr>";
                echo "</table>";
                echo "</center>";
                echo "<br>";

                echo "<center><h2>ข้อมูลนักเรียน</h2></center>";
                echo "<table  class='table table-striped'>";
                echo "<tr>";
                echo "<th>รหัสนักเรียน</th>";
                echo "<th>ชื่อ-สกุล</th>";
                echo "<th>สาย</th>";
                echo "<th>ลา</th>";
                echo "<th>ขาด</th>";
                echo "</tr>";

                while($row = $rs->fetch_assoc()){

                echo "<tr>";
                echo "<td>".$row["student_number"]."</td>";
                echo "<td>".$row['student_name']."  ".$row['student_surname']."</td>";
                $sql ="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number = '".$row['student_number']."' AND status = 'สาย' AND date BETWEEN date('".$_REQUEST['datestart']."') AND date('".$_REQUEST['dateend']."')";
                $r = $conn->query($sql);
                $sql1 ="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number = '".$row['student_number']."' AND status = 'ลา' AND date BETWEEN date('".$_REQUEST['datestart']."') AND date('".$_REQUEST['dateend']."')";
                $rLea = $conn->query($sql1);
                $sql2 ="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number = '".$row['student_number']."' AND status = 'ขาด' AND date BETWEEN date('".$_REQUEST['datestart']."') AND date('".$_REQUEST['dateend']."')";
                $ras = $conn->query($sql2);
                while($row = $r->fetch_array()){
                    $L=$row["COUNT(status)"];
                }
                while($row = $rLea->fetch_array()){
                    $Lea=$row["COUNT(status)"];
                }
                while($row = $ras->fetch_array()){
                    $AS=$row["COUNT(status)"];
                }

                echo "<td>".$L."</td>";
                echo "<td>".$Lea."</td>";
                echo "<td>".$AS."</td>";
                echo "</tr>";
                }
                echo "</table>";

                echo "<button onclick='window.print()'>"."Print this page</button>";

            }else{
                echo "<center><h2>---------------------------------no match record---------------------------------</h2></center>";
            }

        ?>
        

    </body>

</html>
