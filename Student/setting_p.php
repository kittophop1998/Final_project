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
        <?php session_start();?>
        <?php
            include "../connect.php";
            $sql = "UPDATE member SET Lastupdate = NOW() WHERE UserID = '".$_SESSION["id_number"]."' ";
            $query = $conn->query($sql);
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .w3-btn {width:100px;}
            .button5 {font-size: 20px;}
        </style>
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
                        <tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white"> การลาของนักเรียน</font></td></tr>
                        <tr height="25" bgcolor="#FF0000"><td align="center"><a href="index.php"><font color="white">กลับ</font></a></td></tr>

                        <center>
                        </center></td></tr>
                    </tbody>
        </table></td><td>
        <?php
            $student_number = $_SESSION["id_number"];
            $sql = "SELECT * FROM member WHERE id_number = '$student_number' ";
            $r = $conn->query($sql);
            $row = $r->fetch_assoc();
            $name = $row['Firstname'];
            $sur = $row['Lastname'];
            $Username = $row['Username'];
            $Password = $row['Password'];
        ?>
        <br>
        <br>
        <br>
        <center>
        <form action="#" method="post">
            <table>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" name="username" value="<?php echo $Username?>"></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="text" name="username" value="<?php echo $Password?>"></td>
                </tr>
                <tr>
                    <td><br>เปลี่ยนรหัสผ่าน :</td>
                    <td><br><input type="text" name="fix_pass"></td>
                </tr>
            </table>
            <br>
            <br>
            <input class="w3-button w3-green w3-round-xlarge w3-btn button5" type="submit" name="submit" value="ยืนยัน"/>
        </form>
        </center>

        <?php
            if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'ยืนยัน'){
                $sql ="UPDATE member SET Password = '".$_POST['fix_pass']."' WHERE member.id_number = '$student_number' ";
                $r = $conn->query($sql);
                echo "<script type=\"text/javascript\">";
                echo "alert(\"บันทึกรหัสผ่านเรียบร้อย\");";
                echo "location.href = '../Student/index.php';";
                echo "</script>";

            }
            
        
        ?>
    </body>
</html>