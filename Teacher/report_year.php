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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white">report</font></td></tr>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="report.php"><font color="white">กลับ</font></a></td></tr>

                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>
        <br>
        <br>
        <center><p style="font-size:30px">รายงานการมาเรียนของนักเรียน</p>
        <hr/>
        <form action="report_year.php" method="get">
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


                <td><input type="submit" name="submit" value="ตกลง"></td>
            </tr>

        </table>
        </form>
        </center>

        <?php
            if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ตกลง'){
                $sql = "SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student on beacon_student.beacon = status.beacon INNER JOIN student ON student.student_number = beacon_student.student_number where student_year = '". $_REQUEST['year']."' AND status = 'สาย' ";
        $r = $conn->query($sql);
        while($row = $r->fetch_array()){
            $L=$row["COUNT(status)"];
        }

        $sql = "SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student on beacon_student.beacon = status.beacon INNER JOIN student ON student.student_number = beacon_student.student_number where student_year = '". $_REQUEST['year']."' AND status = 'ไม่สาย' ";
        $r = $conn->query($sql);
        while($row = $r->fetch_array()){
            $NL=$row["COUNT(status)"];
        }

        $sql = "SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student on beacon_student.beacon = status.beacon INNER JOIN student ON student.student_number = beacon_student.student_number where student_year = '". $_REQUEST['year']."' AND status = 'ขาด' ";
        $r = $conn->query($sql);
        while($row = $r->fetch_array()){
            $AS=$row["COUNT(status)"];
        }

        $sql = "SELECT COUNT(status) ,status FROM status INNER JOIN beacon_student on beacon_student.beacon = status.beacon INNER JOIN student ON student.student_number = beacon_student.student_number where student_year = '". $_REQUEST['year']."' AND status = 'ลา' ";
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

        echo "<center>ชั้นปีการศึกษา : มัธยมศึกษาปีที่ ".$_REQUEST["year"]."</center>";

        }

        ?>


    <script>
        window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
	        animationEnabled: true,
	        title: {

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
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>

</html>
