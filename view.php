<?php 
session_start();
require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
 $string = $userRow['pracodawca']; 
$kto = $userRow['userName'];
 $pra=mysql_query("SELECT * FROM pradet WHERE name='$kto'");
$praRow=mysql_fetch_array($pra);
$tel = $praRow['telefon'];
if (strpos($tel, '-') !== false) {
    $first = substr($tel, 0, -9);
	$rest = substr($tel,2);
}
else {
$first = substr($tel, 0, -7);
$rest = substr($tel,2);
}
 if (strpos($string, '1') !== false) {
$b = $_SESSION['b'];
$b = mysql_real_escape_string($b);
$c = $_SESSION['c'];
$d = $_SESSION['d'];
$e = $_SESSION['e'];
$f = $_SESSION['f'];
$g = $_SESSION['g'];
$h = $_SESSION['h'];
$i = $_SESSION['i'];
$j = $_SESSION['j'];
$adv=mysql_query("SELECT * FROM adv WHERE title='$b'");
$advRow=mysql_fetch_array($adv);
$og = $advRow['rand'];
$da = $advRow['data'];
if(empty($og)){
$rand = substr(md5(microtime()),rand(0,26),10);
}
else {
$rand = $og;
}
if(empty($da)){
$dzisiaj = date("Y-m-d");
}
else {
$dzisiaj = $da;
}

if(empty($f)){
$error = true;
}

if (strpos($e, 'city') !== false) {
    $e = "";
}
if (strpos($c, 'kat') !== false) {
    $c = "";
}
if (strpos($d, 'for') !== false) {
    $d = "";
}
if (strpos($j, 'typ') !== false) {
    $j = "";
}
if (strpos($h, 'on') !== false) {
    $h = str_replace(', on', '', $h);
}
if(!empty($i)){
$h = $h.' ,'.$i;
}
}
else if (strpos($string, '1') == false) {
    header("Location: 403.html");
} 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Podgląd ogłoszenia</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<body>
<div class=".container-fluid">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="row">
    <div class="col-sm-12"><a href="#" onclick="window.history.back();" style="float: left; font-size:15px; font-weight: 700; font-family: Raleway;"><i class="fa fa-angle-left" aria-hidden="true"></i>&nbsp;Wróć</a>
	<div><a href="#" style="float: right; font-size:15px; font-weight: 700; font-family: Raleway;">Następne ogłoszenie&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
	</div>
</div>
	<hr style="margin-bottom:10px; margin-top: 10px !important; border-top: 1px solid #D8D8D8 !important;">
<div class="row">
    <div class="col-sm-8"><h2 style="margin-top:5px; word-break: keep-all;"><?php  echo $b; ?></h2>
	<h4><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $e; ?> <br> <span style="font-size:14px; font-weight: 200;">Dodano: <?php echo $dzisiaj; ?>, ID ogłoszenia: <?php echo $rand; ?> </span></h4>
	<ul class="list-inline" style="margin-top:-5px;">
  <li><b>Stanowisko:</b>&nbsp;<?php echo $c; ?></li>
  <br><li><b>Wymiar zatrudnienia:</b>&nbsp;<?php echo $d; ?></li>
  <br>&nbsp;<b>Forma zatrudnienia:</b>&nbsp;<?php echo $j; ?>
  <br><li style="margin-top:5px;"><b>Wymagany język:</b>&nbsp;<?php echo $h; ?></li></ul>
	</div>
    <div class="col-sm-4" style="margin-top:10px;"><a style="pointer-events: none; cursor: pointer">
				<div class="osoba">
				<p style="color:#fff; font-weight: 600; text-align: center; vertical-align: middle; margin-top: 10px;"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;Napisz wiadomość</p> 
				</div>
				</a> 
				<a href="#">
			<div class="osoba" style="margin-top:5px;">
				<p style="color:#fff; font-weight: 600; text-align: center; vertical-align: middle; margin-top: 10px;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo $kto; ?></p> 
				</div></a>
				<div class="osoba" style="margin-top:5px;">
				<p style="color:#fff; font-weight: 600; text-align: center; vertical-align: middle; margin-top: 10px;"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;<?php echo $first; ?><span id="number" style="display:none;"><?php echo $rest; ?></span><span id="show">&nbsp;Pokaż</span></p> 
				</div>
				</div>
    <div class="col-sm-8"><div class="opis"><p style="margin: 5px;"><?php echo $g; ?></p><p style="<?php if($error) { echo "display:none;"; } ?>"><b>Dodatkowe wymagania:</b>&nbsp;<?php echo $f; ?></p></div>
	<div style="float:left;" class="fb-share-button" data-href="<?php echo "http://mrwork.pl"; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer?u=http%3A%2F%2F<?php echo "http://mrwork.pl"; ?>%2F&amp;src=sdkpreparse">Udostępnij</a></div>

	</div>
    <div class="col-sm-4">&nbsp;</div>
</div>
</div>
</div>
<script>
$( "#show" ).click(function() {
$('#show').css('display', 'none');
  $( "#number" ).show( "slow" );
});
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 <div class="row"><footer class="footer-distributed">

			<div class="footer-right">

				<a href="https://www.facebook.com/Woorkerpl"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/woorkerpl"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="hall"><i class="fa fa-university" aria-hidden="true"></i></a>

			</div>

			<div class="footer-left">

				<p class="footer-links">
					<a href="home">Strona główna</a>
					·
					<a href="regulamin">Regulamin</a>
					·
					<a href="faq">FAQ</a>
					·
					<a href="bad">Zgłoś błąd</a>
					·
					<a href="premium">Premium</a>
					·
					<a href="contact">Kontakt</a>
				</p>

				<p>&copy; mrwork.pl - Wszelkie prawa zastrzeżone.</p>
			</div>

		</footer></div></div>
 