<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <?php
            include "../connect.php";
            $sql = "SELECT * FROM beacon_student INNER JOIN student on beacon_student.student_number=student.student_number WHERE beacon_student.beacon NOT IN (SELECT beacon FROM timestamp WHERE date(Datetime)=curdate())";
        ?>
    </head>
</html>
<?php
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td colspan='7' align='center'>รายชื่อคนที่ขาด วันที่ : ".date("Y-m-d")."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> รหัสนักเรียน </td>";
        echo "<td> ชื่อ - สกุล </td>";
        echo "<td> ชั้น </td>";
        echo "<td> ห้อง </td>";


        $result = $conn->query($sql);
        while($row = mysqli_fetch_array($result)  ){
            echo "<tr>";
            echo "<td>".$row["student_number"]."</td>";
            echo "<td>".$row["student_name"]."&nbsp;&nbsp;&nbsp; ".$row["student_surname"]."</td>";
            echo "<td>".$row["student_year"]."</td>";
            echo "<td>".$row["student_room"]."</td>";
        }

        echo "</table>";
       ?>
        <center>
            <form action="admin_2.php" method="get">
                <input type="submit" name="submit" value="ตกลง">
            </form>
        </center>
