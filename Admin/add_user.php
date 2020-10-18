<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
        <link rel="STYLESHEET" type="text/css" href="style/STYLE.css" charset="windows-874&quot;">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .w3-btn {width:150px;}
            .button5 {font-size: 20px;}
        </style>

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
        <title>โรงเรียนLine Beacon</title>
            <link rel="SHORTCUT ICON" href="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png">
            <script language="Javascript">
                <!--
                    function printWindow(){
                        browserVersion = parseInt(navigator.appVersion)
                        if (browserVersion >= 4) window.print()
                    }
            </script>
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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white">ลงทะเบียน</font></td></tr>
                        <td> </td>
                        <td> </td>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="admin.php"><font color="white">กลับ</font></a></td></tr>
                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>

<?php
    error_reporting(0);
    $conn = new mysqli('localhost', 'root', '', 'check_system');

    if($conn->connect_errno){
        die("Error [".$conn->connect_errno."]" . $conn->connect_error);
    }
    $price = 0;
    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'เพิ่มข้อมูล'){
        $sql = "insert into member values('" . $_REQUEST['id_number']."','".$_REQUEST['Username']."', '".$_REQUEST['Password']."','".$_REQUEST['Firstname']."', '".$_REQUEST['Lastname']."','0','".$_REQUEST['Userlevel']."')";
        $r = $conn->query($sql);

        if(!$r){
            print("error [".$conn->errno."] " . $conn->error);
            $id_number = $_REQUEST['id_number'];
            $Username = $_REQUEST['Username'];
            $Password = $_REQUEST['Password'];
            $Firstname = $_REQUEST['Firstname'];
            $Lastname = $_REQUEST['Lastname'];
            $Userlevel = $_REQUEST['Userlevel'];
        }else{
            echo "Add complete!!!!!! <br> Click <a href='admin.php'>Back</a> to home page";
            exit;
        }

    }
?>
<br>
<br>
<br>
    <center>
    <h1>ลงทะเบียน</h1>
    <form action="add_user.php" method="get">
        <table class="simply">
        <br>
             <tr>
                <th>รหัส</th>
                <td><input type="text" name="id_number" required  maxlength="50" value="<?php echo $id_number;?>"/></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><input type="text" name="Username" required  maxlength="50" value="<?php echo $Username;?>"/></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="text" name="Password" required  maxlength="50" value="<?php echo $Password;?>"/></td>
            </tr>
            <tr>
                <th>ชื่อ</th>
                <td><input type="text" name="Firstname" required  maxlength="50" value="<?php echo $Firstname;?>"/></td>
            </tr>
            <tr>
                <th>นามสกุล</th>
                <td><input type="text" name="Lastname" required  maxlength="50" value="<?php echo $Lastname;?>"/></td>
            </tr>
            <tr>
                <th>สถานะ</th>
                <td><input type="text" name="Userlevel" required  maxlength="50" value="<?php echo $Userlevel;?>"/></td>
            </tr>
        </table>
        <input class="w3-button w3-green w3-round-xlarge w3-btn button5" type="submit" name="submit" value="เพิ่มข้อมูล"/>
    </form>
    </center>
</body>
</html>
