<?php
$hostName="localhost";
$user="root";
$pass="";
$dbName="testicheck";
$connect= mysqli_connect($hostName, $user, $pass, $dbName)
        or die("Not connect Database");
        echo "connect Database success";