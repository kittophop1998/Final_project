<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
        <link rel="STYLESHEET" type="text/css" href="style/STYLE.css" charset="windows-874&quot;">

        <title>โรงเรียนLine Beacon</title>
            <link rel="SHORTCUT ICON" href="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png">
            <script language="Javascript">
                <!--
                    function printWindow(){
                        browserVersion = parseInt(navigator.appVersion)
                        if (browserVersion >= 4) window.print()
                    }
                //-->
            </script>
    </head>

    <img src= "https://www.img.in.th/images/9fcf3f685b7d75520d2230401b80e1e9.png" width="105.5%" height="50%">

    <body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF" text="#000000" alink="#003399" link="#003399" vlink="#003399">

            <table width="100%" height="50%" border="1" cellpadding="0" cellspacing="0"> <!-- แก้ border -->
                    <tbody><tr valign="middle">

                <tr height="100%" valign="top">
                <td bgcolor="#FFCC00" align="center" width="180">
            <table width="180">

<!-- Select Language -->


<!-- Begin menu left -->
<tbody><tr size="1" width=100%""><td align="center"><img src="https://www.img.in.th/images/1acea2df7086c36177d7be3aa4f866c2.png"><a href="home.asp?lang=2"></a></td></span></tr>
<tr height="50" bgcolor="#FF3366"><td align="center"> <font color="white"> ข้อมูลบุคลากร</font></td></tr>
<td> </td>
<td> </td>
<tr height="25" bgcolor="#FF0000"><td align="center"><a href="index.php"><font color="white">back</font></a></td></tr>
<tr><td>
<center>

<!-- <script type="text/javascript">document.write(unescape("%3Cscript src=%27https://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="https://www.histats.com" target="_blank" title="free flash stats" ><script  type="text/javascript" >
try {Histats.start(1,2827947,4,1032,150,25,"00010000");
Histats.track_hits();} catch(err){};
</script></a></p>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="https://sstatic1.histats.com/0.gif?2827947&101" alt="free flash stats" border="0"></a></noscript> -->
<!-- Histats.com  END  -->

</center></td></tr>

</tbody></table>
</td>
<td>



<meta http-equiv="Content-Type" content="text/html; charset=windows-874" name="ROBOTS">
<link rel="STYLESHEET" type="text/css" href="style/STYLE.css" charset="windows-874&quot;">


<script language="Javascript"><!--

function printWindow(){
browserVersion = parseInt(navigator.appVersion)
if (browserVersion >= 4) window.print()
}

//--></script>


<div id="watermarklogo" style="position:absolute;"></div>

		<!-- Skitter Styles -->
				<link href="css/skitter.styles.min.css" type="text/css" media="all" rel="stylesheet">

		<!-- Skitter JS -->
				<script type="text/javascript" language="javascript" src="js/jquery-2.1.1.min.js"></script>
				<script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>
				<script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>

		<!-- Init Skitter -->
		<script type="text/javascript" language="javascript">
				$(document).ready(function() {
				$('.box_skitter_large').skitter({
				theme: 'clean',
				numbers_align: 'center',
				progressbar: false,
				dots: true,
				preview: false
				});
				});
		</script>


<script type="text/javascript">
var n="";
var o="";
var doing=false;
var levelUp=0;
var levelDown=100;
var divOld="2";

function showNews(id){
        if(id!=divOld){
                levelUp=0;
                levelDown=100;
                n=document.getElementById("div"+id);
                if (n.style.visibility != "visible")
                        n.style.visibility = "visible";
                o=document.getElementById("div"+divOld);
                doing=true;
                doLevel=0;
                fader();
				o.style.zIndex=0;
				n.style.zIndex=1;
				document.getElementById("tab"+divOld).className="off";
				document.getElementById("tab"+id).className="on";
                divOld=id;
        }
}
function fader(){
        if ((doLevel < 100) && (doing == true)){
                doing=true;
                levelUp+=10;
                levelDown-=10;
                n.style.MozOpacity=""+(levelUp/100);
                n.style.opacity=""+(levelUp/100);
                n.style.filter='alpha(opacity='+levelUp+')';
                o.style.MozOpacity=""+(levelDown/100);
                o.style.opacity=""+(levelDown/100);
                o.style.filter='alpha(opacity='+levelDown+')';
                setTimeout("fader()", 60)
        } else {
                doing = false;
                if (o.style.visibility != "hidden")
                        o.style.visibility=-"hidden";
        }
}
</script>



<br> </br>
<br> </br>



<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "check_system";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM teacher";
if( isset($_GET['search']) ){
    $id = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM teacher WHERE teacher_id ='$id'";
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
            <label>ค้นหารายบุคคล</label>
            <form action="" method="GET">
                <input type="text" placeholder="กรุณากรอกรหัสบุคลากร" name="search">&nbsp;
                <input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
            </form>
            <h2>ข้อมูลบุคลากร</h2>
            <table class="table table-striped table-responsive">
                <tr>
                    <th>รหัสบุคลากร</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>เวรประจำวัน</th>

                </tr>
                <?php
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['teacher_id']; ?></td>
                    <td><?php echo $row['teacher_name']; ?></td>
                    <td><?php echo $row['teacher_surname']; ?></td>
                    <td><?php echo $row['teacher_day']; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>

</html>
