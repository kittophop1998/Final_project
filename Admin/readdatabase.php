<html>
    <head>
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


</head>
<body>

<?php
    include "../connect.php";

    $query1 = "SELECT * FROM student s INNER JOIN beacon_student b on s.student_number = b.student_number INNER JOIN timestamp t on t.beacon = b.beacon ORDER BY Datetime DESC LIMIT 1";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1);
?>
        <center>
        <h1>รายชื่อล่าสุด</h1>
            <table class="simply">

        <tr>
            <th>รหัสนักเรียน</th>
            <td><?php echo $row1["student_number"]?></td>
        </tr>

        <tr>
            <th>ชื่อ - สกุล</th>
            <td><?php echo $row1["student_name"]?> &nbsp; <?php echo $row1["student_surname"]?></td>
        </tr>

        <tr>
            <th>วันที่เข้าเรียน</th>
            <td><?php echo $row1["date"]?></td>
        </tr>

        <tr>
            <th>เวลาที่เข้าเรียน</th>
            <td><?php echo $row1["time_enter"]?></td>
        </tr>


        </table>
        </center>

    <hr/>

<?php
    $query = "SELECT * FROM student s INNER JOIN beacon_student b on s.student_number = b.student_number INNER JOIN timestamp t on t.beacon = b.beacon WHERE date(Datetime)=curdate() ORDER BY Datetime DESC LIMIT 10 ";
    $result = mysqli_query($conn, $query);
?>
    <center>
    <h3>10 รายชื่อล่าสุด</h3>
    <table class="table table-striped">
    <tr align='center' bgcolor='#CCCCCC'>
       <td>รหัสนักเรียน</td>
        <td>ชื่อ</td>
        <td>สกุล</td>
        <td>date</td>
        <td>time_enter</td>
    <?php
        while($row = mysqli_fetch_array($result)  ){
    ?>
        <tr>
        <td><center><?php echo $row["student_number"] ?></center></td>
        <td><center><?php echo $row["student_name"] ?></center></td>
        <td><center><?php echo $row["student_surname"] ?></center></td>
        <td><center><?php echo $row["date"]?></center></td>
        <td><center><?php echo $row["time_enter"] ?></center></td>
    <?php
        }
    ?>
    </table>
    </center>

<?php
    mysqli_close($conn);
?>

</body>


</html>
