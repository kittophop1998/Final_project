<?php
header("content-type:text/javascript;charset=utf-8");
include("tpalm.php");

$sql = "SELECT * FROM student";
$result = mysqli_query($conn,$sql);

if ($result)  {

while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
       echo ["ID Student"] = $row["student_number"];
       echo ["Name"] = $row["student_name"];
       echo ["Lastname"] = $row["student_surname"];
       echo ["Tel"] = $row["student_tel"];
       echo ["Year"] = $row["student_year"];
       echo ["Room"] = $row["student_room"];
}
} else {
echo "gdbf-hvzbfr]kf";
}
echo json_encode($reponse);
?>