<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 if(isset($_SESSION['user']) ) {
  $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 $end = $_SESSION["end"];
 unset($_SESSION['end']);
 $nazwa = $userRow['userName'];
 $q = "select MAX(ID) from premium";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
$I = $data[0];
 }
 $pr = "SELECT name from premium where name='$nazwa'";
$pre = mysql_query($pr);

if(mysql_num_rows($pre) > 0)
{
  $prem=mysql_query("SELECT * FROM premium WHERE name='$nazwa'");
$premRow=mysql_fetch_array($prem);
$dzisia = date("Y-m-d");
$wygas = $premRow['do'];

$dzisiaj = strtotime($dzisia);
$wygasa = strtotime($wygas);

if ($dzisiaj >= $wygasa) { 
$prac = $userRow['pracodawca'];
if($prac === "1") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$nazwa'");
$io = mysql_query($iop);
$jop = ("UPDATE adv SET wyr=0 WHERE kto='$nazwa'");
$jo = mysql_query($jop);
if($jo) {
$yyy="DELETE FROM premium WHERE name='$nazwa'";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
mysql_query($y);
}
}
else if($prac === "0") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$nazwa'");
$io = mysql_query($iop);
if($io) {
$yyy="DELETE FROM premium WHERE name='$nazwa'";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
mysql_query($y);
}
}
$_SESSION["end"] = "true";
header("Refresh:0");
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Ściana sław - mrwork.pl</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
 <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

<style>
body {
overflow: hidden;
}
br {
display:block;
margin: 10px 0;
}

#fancy_h1_wrap
{
    display:block;
    width:100%;
    height:100%;
    position:absolute;
    top:100%;
	
}
#fancy_h1_wrap h1 {
font-size:40px;
font-family:Raleway;
color:#fff;
}
</style>
</head>
<script>$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});</script>
<div class="se-pre-con"></div>
<body style="background-color:#000;">
  <center>  
  <?php if($end === "true") { ?><div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Uwaga!</strong> Ważność Twojego konta Premium wygasła! Aby wykupić dostęp ponownie kliknij <a style="font-weight:700; color:#BB4D55" href="kup">tutaj</a>.<br><strong>Dziękujemy za wsparcie serwisu mrwork.pl</strong>
</div><?php } ?>
  <div id="container">
        <div id="fancy_h1_wrap" style="z-index:-1;">
            <h1 style="font-size:50px; font-weight:700;">Wsparli nas</h1>
 <?php 
 $e = 172;

 mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM premium order by name ASC";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			 $e = $e + 66;
			$nam = $row['name'];
 $prka = "SELECT name from premium where name='$nam'";
$preka = mysql_query($prka);

if(mysql_num_rows($preka) > 0)
{
$premka=mysql_query("SELECT * FROM premium WHERE name='$nam'");
$premkaRow=mysql_fetch_array($premka);
$dzisia = date("Y-m-d");
$wygas = $premkaRow['do'];

$dzisiaj = strtotime($dzisia);
$wygasa = strtotime($wygas);
if ($dzisiaj >= $wygasa) { 
$us=mysql_query("SELECT * FROM users WHERE userName='$nam'");
$usRow=mysql_fetch_array($us);
$prac = $usRow['pracodawca'];
if($prac === "1") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$nam'");
$io = mysql_query($iop);
$jop = ("UPDATE adv SET wyr=0 WHERE kto='$nam'");
$jo = mysql_query($jop);
if($jo) {
$yyy="DELETE FROM premium WHERE name='$nam'";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
mysql_query($y);
}
}
else if($prac === "0") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$nam'");
$io = mysql_query($iop);
if($io) {
$yyy="DELETE FROM premium WHERE name='$nam'";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
mysql_query($y);
}
}
header("Refresh:0");
}
}

 ?>           
			<h1 <?php if ($nazwa === $row['name']) { echo " style='color:red;'";} ?>><?php if ($nazwa === $row['name']) { ?> <i style="display:inline-block;" class="fa fa-heart" aria-hidden="true"></i>&nbsp;<?php } ?><?php echo $row['name']; ?></h1>
<?php } ?>
            <br>
			<br>
			<h1 style="font-size:50px; font-weight:700;">Dziękujemy!</h1>
        </div>
    </div></center>
	<script>
	var height = <?php echo json_encode($e); ?>;
	function fun(){
$('#fancy_h1_wrap').css('top', '');
$('#fancy_h1_wrap').animate({top:-height}, 27000, fun);    
}
fun();
	</script>
</body>
</html>
<?php ob_end_flush(); ?>