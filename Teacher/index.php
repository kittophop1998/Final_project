<html>
    <head>
    <?php
        include "../connect.php";
        session_start();
        $sql = "UPDATE member SET Lastupdate = NOW() WHERE id_number = '".$_SESSION["id_number"]."' ";
        $query = $conn->query($sql);
    ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>โรงเรียนLine Beacon</title>
        <link rel="SHORTCUT ICON" href="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png">

        <script>
            $(document).ready(function(){
                setInterval(function(){
                    $("#autodata").load("readdatabase.php");
                    refresh();
                },1000);
            });
        </script>

    </head>

    <body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF" text="#000000" alink="#003399" link="#003399" vlink="#003399" >
    <img src= "https://www.img.in.th/images/9fcf3f685b7d75520d2230401b80e1e9.png" width="100%" height="50%">
        <table width="100%" height="50%" border="1" cellpadding="0" cellspacing="0">
            <tbody>
                <tr valign="middle">
                <tr height="100%" valign="top">
                <td bgcolor="#FFCC00" align="center" width="180">
                    <table width="180">
                        <tbody>
                            <tr size="1" width=100%""><td align="center"> <img src="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png"><a href="home.asp?lang=2"></a></td></span></tr>
                            <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white">Welcome to School</font></td></tr>
                            <tr height="30" bgcolor="#1881fe"><td align="center"><a href="datast.php"><font color="white">ข้อมูลนักเรียน</font></a></td></tr>
                            <tr height="30" bgcolor="#1881fe"><td align="center"><a href="datatc.php"><font color="white">ข้อมูลบุคลากร</font></a></td></tr>
                            <!-- <tr height="30" bgcolor="#1881fe"><td align="center"><a href="leave.php"><font color="white">การลา</font></a></td></tr>
                            <tr height="30" bgcolor="#1881fe"><td align="center"><a href="petition.php"><font color="white">ยื่นคำร้อง</font></a></td></tr> -->
                            <tr height="30" bgcolor="#1881fe"><td align="center"><a href="report.php"><font color="white">สรุปการมาเรียน</font></a></td></tr>
                            <!-- <tr height="30" bgcolor="#1881fe"><td align="center"><a href="admin.php"><font color="white">admin</font></a></td></tr> -->
                            <tr height="30" bgcolor="#d21404"><td align="center"><a href="../logout.php"><font color="white">ออกจากระบบ</font></a></td></tr>
                        </tbody>
                    </table>
                </td>
            <td>
            <?php
            $sql = "SELECT Datetime , date(Datetime) as date , beacon FROM timestamp";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                $beacon = $row["beacon"];
                $date = $row["date"];
                $time_input = strtotime($row["Datetime"]);
                $date_input = getDate($time_input);
                $HR = $date_input["hours"];
                $MIN2 = $date_input["minutes"];


                $sql2="INSERT IGNORE INTO status (beacon,date,status) VALUES ('$beacon','$date','สาย')";
                $sql3="INSERT IGNORE INTO status (beacon,date,status) VALUES ('$beacon','$date','ไม่สาย')";
                if($HR >= 8){
                    $conn->query($sql2) === TRUE;
                }else{
                    $conn->query($sql3) === TRUE;
                }

            }
            }
        ?>
<br>
<div id="autodata"></div>
</body>

</html>
