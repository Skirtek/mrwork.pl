<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 require_once 'includes/Simpay.php';
 
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=kup");
  exit;
 }
  $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
   $string = $userRow['pracodawca'];
   $nazwa = $userRow['userName'];
   $hash = $userRow['profilehash'];
   $mine = $userRow['pracodawca'];
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
}
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
if (isset($_POST['sms']) ) {
 $abc = trim($_POST['code']);
 $abc = strip_tags($abc);
  $abc = htmlspecialchars($abc);

    define('API_KEY',       '4a25ac4a');
    define('API_SECRET',    '3bb095e8c616bd28a2ccc71309b3a656');
    define('API_VERSION',   '1');

    try {

        $api = new SimPay(API_KEY, API_SECRET, API_VERSION);
        $api->getStatus(array(
            'service_id'    => '2209',        // identyfikator uslugi premium sms
            'number'        => '7355',      // numer na ktory wyslano sms
            'code'          => $abc,    // kod wprowadzony przez klienta
        ));

       if($api->check()) {
                $bo = "SELECT ID from premium where name='$nazwa'";
$bb = mysql_query($bo);

if(mysql_num_rows($bb) > 0) {
$prem=mysql_query("SELECT * FROM premium WHERE name='$nazwa'");
$premRow=mysql_fetch_array($prem);
$premdo = $premRow['do'];
if($premdo) {
$plusik = date('Y-m-d', strtotime('+31 day', strtotime($premdo)));
$iop = ("UPDATE premium SET do='$plusik' WHERE name='$nazwa'");
$io = mysql_query($iop);
if($io) {
$przed = "true";
}
else {
$bad = "true";
}
}
else {
$bad = "true";
}
}
else {
 $u = "select MAX(ID) from premium";
$ue = mysql_query($u);
$ux = mysql_fetch_array($ue);
$ui = $ux[0];
$uid = $ui+1;
 $date = date("Y-m-d");
$plus = date('Y-m-d', strtotime('+31 day', strtotime($date)));
$o = "INSERT INTO premium (ID,name,profilehash,do) VALUES('$uid','$nazwa','$hash','$plus')";
$p = mysql_query($o);

if($p) {
$wit = "true";
		}
		else {
		$bad = "true";
		}
	}
       } else if($api->error()) {
		   $code = $api->ShowError()[0]['error_code'];
		   if($code === "201") {
		   $bladsim = "true";
		   }
		   else if($code === "404") {
		   $zly = "true";
		   }
		   else if($code === "405"){
		   $use = "true";
		   }
		   else {
		   $bad = "true";
		   }
       } else {
           print_r($api->showStatus());
       }
    } 

    catch(Exception $e) {
        echo 'Error: ' .$e->getMessage();
    } 
}
 if (isset($_POST['promo']) ) {
 $abc = trim($_POST['prom']);
 $abc = strip_tags($abc);
  $abc = htmlspecialchars($abc);
 $po = "SELECT rand from promo where rand='$abc'";
$pp = mysql_query($po);

if(mysql_num_rows($pp) > 0)
{
     $bo = "SELECT ID from premium where name='$nazwa'";
$bb = mysql_query($bo);

if(mysql_num_rows($bb) > 0) {
$prem=mysql_query("SELECT * FROM premium WHERE name='$nazwa'");
$premRow=mysql_fetch_array($prem);
$premdo = $premRow['do'];
if($premdo) {
$plusik = date('Y-m-d', strtotime('+31 day', strtotime($premdo)));
$iop = ("UPDATE premium SET do='$plusik' WHERE name='$nazwa'");
$io = mysql_query($iop);
if($io) {
$tyu="DELETE FROM promo WHERE rand='$abc'";
mysql_query($tyu);
$ty = "SET @count = 0";
mysql_query($ty);
$t = "UPDATE `promo` SET `promo`.`ID` = @count:= @count + 1";
mysql_query($t);
if ($tyu && $ty && $t){
$przed = "true";
}
else {
$bad = "true";
}
}
else {
$bad = "true";
}
}
else {
$bad = "true";
}
}
else {
 $u = "select MAX(ID) from premium";
$ue = mysql_query($u);
$ux = mysql_fetch_array($ue);
$ui = $ux[0];
$uid = $ui+1;
 $date = date("Y-m-d");
$plus = date('Y-m-d', strtotime('+31 day', strtotime($date)));
$o = "INSERT INTO premium (ID,name,profilehash,do) VALUES('$uid','$nazwa','$hash','$plus')";
$p = mysql_query($o);

if($p) {
$tyu="DELETE FROM promo WHERE rand='$abc'";
mysql_query($tyu);
$ty = "SET @count = 0";
mysql_query($ty);
$t = "UPDATE `promo` SET `promo`.`ID` = @count:= @count + 1";
mysql_query($t);
if ($tyu && $ty && $t){
$wit = "true";
			}
			else {
			$bad = "true";
			}
		}
		else {
		$bad = "true";
		}
	}
}
else {
$zly = "true";
}
 }
  $old = mysql_query("SELECT * FROM `comment` WHERE komu='$nazwa' and nowy=1");
$new = mysql_num_rows($old);
 ?>
 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Zakup konta premium - mrwork.pl</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<style>
.siedem>li {
    width: 50%;
    text-align: center;
	}
.siedem>li.active>a {
    color: #fff !important;
    font-family: Raleway !important;
    font-weight: 700 !important;
    cursor: pointer !important;
    background-color: #68B2B1 !important;
}
.siedem a {
color:#000;
font-family:Raleway;
font-weight:700;
}
.rady {
font-family: Muli; 
font-size: 20px;
text-align: center;
}
.kodzik {
width:30%;
}
.szostka {
width:15%;
}
@media screen and (max-width: 767px) {
.kodzik {
width:70%;
}
.szostka {
width:35%;
}
}
</style>
</head>
<script>$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});</script>
<div class="se-pre-con"></div>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-left" style="margin-left: 20px;" href="home"><img class="ele" src="logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['userName']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li><a href="<?php echo $linek; ?>">Mój profil</a></li>
            <li style="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "display:block;";
} else if (strpos($string, '1') == false) {  echo "display:none;";} ?>"><a href="mine">Moje ogłoszenia</a></li>
<li><a href="mess">Wiadomości&nbsp;<span <?php if($nieod>0) {?>style="font-weight:bold; color:#d2201d;"<?php } ?>>(<?php echo $nieod; ?>)</span></a></li>
<li style="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "display:block;";
} else if (strpos($string, '1') == false) {  echo "display:none;";} ?>"><a href="<?php echo $linek; ?>">Nowe komentarze&nbsp;<span <?php if($new>0) {?>style="font-weight:bold; color:#d2201d;"<?php } ?>>(<?php echo $new; ?>)</span></a></li>
            <li><a href="setuser">Ustawienia konta</a></li>
            <li><a href="logout?logout">Wyloguj</a></li>
          </ul>
        </li>
		<li style="color:#fff; background-color:#31A598;"><a href="pomhome"><i class="fa fa-life-ring" aria-hidden="true"></i>&nbsp;Pomoc sąsiedzka</a></li>
        <li style="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "display:block;";
} else if (strpos($string, '1') == false) {  echo "display:none;";} ?>"><a href="add"><span class="glyphicon glyphicon-plus"></span> Dodaj ogłoszenie</a></li>
      </ul>
    </div>
  <script>$('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});</script>
</nav>
<div class="container-fluid">
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
		<?php if($bladsim === "true") { ?><div class="alert alert-danger alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Ups...</strong> System SimPay ma problemy z działaniem. Spróbuj ponownie później lub zgłoś ten fakt do <a style="font-weight:700; color:#BB4D55" href="https://simpay.pl/biuro-obslugi-klienta">Biura Obsługi Klienta SimPay</a>.
</div><?php } ?>  
	<?php if($use === "true") { ?><div class="alert alert-danger alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Ups...</strong> Podany kod został już użyty :(
</div><?php } ?>  
<?php if($zly === "true") { ?><div class="alert alert-danger alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Ups...</strong> Kod nie jest prawidłowy :(
</div><?php } ?>    
			<?php if($wit === "true") { ?><div class="alert alert-success alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sukces!</strong> Witamy wśród posiadaczy konta Premium!
</div><?php } ?>
			<?php if($przed === "true") { ?><div class="alert alert-success alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sukces!</strong> Dziękujemy za przedłużenie ważności konta Premium!
</div><?php } ?>
<?php if($bad === "true") { ?><div class="alert alert-danger alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Ups...</strong> Coś poszło nie tak,spróbuj ponownie :(
</div><?php } ?>
	<ul class="nav nav-tabs siedem">
            <li class="active"><a href="#one" data-toggle="tab">Kup dostęp do konta premium</a></li>
            <li><a href="#two" data-toggle="tab">Wykorzystaj kod promocyjny</a></li>
          </ul>
          <div class="tab-content" style="border: 1px solid #e2e1e1; background-color: #fff; min-height: 400px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; width: 99.7%;">
            <div class="tab-pane active" id="one" style="text-align: center;">
			
			<p style="margin-top: 10px;font-size: 30px;font-family: Raleway;color: #cc0000;font-weight: 700;">Aby zakupić konto premium:</p>
			<p class="rady">1. Wyślij SMS na numer <b>7355</b> o treści <b>SIM.MRWORK</b> - koszt <b>3.76zł</b> (z VAT)</p>
			<p class="rady">2. Poniżej wpisz <b>kod</b> z SMS-a zwrotnego</p>
			<center><div class="form-group kodzik"><form method="POST">
			<input placeholder="Tu wpisz kod" type="text" class="form-control" name="code" id="code">
			</div></center>
			<button type="submit" class="btn btn-success szostka" name="sms" style=" margin-top:-10px;font-family: Raleway; font-weight: 700; ">Użyj kodu</button></form>	
			<br><br><a href="https://simpay.pl/dokumenty/simpay_regulamin_uzytkownik_koncowy_01_03_15.pdf">Regulamin płatności SMS Premium</a>
			<p style=" font-family: Muli; ">W razie jakichkolwiek nieprawidłowości, prosimy o <a href="https://simpay.pl/reklamacje">reklamację</a> u dostawcy usługi oraz kontakt z <a href="contact">administracją serwisu</a></p>
			<div class="div-wrapper">
    <img class="simpay" src="images/simpaybig.png"/>
</div>
			</div>
            <div class="tab-pane" id="two" style="text-align:center;">
									
			<p style="margin-top: 10px;font-size: 30px;font-family: Raleway;color: #cc0000;font-weight: 700;">Wykorzystaj kod promocyjny</p>
			<p class="rady">Wpisz poniżej swój kod promocyjny, aby skorzystać z dostępu do konta premium!</p>
			<center><div class="form-group kodzik"><form method="POST">
			<input placeholder="Tu wpisz kod" type="text" class="form-control" name="prom" id="promo" maxlength="10">
			</div>
			<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfmhRQUAAAAAM2YStZNRsHBtuKuaTK7YSNd9mPn"></div>
			</center>
			<button type="submit" name="promo" class="btn btn-success szostka" style="margin-top:10px; font-family: Raleway; font-weight: 700;" disabled>Użyj kodu</button></form>
		</div>
	 <script>
					function recaptchaCallback() {
    $('.btn').removeAttr('disabled');
}; </script>
		</script> 
           </div>
		   </div>
    <div class="col-sm-2"></div>
</div>
<script>
$( document ).ready(function() {
    var x = document.body.clientWidth;
	if(x < 992) {
	$(".simpay").attr("src","images/simpaysmall.png");
	}
});
</script>




 <div class="row" ><footer class="footer-distributed">

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
</body>
</html>
<?php ob_end_flush(); ?>