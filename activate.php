<?php 
require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$server = $_SERVER['QUERY_STRING'];
$findme   = 'mail';
$pos = strpos($server, $findme);
if ($pos === false) {
    $string = substr($server,4);
 $res=mysql_query("SELECT * FROM userdet WHERE mailha='$string'");
 $userRow=mysql_fetch_array($res);
$ver = "1"; 
	$sql = ("UPDATE userdet SET ver='$ver' WHERE mailha='$string'");
	$res = mysql_query($sql);
}
else {
$string = substr($server,5);
 $res=mysql_query("SELECT * FROM pradet WHERE mailha='$string'");
 $userRow=mysql_fetch_array($res);
$ver = "1"; 
	$sql = ("UPDATE pradet SET ver='$ver' WHERE mailha='$string'");
	$res = mysql_query($sql);
}


 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Aktywacja konta</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
</head>
<script>$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});</script>
<div class="se-pre-con"></div>
<body>
  <div class="container-fluid">
  <center><div class="cl-effect-1" style="margin-top:10%;"><h1 class="heh" >Twoje konto zostało aktywowane!</h1>
  <br>
  <a href="login" style="text-decoration: none ;font-weight: bold; font-size:30px; color: #000;">Zaloguj się</a></div>
  </div></center>

</body>
</html>