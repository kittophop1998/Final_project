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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php session_start();?>
    <?php
        include "../connect.php";
        $sql = "UPDATE member SET Lastupdate = NOW() WHERE id_number = '".$_SESSION["id_number"]."' ";
	    $query = mysqli_query($conn,$sql);
        $student_number = $_SESSION["id_number"];
    ?>
    <?php @ini_set('display_errors', '0');?>

    <?php
        //$sql ="SELECT COUNT(status) ,status FROM status  WHERE date(date)=curdate() AND status = 'สาย'";
        $sql="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number='".$student_number."' AND status = 'สาย'";
        $r = $conn->query($sql);
        while($row = $r->fetch_array()){
            $L=$row["COUNT(status)"];
        }

        $sql="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number='".$student_number."' AND status = 'ไม่สาย'";
        $r = $conn->query($sql);
        while($row = $r->fetch_array()){
            $NL=$row["COUNT(status)"];
        }

        $sql="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number='".$student_number."' AND status = 'ขาด'";
        $r = $conn->query($sql);
        while($row = $r->fetch_array()){
            $AS=$row["COUNT(status)"];
        }

        $sql="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number='".$student_number."' AND status = 'ลา'";
        $r = $conn->query($sql);
        while($row = $r->fetch_array()){
            $Lea=$row["COUNT(status)"];
        }

        $dataPoints = array(
            array("label"=>"ขาด", "y"=>$AS),
            array("label"=>"ลา", "y"=>$Lea),
            array("label"=>"มาสาย", "y"=>$L),
            array("label"=>"มาเรียนปกติ", "y"=>$NL),
        );
    ?>
    </head>

    <body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF" text="#000000" alink="#003399" link="#003399" vlink="#003399">
    <img src= "https://www.img.in.th/images/9fcf3f685b7d75520d2230401b80e1e9.png" width="100%" height="50%">
    <?php
        $student_number = $_SESSION["id_number"];
        $sql = "SELECT * FROM student WHERE student_number = '$student_number' ";
        $r = $conn->query($sql);
        $row = $r->fetch_assoc();
        $name = $row['student_name'];
        $sur = $row['student_surname'];
    ?>
    <table width="100%" height="50%" border="1" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr valign="middle">
                        <tr height="100%" valign="top">
                            <td bgcolor="#FFCC00" align="center" width="180">
                            <table width="180">
                    <tbody>
                    <tr size="1" width=100%""><td align="center"> <img src="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png"><a href="home.asp?lang=2"></a></td></span></tr>
                            <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white">Welcome to School</font></td></tr>
                            <tr height="40" bgcolor="#FFCC00"><td align="center"> <font color="black"  size="4"><?php echo $name?>&nbsp;<?php echo $sur?></font></td></tr>
                            <tr height="30" bgcolor="#1881fe"><td align="center"><a href="datast.php"><font color="white">ข้อมูลนักเรียน</font></a></td></tr>
                            <tr height="30" bgcolor="#1881fe"><td align="center"><a href="leave.php"><font color="white">การลา</font></a></td></tr>
                            <tr height="30" bgcolor="#1881fe"><td align="center"><a href="petition.php"><font color="white">ยื่นคำร้อง</font></a></td></tr>
                            <tr height="30" bgcolor="#1881fe"><td align="center"><a href="setting_p.php"><font color="white">เปลี่ยนรหัส</font></a></td></tr>
                            <tr height="30" bgcolor="#d21404"><td align="center"><a href="../logout.php"><font color="white">ออกจากระบบ</font></a></td></tr>
                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>
        <br>
        <br>
        <center><p style="font-size:30px">รายงานการมาเรียนของนักเรียน</p>
        <hr/>

        </center>
        <?php
            $sql = "SELECT date FROM status ORDER BY date DESC LIMIT 1";
            $sql1 = "SELECT date FROM status ORDER BY date ASC LIMIT 1";
            $date_max = $conn->query($sql);
            $date_min = $conn->query($sql1);
            $row = $date_max->fetch_assoc();
            $row2 = $date_min->fetch_assoc();

            echo "<center>วันที่ : ".$row2['date']."&nbsp; ถึง : &nbsp;".$row['date']."</center>";
        ?>

        <script>
            window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
	            animationEnabled: true,
	            title: {
		            text: ""
	            },
	            data: [{
		            type: "pie",
		            yValueFormatString: "#,##0.00\"%\"",
		            indexLabel: "{label} ({y})",
		            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	            }]
            });
                    chart.render();
            }
        </script>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        
        <center><font size="5">สถานะการมาเรียน 5 วันล่าสุด</font></center><br>
        <iframe src="read_status.php" name="iframe_a" height="300px" width="100%" title="Iframe Example"></iframe>
        <?php
            $sql = "SELECT * FROM beacon_student INNER JOIN student ON student.student_number = beacon_student.student_number WHERE student.student_number = '".$student_number."' ";
            $rs = $conn->query($sql);

            echo "<center><font size='5'>ข้อมูลสถานะการมาเรียน</font></center><br>";
            echo "<table  class='table table-striped'>";
            echo "<tr>";
            echo "<th>รหัสนักเรียน</th>";
            echo "<th>ชื่อ-สกุล</th>";
            echo "<th>มา</th>";
            echo "<th>สาย</th>";
            echo "<th>ลา</th>";
            echo "<th>ขาด</th>";
            echo "</tr>";

            while($row = $rs->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row["student_number"]."</td>";
            echo "<td>".$row['student_name']."  ".$row['student_surname']."</td>";

            $sql3 ="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number = '".$row['student_number']."' AND status = 'ไม่สาย' ";
            $sql ="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number = '".$row['student_number']."' AND status = 'สาย' ";
            $sql1 ="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number = '".$row['student_number']."' AND status = 'ลา' ";
            $sql2 ="SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon WHERE student_number = '".$row['student_number']."' AND status = 'ขาด' ";
            $ras = $conn->query($sql2);
            $rNl = $conn->query($sql3);
            $rLea = $conn->query($sql1);
            $r = $conn->query($sql);
           
            
            while($row = $rNl->fetch_array()){
                $Nl=$row["COUNT(status)"];
            }
            while($row = $r->fetch_array()){
                $L=$row["COUNT(status)"];
            }
            while($row = $rLea->fetch_array()){
                $Lea=$row["COUNT(status)"];
            }
            while($row = $ras->fetch_array()){
                $AS=$row["COUNT(status)"];
            }

            echo "<td>".$Nl."</td>";
            echo "<td>".$L."</td>";
            echo "<td>".$Lea."</td>";
            echo "<td>".$AS."</td>";
            echo "</tr>";
            }
            echo "</table>";
        ?>
        <br>
        
<center><button onclick='window.print()'>Print this page</button>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>

</html>
