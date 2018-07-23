<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=setuser");
  exit;
 }
  $a = $_SERVER['QUERY_STRING'];
if (strpos($a, 'good') !== false) {
    $errMSG = "Dane zostały zapisane poprawnie!";
	$errStyle = "alert-success";
}

 // szczegóły użytkownika
 mysql_query("SET NAMES utf8");
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $end = $_SESSION["end"];
 unset($_SESSION['end']);
 $mailhash = $userRow['userName'];
  $mine = $userRow['pracodawca'];
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
	$pracek = "true";
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
$pracek = "false";
}
 $pra=mysql_query("SELECT * FROM pradet WHERE name='$mailhash'");
$praRow=mysql_fetch_array($pra);
 $uz=mysql_query("SELECT * FROM userdet WHERE name='$mailhash'");
$uzRow=mysql_fetch_array($uz);

$nazwa = $mailhash;
$praphone = $praRow['telefon'];
$prawebsite = $praRow['strona'];
$plac = $praRow['adres'];
 $krs = $praRow['krs'];
 $pradesc = $praRow['opis'];
 $fanpage = $praRow['fb'];
 $twitter = $praRow['twitter'];
 $insta = $praRow['insta'];
 $miej = $praRow['miejscowosc'];
 $im = $uzRow['imie'];
 $placee = $uzRow['miejscowosc'];
 $phone = $uzRow['telefon'];
 $port = $uzRow['strona'];
 $zai = $uzRow['zai'];
 $op = $uzRow['opis'];
 
 $kol = $userRow['userEmail'];
 $nam = $userRow['userName'];
 $pra = $userRow['pracodawca'];

 				
 
  if (isset($_POST['pod'])) {
  $im = trim($_POST['imie']);
    $im = strip_tags($im);
    $im = htmlspecialchars($im);
	 $sex = $_POST['sex'];
	 $school = $_POST['school'];
	  $place = trim($_POST['city']);
    $place = strip_tags($place);
    $place = htmlspecialchars($place);
	$placee = str_replace(', Polska', '', $place);
	 
	 $phone = trim($_POST['phone']);
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);
	
	$port = trim($_POST['port']);
    $port = strip_tags($port);
    $port = htmlspecialchars($port);
	
	$zai = trim($_POST['zai']);
    $zai = strip_tags($zai);
    $zai = htmlspecialchars($zai);
	
	$op = trim($_POST['op']);
    $op = strip_tags($op);
    $op = htmlspecialchars($op);
if (strpos($sex, 'sex') !== false) {
  $error = true;
  $sexError = "Wybierz płeć!";
  }
if (strpos($school, 'school') !== false) {
  $error = true;
  $schoolError = "Wybierz typ szkoły!";
  }
if(!$error) {
	mysql_query("SET NAMES utf8");
	$qwe = ("UPDATE userdet SET `imie`='$im',`plec` = '$sex', `szkola` = '$school', `miejscowosc` = '$placee', `telefon` = '$phone', `strona` = '$port',`zai` = '$zai',`opis` = '$op' WHERE name='$mailhash'");
	$qw = mysql_query($qwe);
	if($qw) {
	header("Refresh:0; url=setuser?good");
	}
	else {
	$errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
	}
	}
	else {
	$errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
	}
  }
 if (isset($_POST['prac'])) {
 $pla = trim($_POST['cit']);
    $pla = strip_tags($pla);
    $pla = htmlspecialchars($pla);
	$plac = str_replace(', Polska', '', $pla);
if (isset($_POST['kom'])) {
	$praphone = trim($_POST['prakomphone']);
    $praphone = strip_tags($praphone);
    $praphone = htmlspecialchars($praphone);
}
else if (isset($_POST['stac'])) {
	$praphone = trim($_POST['prastacphone']);
    $praphone = strip_tags($praphone);
    $praphone = htmlspecialchars($praphone);
}		
	$prawebsite = trim($_POST['prawebsite']);
    $prawebsite = strip_tags($prawebsite);
    $prawebsite = htmlspecialchars($prawebsite);
	
	$fb = trim($_POST['fanpage']);
    $fb = strip_tags($fb);
    $fb = htmlspecialchars($fb);
	
	$twitter = trim($_POST['twitter']);
    $twitter = strip_tags($twitter);
    $twitter = htmlspecialchars($twitter);
	
	$insta = trim($_POST['insta']);
    $insta = strip_tags($insta);
    $insta = htmlspecialchars($insta);
	
	$pradesc = trim($_POST['pradesc']);
	$pradesc = strip_tags($pradesc);
	$pradesc = htmlspecialchars($pradesc);
	
	$miej = trim($_POST['cityy']);
	$miej = strip_tags($miej);
	$miej = htmlspecialchars($miej);
	$miej = str_replace(', Polska', '', $miej);
	mysql_query("SET NAMES utf8");
	$sql = ("UPDATE pradet SET adres='$plac',`telefon` = '$praphone',`miejscowosc` ='$miej', `strona` = '$prawebsite', `fb` = '$fb', `twitter` = '$twitter', `insta` = '$insta', `opis` = '$pradesc' WHERE name='$mailhash'");
	$res = mysql_query($sql);
	if($res) {
	header("Refresh:0; url=setuser?good");
	}
	else {
	$errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
	}
	
 }
 if ( isset($_POST['bat']) ) {
	$pass = trim($_POST['passnew']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
	$salt = '&8nP36vg!Xy@Keb';
	$passw = hash('sha512',$pass);
	$password = md5($salt.$passw);
	$sql = ("UPDATE users SET userPass='$password' WHERE userEmail='$kol'");
	$res = mysql_query($sql);
	if($res){
	unset($_SESSION['user']);
	session_unset();
	session_destroy();
	header("Location:login?cha");
	}
	else {
	$errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
	}
 }
 if (isset($_POST['but']) ) { 
    mysql_query("SET NAMES utf8");
	$sql="DELETE FROM users WHERE userEmail='$kol'";
	mysql_query($sql);
	$sq = "SET @count = 0";
	mysql_query($sq);
	$s = "UPDATE `users` SET `users`.`userId` = @count:= @count + 1";
	mysql_query($s);
	
		$d = "UPDATE `mess` SET `usunodb` = '1' WHERE `do`='$nam'";
		$g = mysql_query($d);
		$t = "UPDATE `mess` SET `usunnad` = '1' WHERE `od`='$nam'";
		$u = mysql_query($t);
				$sql = "SELECT * FROM mess WHERE usunodb=1 and usunnad=1";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$for = $row['rand'];
$ppp="DELETE FROM reply WHERE replyfor='$for'";
mysql_query($ppp);
$pp = "SET @count = 0";
mysql_query($pp);
$p = "UPDATE `reply` SET `reply`.`ID` = @count:= @count + 1";
mysql_query($p);
			}
$yyy="DELETE FROM mess WHERE usunodb=1 and usunnad=1";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `mess` SET `mess`.`ID` = @count:= @count + 1";
mysql_query($y);
 $pr = "SELECT name from premium where name='$nam'";
$pre = mysql_query($pr);

if(mysql_num_rows($pre) > 0)
{
$opp="DELETE FROM premium WHERE name='$nam'";
	mysql_query($opp);
	$ab = "SET @count = 0";
	mysql_query($op);
	$a = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
	mysql_query($o);
}
	if($s && $pra == 0){
	$abc="DELETE FROM userdet WHERE name='$nam'";
	mysql_query($abc);
	$ab = "SET @count = 0";
	mysql_query($ab);
	$a = "UPDATE `userdet` SET `userdet`.`ID` = @count:= @count + 1";
	mysql_query($a);
	
	$tyu="DELETE FROM pomoc WHERE kto='$nam'";
	mysql_query($tyu);
	$ty = "SET @count = 0";
	mysql_query($ty);
	$t = "UPDATE `pomoc` SET `pomoc`.`ID` = @count:= @count + 1";
	mysql_query($t);
	
	$gw=mysql_query("SELECT * FROM oceny");
$gwRow=mysql_fetch_array($gw);

	$jkl="DELETE FROM comment WHERE kto='$nam'";
	mysql_query($jkl);
	$jk = "SET @count = 0";
	mysql_query($jk);
	$j = "UPDATE `comment` SET `comment`.`ID` = @count:= @count + 1";
	mysql_query($j);
	
	 			$sql = "SELECT * FROM comment WHERE kto='$nam'";
            $results = mysql_query($sql);
			
			
            while($raw = mysql_fetch_array($results)) {
			$ar =  $raw['gwiazdki'];
			$komu =  $raw['komu'];
$stack[] = $ar;
$kom[] = $komu;
}
$komuu = array_unique($kom);
foreach ($komuu as $key => $value) {
    $arrayname[$key] = $value;
}
$le = max(array_keys($arrayname));
for($e = 0; $e <= $le; $e++){
 $name = "variable{$e}";
     $$name = $arrayname[$e];
	 $var = $arrayname[$e];
	mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM comment WHERE komu='$var'";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$ocena = $row['gwiazdki'];
			 $rate=mysql_query("SELECT * FROM oceny WHERE kto='$var'");
$rateRow=mysql_fetch_array($rate);
			if($ocena == 1) {
$il = $rateRow['1gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `1gw` = '$new' WHERE `kto`='$var'";
$rep = mysql_query($qw);
}
}
			if($ocena == 2) {
$il = $rateRow['2gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `2gw` = '$new' WHERE `kto`='$var'";
$rep = mysql_query($qw);
}
}
if($ocena == 3) {
$il = $rateRow['3gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `3gw` = '$new' WHERE `kto`='$var'";
$rep = mysql_query($qw);
}
}
if($ocena == 4) {
$il = $rateRow['4gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `4gw` = '$new' WHERE `kto`='$var'";
$rep = mysql_query($qw);
}
}
if($ocena == 5) {
$il = $rateRow['5gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `5gw` = '$new' WHERE `kto`='$var'";
$rep = mysql_query($qw);
}
}
			}
}

	if($a && $t && $j) {
	session_destroy();
	header("Location:login?good");
	}
	else {
	$errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
	}
	}
	else if($s && $pra == 1){
	$abc="DELETE FROM pradet WHERE name='$nam'";
	mysql_query($abc);
	$ab = "SET @count = 0";
	mysql_query($ab);
	$a = "UPDATE `pradet` SET `pradet`.`ID` = @count:= @count + 1";
	mysql_query($a);

	$qtz="DELETE FROM oceny WHERE kto='$nam'";
	mysql_query($qtz);
	$qt = "SET @count = 0";
	mysql_query($qt);
	$q = "UPDATE `oceny` SET `oceny`.`ID` = @count:= @count + 1";
	mysql_query($q);
	
	$xxx="DELETE FROM adv WHERE kto='$nam'";
	mysql_query($xxx);
	$xx = "SET @count = 0";
	mysql_query($xx);
	$x = "UPDATE `adv` SET `adv`.`ID` = @count:= @count + 1";
	mysql_query($x);
	
	$qaza="DELETE FROM pomoc WHERE kto='$nam'";
	mysql_query($qaza);
	$qaz = "SET @count = 0";
	mysql_query($qaz);
	$gaz = "UPDATE `pomoc` SET `pomoc`.`ID` = @count:= @count + 1";
	mysql_query($gaz);
	
	$haza="DELETE FROM comment WHERE komu='$nam'";
	mysql_query($haza);
	$haz = "SET @count = 0";
	mysql_query($haz);
	$ha = "UPDATE `comment` SET `comment`.`ID` = @count:= @count + 1";
	mysql_query($ha);
	
	$laza="DELETE FROM comment WHERE kto='$nam'";
	mysql_query($laza);
	$laz = "SET @count = 0";
	mysql_query($laz);
	$la = "UPDATE `comment` SET `comment`.`ID` = @count:= @count + 1";
	mysql_query($la);
	
	 
	
	
	if($a && $q && $x && $gaz && $ha && $la) {
	session_destroy();
	header("Location:login?good");
	}
	else {
	$errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
	}
	}
	else {
	$errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
	}
 }
  if (isset($_POST['bot']) ) {
  $email = trim($_POST['newmail']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  if($pra == 1){
  $heh = "YpKZQ";
  }
  else {
  $heh = "no";
  }
  $linkacz = "http://mrwork.pl/chan?mai=".$kol."?".$email."?".$heh;
  $to = $email;
  $subject = "Potwierdzenie zmiany adresu email w serwisie mrwork.pl";
  $txt = "Aby zmienić adres email w serwisie mrwork.pl kliknij poniższy link: ".$linkacz.PHP_EOL."Pozdrawiamy! Zespół mrwork.pl";
  $headers = 'From: admin@mrwork.pl' . "\r\n" .
    'Content-Type: text/html; charset=UTF-8' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers.="Content-Type: text/plain; charset=UTF-8";
$m = mail($to,$subject,$txt,$headers);
if($m){
$errMSG = "Na Twój nowy adres email został wysłany link z potwierdzeniem zmiany maila!";
	$errStyle = "alert-success";
}
else {
$errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
}
  }
  $bl=mysql_query("SELECT * FROM blocked WHERE kto='$nazwa'");
$blRow=mysql_fetch_array($bl);
$list = $blRow['kogo'];
$lista = explode(",", $list);
$num = count($lista);
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
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
$premium = "true";
$premdo = $premRow['do'];
$minusik = date('Y-m-d', strtotime('-1 day', strtotime($premdo)));
$nowsik = date("d.m.Y", strtotime($minusik));
}
else {
$premium = "false";
}
$jpeg = 'trust/'.$userRow['profilehash'].'.jpeg';
$jpg = 'trust/'.$userRow['profilehash'].'.jpg';
$gif = 'trust/'.$userRow['profilehash'].'.gif';
$png = 'trust/'.$userRow['profilehash'].'.png';
$bmp = 'trust/'.$userRow['profilehash'].'.bmp';
if(isset($_POST['upload']) ) {
if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {  
    $errMSG2 = "Wybierz plik z logiem do przesłania!";
    $errStyle2 = "alert-danger";
}
else {
$filename  = basename($_FILES['fileToUpload']['name']);
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$new       = $userRow['profilehash'].".".$extension;
$uploadOk = 1;
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
 
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    $errMSG2 = "Nie udało się przesłać pliku! Plik jest zbyt duży ( >1mb)";
	$errStyle2 = "alert-danger";
    $uploadOk = 0;
}
// Allow certain file formats
if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
&& $extension != "gif" && $extension != "bmp") {
    $errMSG2 = "Nie udało się przesłać pliku! Dostępne rozszerzenia to: jpg,png,jpeg,gif,bmp!";
	$errStyle2 = "alert-danger";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
$errMSG2 = "Nie udało się przesłać pliku!";
$errStyle2 = "alert-danger";
}
 else {
if (file_exists($jpeg)) {
    unlink("$jpeg");
} 
else if (file_exists($jpg)) {
    unlink("$jpg");
}
else if (file_exists($gif)) {
    unlink("$gif");
} 
else if (file_exists($png)) {
    unlink("$png");
} 
else if (file_exists($bmp)) {
    unlink("$bmp");
} 
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "trust/{$new}")) {   
    $errMSG2 = "Logo zostało dodane!";
    $errStyle2 = "alert-success";
    } else {
        $errMSG2 = "Nie udało się przesłać pliku";
    $errStyle2 = "alert-danger";
    }
}
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
<title>Ustawienia profilu - <?php echo $userRow['userName']; ?></title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>

  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/css/bootstrap-select.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyCM_QyIy1IwRbKBZ5_me2e_wq5ry_fHZAI&libraries=places"></script>
  <script src="assets/js/jquery.maskedinput.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/js/bootstrap-select.min.js"></script>
    <style>
	.input-group {
width:80%;
}
.zegnam {
width:40%;
}
.pracus {
 margin-bottom:5px; 
 width: 50%
}
.ttt {
width:15%;
}
#prac {
width:40%; 
margin-left: 7%;
}
@media (max-width:600px) {
.input-group {
width:100%;
}
.ttt {
width:40%;
}
#op {
width:100%;
}
.zegnam {
width:90%
}
.pracus {
width:100%;
}
#prac {
width:70%;
margin-left:0px;
}
}
</style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-left" style="margin-left: 20px;" href="home"><img style="max-width:150px; max-height:41px; margin-top: 8px;" src="logo.png"></a>
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
            <li class="active"><a href="setuser">Ustawienia konta</a></li>
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

<div class="container-fluid"><div class="col-md-8 col-md-offset-2">
  <?php if($end === "true") { ?><div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Uwaga!</strong> Ważność Twojego konta Premium wygasła! Aby wykupić dostęp ponownie kliknij <a style="font-weight:700; color:#BB4D55" href="kup">tutaj</a>.<br><strong>Dziękujemy za wsparcie serwisu mrwork.pl</strong>
</div><?php } ?>
<?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert <?php echo $errStyle; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
   <?php
   if ( isset($errMSG2) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-dismissable <?php echo $errStyle2; ?>">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG2; ?>
                </div>
             </div>
                <?php
   }
   ?>
<ul class="nav nav-tabs">
    <?php if($pracek === "false") { ?><li class="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "";
} else if (strpos($string, '1') == false) {  echo "active";} ?>"><a href="#pod">Podstawowe informacje</a></li><?php } ?>
    <?php if($pracek === "true") { ?><li class="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "active";
} else if (strpos($string, '1') == false) {  echo "";} ?>"><a href="#emp">Informacje o pracodawcy</a></li><?php } ?>
    <li><a href="#cho">Zmień email/hasło</a></li>
    <li><a href="#del">Usunięcie konta</a></li>
	<li><a href="#premium">Premium</a></li>
	<li><a href="#black">Czarna lista</a></li>
  </ul>

  <div class="tab-content wyp">
   <?php if($pracek === "false") { ?> <div id="pod" class="tab-pane <?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "";
} else if (strpos($string, '1') == false) {  echo "fade in active";} ?>">
      <center style="margin-right: 8%;"><h3>Podstawowe informacje</h3>
     <form method="POST">
	 <div class="row"  style="margin-top:10px; margin-bottom:10px; margin-left:10px; width:100%">
    <div class="col-sm-6"><div style="margin-bottom:5px;" class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-font"></span></span>
             <input id="imie" name="imie" type="text" class="form-control" placeholder="Imię" value="<?php echo $im; ?>" maxlength="20" /><span class="input-group-addon"><span style="color:red;">!</span></span>
                </div>
             <div style="margin-bottom:5px;" class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <select id="sex" name="sex" class="form-control selectpicker" >
      <option value="sex" >Wybierz płeć</option>
	  <option value="1">Mężczyzna</option>
	  <option value="0">Kobieta</option></select><span class="input-group-addon"><span style="color:red;">!</span></span>
                </div>
				 <span class="text-danger"><?php echo $sexError; ?></span>
				<script>
				var number = <?php echo json_encode($uzRow['plec']); ?>; 
				$('select[name=sex]').val(number);
$('.selectpicker').selectpicker('refresh')</script>
				<div style="margin-bottom:5px;" class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <select id="school" name="school" class="form-control selectpicker" >
      <option value="school" >Szkoła</option>
	  <option value="1">Gimnazjum</option>
	  <option value="2" >Liceum</option>
	  <option value="3" >Technikum</option>
	  <option value="4" >Zawodowa</option>
	  <option value="5" >Nie dotyczy</option>
	  </select><span class="input-group-addon"><span style="color:red;">!</span></span>
                </div>
				<span class="text-danger"><?php echo $schoolError; ?></span>
				<script>
				
				var num = <?php echo json_encode($uzRow['szkola']); ?>; 
				$('select[name=school]').val(num);
$('.selectpicker').selectpicker('refresh')
</script>
				<div style="margin-bottom:5px;" class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input id="maail" type="email" class="form-control" placeholder="Email:" value="<?php echo $kol; ?>" maxlength="40" disabled />
                </div><div class="form-group" >
<textarea style="width: 80%;" class="form-control"  rows="3" name="op" id="op" placeholder="Opisz siebie!" maxlength="250" data-toggle="tooltip" data-placement="right" title="Uwaga! Chrome ma problem z rozpoznawaniem enterów. Przy użyciu entera liczba pozostałych znaków może się różnić od prawdziwej! "><?php echo $op; ?></textarea>
	  <span class="text-danger"><?php echo $opError; ?></span>
	  <div id="opNum" style="display:inline; font-size: 12px;"></div><p style="padding-left:20px;  font-family: Muli; color:red; font-weight:700; display:inline;">pole wymagane</p>
    </div></div>
    <div class="col-sm-6">	 <div style="margin-bottom:5px;" class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
             <input id="city" name="city" type="text" class="form-control" placeholder="Miejcowość" value="<?php echo $placee; ?>" maxlength="80" autocomplete="off" /><span class="input-group-addon"><span style="color:red;">!</span></span>
                </div>
				<div  class="input-group" style="margin-bottom:5px;">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
             <input id="telephone" name="phone" type="text" class="form-control" placeholder="Telefon" value="<?php echo $phone; ?>" maxlength="12" />
                </div>
				<div  class="input-group" style="margin-bottom:5px;">
                <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
             <input id="port" name="port" type="text" class="form-control" placeholder="Twoja strona/fanpage/github" value="<?php echo $port; ?>" maxlength="80" />
                </div>
				
				<div  class="input-group" style="margin-bottom:5px;">
                <span class="input-group-addon"><span class="glyphicon glyphicon-music"></span></span>
             <input id="zai" name="zai" type="text" class="form-control" placeholder="Zainteresowania" value="<?php echo $zai; ?>" maxlength="80" data-toggle="tooltip" data-placement="top" title="Maksymalnie 3!"/>
                </div>
				<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script></div>
</div>
<div class="row">
    <div class="col-sm-12">
	 <p style="font-size: 15px; font-family: Muli; font-weight: 900; "><span style="color:red;">!</span> - pole wymagane</p>
	<button style="width:30%; margin:5px;" id="podest" name="pod" type="submit" class="btn btn-primary">Zapisz</button></div>
</div>
	</form></center></div>
				<script>jQuery(function($){
   $("#telephone").mask("999-999-999");
});</script>
<script>$(document).ready(function() {
    var text_max = 250;
    $('#opNum').html("Pozostało: " + text_max + ' znaków.');

    $('#op').keyup(function() {
        var text_length = $('#op').val().length;
        var text_remaining = text_max - text_length;
if (text_remaining > 4 || text_remaining == 0){
$('#opNum').html("Pozostało: " + text_remaining + ' znaków.');
}
else if (text_remaining < 5  || text_remaining > 1){
$('#opNum').html("Pozostały: " + text_remaining + ' znaki.');
}
if (text_remaining == 1){
$('#opNum').html("Pozostał: " + text_remaining + ' znak.');
}
if (text_remaining <= 10){
$('#opNum').css('color', 'red');
}
else if (text_remaining >= 10){
$('#opNum').css('color', 'black');
}
    });
});</script>

				<script>function autocompleteLoad() {
    var input = document.getElementById('city');
    var countryRestrict = { 'country': 'pl' }; 
    var options = {
        types: ['(cities)'], 
        componentRestrictions: countryRestrict
    };
    // documentation: developers.google.com/maps/documentation/javascript/reference#Autocomplete
    var autocomplete = new google.maps.places.Autocomplete(input, options);
}

google.maps.event.addDomListener(window, 'load', autocompleteLoad);</script>
    <?php } ?>
	
	<?php if($pracek === "true") { ?><div id="emp" class="tab-pane <?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "fade in active";
} else if (strpos($string, '1') == false) {  echo "";} ?>"> <div style="margin-left: 1%;">
	<form method="POST"> <table style="width:100%;" class="table table-responsive">
	<tbody>
	<tr><td style="width:25%">&nbsp;</td><td style="width:75%"><h3 style=" margin-left: 2%; ">Informacje o pracodawcy</h3></td></tr>
		<tr>
			<td style="width:25%;">
				Nazwa firmy
			</td>
			<td style="width:75%;">
				<div class="pracus input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input id="nazwa" type="text" class="form-control" placeholder="Nazwa" value="<?php echo $nazwa; ?>" maxlength="40" disabled />
                </div>
			</td>
		</tr>
		<tr>
			<td>
				Email kontaktowy
			</td>
			<td>
				<div class="pracus input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input id="maail" type="email" class="form-control" placeholder="Email:" value="<?php echo $kol; ?>" maxlength="40" disabled />
                </div>
			</td>
		</tr>
		<tr>
			<td>
				Adres
			</td>
			<td>
				<div class="pracus input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
             <input id="cit" name="cit" type="text" class="form-control" placeholder="Adres" value="<?php echo $plac; ?>" maxlength="250" autocomplete="off" /><span class="input-group-addon"><span style="color:red;">!</span></span>
                </div>
				<div  class="pracus input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
             <input id="cityy" name="cityy" type="text" class="form-control" placeholder="Miejscowość" value="<?php echo $miej; ?>" maxlength="80" autocomplete="off" /><span class="input-group-addon"><span style="color:red;">!</span></span>
                </div>
			</td>
		</tr>
		<tr>
			<td>
				Telefon kontaktowy
			</td>
			<td>
				<div id="kominput" class="pracus input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
             <input id="komphone" name="prakomphone" type="text" class="form-control" placeholder="Telefon" value="<?php echo $praphone; ?>" maxlength="12" /><span class="input-group-addon"><span style="color:red;">!</span></span>
                </div>
				
				<div id="stacinput" class="input-group pracus">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input id="stacphone" name="prastacphone" type="text" class="form-control" placeholder="Telefon" value="<?php echo $praphone; ?>" maxlength="12" /><span class="input-group-addon"><span style="color:red;">!</span></span>
                </div>
				
				<label class="radio-inline"><input type="radio" id="kom" value="kom" name="kom">Komórka</label>
<label class="radio-inline"><input type="radio" id="stac" value="stac" name="stac">Stacjonarny</label>
			</td>
		</tr>
		<tr>
			<td>
				Strona internetowa firmy
			</td>
			<td>
				<div  class="input-group pracus">
                <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
             <input id="prawebsite" name="prawebsite" type="text" class="form-control" placeholder="Strona internetowa firmy" value="<?php echo $prawebsite; ?>" maxlength="80" />
                </div>
			</td>
		</tr>
		<tr>
			<td>
				Social media
			</td>
			<td>
				<div  class="input-group pracus" >
                <span class="input-group-addon"><i class="fa fa-facebook-official" aria-hidden="true"></i></span>
             <input id="fanpage" name="fanpage" type="text" class="form-control" placeholder="Fanpage na Facebooku" value="<?php echo $fanpage; ?>" maxlength="80" />
                </div>
				<div  class="input-group pracus">
                <span class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
             <input id="twitter" name="twitter" type="text" class="form-control" placeholder="Twitter" value="<?php echo $twitter; ?>" maxlength="80" />
                </div>
				<div  class="input-group pracus">
                <span class="input-group-addon"><i class="fa fa-instagram" aria-hidden="true"></i></span>
             <input id="insta" name="insta" type="text" class="form-control" placeholder="Instagram" value="<?php echo $insta; ?>" maxlength="80" />
                </div>
			</td>
		</tr>
		<tr>
			<td>
				Numer KRS
			</td>
			<td>
				 <div class="pracus input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
             <input id="krs" type="text" class="form-control" placeholder="Numer KRS" value="<?php echo $krs; ?>" maxlength="40" disabled />
                </div>
			</td>
		</tr>
		<tr>
			<td>
				Krótki opis firmy <span style="color: red;">(pole wymagane!)</span>
			</td>
			<td>
				<div class="pracus form-group">
<textarea  class="form-control"  rows="6" name="pradesc" id="pradesc" placeholder="Krótki opis firmy,który pojawi się w profilu" maxlength="500"><?php echo $pradesc; ?></textarea>
	  <span class="text-danger"><?php echo $pradescError; ?></span>
	  <div id="descNum" style="font-size: 12px;"></div>
    </div>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<p style="margin-top:-5px; margin-left: 15%; "><span style="color:red;">!</span> - pole wymagane</p>
				<button id="prac" name="prac" type="submit" class="btn-block btn btn-primary">Zapisz</button>
			</td>
		</tr>
	</tbody>
</table></form>
<script>
var text = <?php echo json_encode($praRow['telefon']); ?>;
if(text.indexOf('-') > -1)
{
$("#stacinput").hide();
$("#kom").prop('checked',true);
$("#stac").prop('checked',false);
}
else {
$("#kominput").hide();
$("#kom").prop('checked',false);
$("#stac").prop('checked',true);
}


$('#stac').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'stac') {
           $("#stacinput").show();
		   $("#kominput").hide();
		   $("#kom").prop('checked',false);
$("#stac").prop('checked',true);
        }
	
    });
	$('#kom').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'kom') {
           $("#kominput").show();
		   $("#stacinput").hide();
		   $("#kom").prop('checked',true);
$("#stac").prop('checked',false);
        }
	
    });
</script>
<script>jQuery(function($){
   $("#komphone").mask("999-999-999");
   $("#stacphone").mask("99 9999999");
});</script>
<script>function autocompleteLoad() {
    var input = document.getElementById('cityy');
    var countryRestrict = { 'country': 'pl' }; 
    var options = {
        types: ['(cities)'], 
        componentRestrictions: countryRestrict
    };
    // documentation: developers.google.com/maps/documentation/javascript/reference#Autocomplete
    var autocomplete = new google.maps.places.Autocomplete(input, options);
}

google.maps.event.addDomListener(window, 'load', autocompleteLoad);</script>
	<script>$(document).ready(function() {
    var text_max = 500;
    $('#descNum').html("Pozostało: " + text_max + ' znaków.');

    $('#pradesc').keyup(function() {
        var text_length = $('#pradesc').val().length;
        var text_remaining = text_max - text_length;
if (text_remaining > 4 || text_remaining == 0){
$('#descNum').html("Pozostało: " + text_remaining + ' znaków.');
}
else if (text_remaining < 5  || text_remaining > 1){
$('#descNum').html("Pozostały: " + text_remaining + ' znaki.');
}
if (text_remaining == 1){
$('#descNum').html("Pozostał: " + text_remaining + ' znak.');
}
if (text_remaining <= 10){
$('#descNum').css('color', 'red');
}
else if (text_remaining >= 10){
$('#descNum').css('color', 'black');
}
    });
});</script></div>
    </div><?php } ?>
    <div id="cho" class="tab-pane fade">
        <h2 class="e" style="margin-top: 5px; text-align:center;">Zmień:</h2>
<center><div style=" margin-top:-20px; margin-bottom: 10px;">
    <button type="button" class="ttt btn btn-success">Email</button>
    <button type="button" class="ttt btn btn-danger">Hasło</button> 
</div>
<div id="raz" style="width:58%;"><div class="form-group">
             <form method="POST"><div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="newmail" id="newmail" class="form-control" placeholder="Nowy email:" value="<?php echo $email; ?>" maxlength="40" autocomplete="off" />
                </div>
                <p id="ee" style="margin-top:10px; font-size:18px; font-weight: 600; color:#a94442;">Podany email jest już w użyciu!</p>
            </div>
			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="agmail" id="agmail" class="form-control" placeholder="Powtórz email:" value="<?php echo $email; ?>" maxlength="40" autocomplete="off" />
                </div>
                <p id="ff" style="margin-top:10px; font-size:18px; font-weight: 600; color:#a94442;">Adresy email muszą być takie same!</p>
            </div><button style="margin-top: -5px; margin-bottom: 5px; width:40%;" id="bot" name="bot" type="submit" class="btn-block btn btn-primary" disabled>Zmień</button></form></div>
   <script>
   $("#ee").hide();
var TT;                
var DTI = 500;  
$('#newmail').keyup(function(){
    clearTimeout(TT);
    if ($('#newmail').val()) {
        TT = setTimeout(DT, DTI);
    }
});

function DT () {
    var ee = $('#newmail').val();
		$.ajax({
     url: 'mach.php', 
     type: "POST",
     dataType:'json', 
     data: ({nam: ee}),
     success: function(data){
         var da = data;
		 if (da === "tak"){
$('#bot').prop('disabled', true);
$("#newmail").addClass("bad");
$("#ee").show();
 $("#newmail").removeClass("good");
}
else {
if ($('#newmail').hasClass("good") && $("#agmail").hasClass("good")) {
$("#bot").prop("disabled", false );
}
else {
$('#bot').prop('disabled', true);
}
$("#newmail").addClass("good");
$("#ee").hide();
 $("#newmail").removeClass("bad");
}
     }
});
}
</script>
<script>
$("#ff").hide();
var ab;               
var ad = 500; 

//on keyup, start the countdown
$('#agmail').keyup(function(){
    clearTimeout(ab);
    if ($('#agmail').val()) {
        ab = setTimeout(abc, ad);
    }
});

function abc () {
if ($('#agmail').val() === $('#newmail').val()) {
		$("#ff").hide();
		$("#agmail").removeClass("bad");
		$("#agmail").addClass("good");
		if ($('#newmail').hasClass("good") && $("#agmail").hasClass("good")) {
$("#bot").prop("disabled", false );
}
else {
$('#bot').prop('disabled', true);
}
    } else {
	$('#bot').prop('disabled', true);
$("#ff").show();
  $("#agmail").removeClass("good");
   $("#agmail").addClass("bad");
    }
}</script>	
	<div id="dwa" style="width:58%;"><form method="POST"><div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" id="passold" name="passold" class="form-control" placeholder="Stare hasło:" maxlength="20" autocomplete="off" />
                </div>
                <p id="cc" style="margin-top:10px; font-size:18px; font-weight: 600; color:#a94442;">Nieprawidłowe hasło!</p>
            </div>
			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" id="passnew" name="passnew" class="form-control" placeholder="Nowe hasło:" maxlength="20" autocomplete="off" />
                </div>
                <p id="dd" style="margin-top:10px; font-size:18px; font-weight: 600; color:#a94442;">Hasło musi zawierać co najmniej 6 liter i przynajmniej 1 dużą literę!</p>
            </div>
			<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" id="passag" name="passag" class="form-control" placeholder="Powtórz hasło:" maxlength="20" autocomplete="off" /></span>
                </div>
                <p id="bb" style="margin-top:10px; font-size:18px; font-weight: 600; color:#a94442;">Hasła muszą być takie same!</p>
            </div><button style="margin-top: -5px; margin-bottom: 5px; width:40%;" type="submit" id="bat" name="bat" type="button" class="btn-block btn btn-primary" disabled>Zmień</button></form></div></center>		
   <script>
   
$(document).ready(function(){

$('#bb').hide();
$("#cc").hide();
$("#dd").hide();
	$("#raz").hide();
	$("#dwa").hide();
    $(".btn-success").click(function(){
        $("#raz").show();
		$("#dwa").hide();
    });
	$(".btn-danger").click(function(){
        $("#dwa").show();
		$("#raz").hide();
    });
	
var typingTimer;                //timer identifier
var doneTypingInterval = 500;  //time in ms (5 seconds)

//on keyup, start the countdown
$('#passold').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#passold').val()) {
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    }
});

function doneTyping () {
    var bla = $('#passold').val();
		$.ajax({
     url: 'ajax.php', //This is the current doc
     type: "POST",
     dataType:'json', // add json datatype to get json
     data: ({name: bla}),
     success: function(data){
         var da = data;
		 var pass = <?php echo json_encode($userRow['userPass']); ?>;
		 
		 if (da === pass){
		$("#cc").hide();
		$("#passold").removeClass("bad");
		$("#passold").addClass("good");
		 		if ($('#passold').hasClass("good") && $("#passag").hasClass("good") && $('#passnew').hasClass("good")) {
$("#bat").prop("disabled", false );
}
else {
$('#bat').prop('disabled', true);
}
}
else {
$('#bat').prop('disabled', true);
$("#passold").addClass("bad");
$("#cc").show();
 $("#passold").removeClass("good");
}
     }
});
}
});
</script> <script>
var tr;                
var dl = 500;  

$('#passnew').keyup(function(){
    clearTimeout(tr);
    if ($('#passnew').val()) {
        tr = setTimeout(dg, dl);
    }
});

function dg () {
var str = $('#passnew').val();
var patt = new RegExp("[A-Z]");
var res = patt.test(str);
var n = str.length;
if (n >= 6 && res == true ){
		$("#dd").hide();
		$("#passnew").removeClass("bad");
		$("#passnew").addClass("good");
				if ($('#passold').hasClass("good") && $("#passag").hasClass("good") && $('#passnew').hasClass("good")) {
$("#bat").prop("disabled", false );
}
else {
$('#bat').prop('disabled', true);
}
}
else {
$('#bat').prop('disabled', true);
$("#passnew").addClass("bad");
$("#dd").show();
 $("#passnew").removeClass("good");
}
}
</script>
<script>var typing;                //timer identifier
var doneTyping = 500;  //time in ms (5 seconds)

//on keyup, start the countdown
$('#passag').keyup(function(){
    clearTimeout(typing);
    if ($('#passag').val()) {
        typing = setTimeout(doneTyp, doneTyping);
    }
});

function doneTyp () {
if ($('#passag').val() === $('#passnew').val()) {
		$("#bb").hide();
		$("#passnew").removeClass("bad");
		$("#passnew").addClass("good");
		$("#passag").removeClass("bad");
		$("#passag").addClass("good");
		if ($('#passold').hasClass("good") && $("#passag").hasClass("good") && $('#passnew').hasClass("good")) {
$("#bat").prop("disabled", false );
}
else {
$('#bat').prop('disabled', true);
}
    } else {
	$('#bat').prop('disabled', true);
        $("#passnew").addClass("bad");
$("#bb").show();
 $("#passnew").removeClass("good");
  $("#passag").removeClass("good");
   $("#passag").addClass("bad");
    }
}</script> 

    </div>
    <div id="del" class="tab-pane fade">
      <center><h3><b>Usunięcie konta</b></h3>
      <p>Aby usunąć konto w serwisie mrwork.pl wpisz swoje hasło poniżej:</p>
             <div class="zegnam input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input id="pass" type="password" name="pass" class="form-control" placeholder="Hasło:" maxlength="20" autocomplete="off" /><span class="input-group-addon"><button type="button" style="background:none; border:none; margin:0; padding:0;" id="eye">Pokaż</button></span>
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
		<ul id="ul" style="list-style-type:none;"><h4 style="color:red;"><b>Pamiętaj, że:</b></h4>
		<li>Stracisz dostęp do wszytkich informacji zgromadzonych na koncie</li>
		<li>Wszystkie wiadomości zostaną usunięte</li>
		<li>Ta operacja jest <b><mark>nieodwracalna</mark></b>!</li></ul>
		<p id="aa" style="margin-top:10px; font-size:18px; font-weight: 600; color:#a94442;">Nieprawidłowe hasło!</p>
		<form method="POST"><button id="but" name="but" type="submit" class="btn btn-danger btn-block" style="width:24%; margin-top: 10px; margin-bottom: 10px;">Usuń</button></form></center>
    </div>
	<div id="black" class="tab-pane fade"><div><?php $poi = "SELECT kto FROM blocked WHERE kto='$mailhash'";
   $iop = mysql_query($poi);
   $ct = mysql_num_rows($iop);
   if($ct!=0 && !empty($blRow['kogo'])){
   ?><center><h3><b>Zablokowani użytkownicy</b></h3>
	<?php for($x = 0; $x < $num; $x++) { ?><p style="display:inline;font-size: 20px;vertical-align: middle;font-family: Muli;"><?php echo $lista[$x]; ?>&nbsp;</p>
	<button  value="<?php echo $lista[$x]; ?>" style="display:inline;" type="button" class="unblock btn btn-danger btn-xs">
								  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</button><br><?php } ?></center>
								<script>
$('.unblock').on('click', function(event) { 
var eh = $(this).attr("value");
var kto = <?php echo json_encode($userRow['userName']); ?>;
if(confirm("Czy na pewno chcesz odblokować użytkownika?")) { 
$.ajax({
     url: 'unblock.php', 
     type: "POST",
     dataType:'json', 
     data: ({eh: eh, kto: kto}),
     success: function(data){
	 if (data == 'true') {
if (!alert('Użytkownik został odblokowany!')) {
          location.reload();  
 }
}
	 },
	 error: function () {
       alert("Coś poszło nie tak, spróbuj jeszcze raz!");
      }
});
}
 });</script><?php } else {?> <center><h3><b>Nie masz żadnych zablokowanych użytkowników!</b></h3></center><?php } ?></div></div>
 <div id="premium" class="tab-pane fade">
      <center><?php if($premium === "false") { ?><h3 style="font-family:Muli;">Wersja konta:&nbsp;<span style="color:#CC0000; font-weight:700;">darmowa</span></h3>
	  <h3 style="font-family:Raleway;">Przeczytaj o zaletach konta <a href="premium" style="color:#058547; font-weight:700;">Premium</a></h3>
	  <h3 style="font-family:Raleway;"><a href="kup" style="color:#058547; font-weight:700;">Kup dostęp do konta Premium</a></h3>
	  </center>
	   <?php } else if($premium === "true") { ?><h3 style="font-family:Raleway;">Wersja konta:&nbsp;<span style="color:#058547; font-weight:700;">Premium</span></h3>
	   <h3 style="font-family:Raleway;">Twoje konto jest ważne do&nbsp;<span style="color:#058547; font-weight:700;"><?php echo $nowsik; ?>&nbsp;23:59</span></h3>
		<h3 style="font-family:Raleway;">Aby przedłużyć jego ważność kliknij&nbsp;<a href="kup" style="color:#058547; font-weight:700;">tu</a></h3>
		<?php if($pracek === "true") { ?><h3 style="font-family:Raleway;">Prześlij swoje logo do sekcji&nbsp;<a style="color:#058547; font-weight:700;" href="http://mrwork.pl/about#trusted">Zaufali nam</a>&nbsp;(wymiary 150x60 px)</h3> 
		<form action="" method="post" enctype="multipart/form-data"><center>
<input style=" margin-bottom: 5px; " type="file" name="fileToUpload" id="fileToUpload"><button type="submit" name="upload" class="btn btn-success btn-sm"><b style="font-family: Raleway;" >&nbsp;Prześlij&nbsp;</b></button>
</center></form>
		<?php } ?>
		<h3 style="font-family:Muli; font-weight:700;">Dziękujemy za wspieranie serwisu mrwork.pl!</h3>
	   <?php } ?></center>
    </div>
  </div>
</div>
<script>function show() {
    var p = document.getElementById('pass');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('pass');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);</script>
<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
<script> $("#but").hide();
$("#aa").hide();
	//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 1500;  //time in ms (5 seconds)

//on keyup, start the countdown
$('#pass').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#pass').val()) {
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    }
});

function doneTyping () {
    var bla = $('#pass').val();
		$.ajax({
     url: 'ajax.php', //This is the current doc
     type: "POST",
     dataType:'json', // add json datatype to get json
     data: ({name: bla}),
     success: function(data){
         var da = data;
		 var pass = <?php echo json_encode($userRow['userPass']); ?>;
		 
		 if (da === pass){
		$("#ul").hide();
		$("#but").show();
		$("#aa").hide();
		$("#pass").removeClass("bad");
		$("#pass").addClass("good");
		 
}
else {
$("#pass").addClass("bad");
$("#ul").hide();
$("#but").hide();
$("#aa").show();
 $("#pass").removeClass("good");
}
     }
});

}</script>

</div>
<script>
$(document).ready(function(){
    mineunction();
});
function mineunction(){
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
var wysokosc = $(".container-fluid").height();
}
else {
var wysokosc = $(".container-fluid").height();
if(wysokosc < 400) {
var ile = 400 - wysokosc;
$(".stopeczka").css("marginTop", ile);
}
}
setTimeout(mineunction, 100);
}
</script>
 <div class="row stopeczka"><footer class="footer-distributed">

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