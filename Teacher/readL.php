<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <?php
            include "../connect.php";
            $sql = "SELECT * FROM status INNER JOIN beacon_student ON beacon_student.beacon = status.beacon INNER JOIN student ON student.student_number = beacon_student.student_number INNER JOIN l_leave ON l_leave.student_number = student.student_number WHERE l_leave.date_leave = status.date AND status = 'ขาด'";
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
</html>
    <?php
        echo "<from action='admin_leave' method='post'>";
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td> รหัสนักเรียน </td>";
        echo "<td> ชื่อ - สกุล </td>";
        echo "<td> ชั้น </td>";
        echo "<td> ห้อง </td>";
        echo "<td> ลาวันที่ </td>";
        echo "<td> เหตุผลที่ลา </td>";
        


        $result = $conn->query($sql);
        while($row = mysqli_fetch_array($result)  ){
            echo "<tr>";
            echo "<td>".$row["student_number"]."</td>";
            echo "<td>".$row["student_name"]."&nbsp;&nbsp;".$row["student_surname"]."</td>";
            echo "<td>".$row["student_year"]."</td>";
            echo "<td>".$row["student_room"]."</td>";
            echo "<td>".$row["date_leave"]."</td>";
            echo "<td>".$row["content_leave"]."</td>";
            echo "<td><input class='w3-button w3-green' type='button' name='submit' value='ยืนยัน'></td>";
            
        }

        echo "</table>";
        echo "</from>";
       ?>
