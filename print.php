<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
   $abc = $_SERVER['QUERY_STRING'];
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=print?$abc");
  exit;
 }
   $bol = "0";
    mysql_query("SET NAMES utf8");
   $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $nazwa = $userRow['userName'];
    $mine = $userRow['pracodawca'];
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
	$sta = "false";
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
$sta = "true";
}
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
$tego = $_SERVER['QUERY_STRING'];
$ten = mysql_query("SELECT * FROM `mess` WHERE rand='$tego'");
 $tenRow=mysql_fetch_array($ten);
 $kto = $tenRow['od'];
 $us = mysql_query("SELECT * FROM `users` WHERE userName='$kto'");
 $usRow=mysql_fetch_array($us);


if (strcmp($kto, $userRow['userName']) === 0) {
    $bol = "1";
	$rep = $tenRow['do'];
}
$idek = $tenRow['ID'];
if($tenRow['przecz'] === "0") {
$d = "UPDATE `mess` SET `przecz` = '1' WHERE `ID`='$idek'";
$g = mysql_query($d);
$nieod = $nieod-1;
}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title><?php echo $tenRow['temat']; ?></title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
</head>
<script>$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");
	});</script>
<div class="se-pre-con"></div>
<body style="background-color:#F1F3FA;">  
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12"  style="min-height:400px; background: white; border-radius:5px; ">
<div style="width:100%">
<h2 style=" font-size: 20px; font-family: Raleway; font-weight: 600; display:inline-block;"><?php echo $tenRow['temat']; ?></h2>
 <hr class="hark">

 <div style=" margin-top: 15px;">
<p style=" display: inline-block; vertical-align: top; font-family:Raleway; font-size:15px; ">&nbsp;<?php echo $tenRow['od']; ?></p>
<div style="float: right;display: inline-block;"><span style=" vertical-align: top; font-family: Raleway; " >Wysłano: <span style="vertical-align:top;"><?php echo $tenRow['wyslano']; ?></span></span>
</div>
</div>
<div style=" margin-top: 15px; margin-left: 5px; "><span style="font-family:Raleway;"><?php echo $tenRow['wiad']; ?></span></div>
 <hr class="hark">
 <?php 
 $tex = $tenRow['rand'];
 mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM reply WHERE replyfor='$tex' order by ID";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {

			
			?>
 <div style=" margin-top: 15px;">
<p style=" display: inline-block; vertical-align: top; font-family:Raleway; font-size:15px; ">&nbsp;<?php echo $row['kto']; ?></p>
<div style="float: right;display: inline-block;"><span style=" vertical-align: top; font-family: Raleway; " >Wysłano: <span style=" vertical-align:top;"><?php echo $row['wyslano']; ?></span></span>
</div>
</div>
<div style=" margin-top: 15px; margin-left: 5px; "><span style="font-family:Raleway;"><?php echo $row['text']; ?></span></div>
 <hr class="hark">			
			<?php } ?>
<script>
$(document).ready(function(){
  window.print();
});
</script>
</body>
</html>
<?php ob_end_flush(); ?>