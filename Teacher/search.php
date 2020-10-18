<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "check_system";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM student";
if( isset($_GET['search']) ){
    $id = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM student WHERE student_number ='$id'";
}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Basic Search form using mysqli</title>
        <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <label>Search</label>
            <form action="" method="GET">
                <input type="text" placeholder="Type the name here" name="search">&nbsp;
                <input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
            </form>     
            <h2>List of students</h2>
            <table class="table table-striped table-responsive">
                <tr>
                    <th>รหัสนักเรียน</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>เบอร์โทร</th>
                    <th>ชั้นปี</th>
                    <th>ห้อง</th>
                </tr>
                <?php
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['student_number']; ?></td>
                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $row['student_surname']; ?></td>
                    <td><?php echo $row['student_tel']; ?></td>
                    <td><?php echo $row['student_year']; ?></td>
                    <td><?php echo $row['student_room']; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>