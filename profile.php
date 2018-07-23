<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 $abc = $_GET['ran'];
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=profile?ran=$abc");
  exit;
 }
 $po = "SELECT userId from users where profilehash='$abc'";
$pp = mysql_query($po);

if(mysql_num_rows($pp) === 0)
{
    header("Location:404.html");
}
     $digit1 = mt_rand(1,20);
    $digit2 = mt_rand(1,20);
    if( mt_rand(0,1) === 1 ) {
            $math = "$digit1 + $digit2";
            $_SESSION['answer'] = $digit1 + $digit2;
    } else {
            $math = "$digit1 - $digit2";
            $_SESSION['answer'] = $digit1 - $digit2;
    }
	 $digit3 = mt_rand(1,20);
    $digit4 = mt_rand(1,20);
    if( mt_rand(0,1) === 1 ) {
            $math2 = "$digit3 + $digit4";
            $_SESSION['answer2'] = $digit3 + $digit4;
    } else {
            $math2 = "$digit3 - $digit4";
            $_SESSION['answer2'] = $digit3 - $digit4;
    }

   mysql_query("SET NAMES utf8");
   $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $end = $_SESSION["end"];
 unset($_SESSION['end']);
 $ser = $_SERVER['QUERY_STRING'];
 $rest = substr($ser, 4); 
 $mine = $userRow['pracodawca']; 
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
	$sta = "false";
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
$sta = "true";
}
if (strpos($a, 'are') !== false) { echo 'true'; }
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

 $us=mysql_query("SELECT * FROM users WHERE profilehash='$rest'");
$usRow=mysql_fetch_array($us);
$cking = $usRow['pracodawca'];
if($cking === "0") {
header("Location: usprofile?ran=$rest");
}
$nazwa = $usRow['userName'];
 $pra=mysql_query("SELECT * FROM pradet WHERE name='$nazwa'");
$praRow=mysql_fetch_array($pra);
 $rate=mysql_query("SELECT * FROM oceny WHERE kto='$nazwa'");
$rateRow=mysql_fetch_array($rate);
$var1 = $userRow['userName'];
if (strcmp($var1, $nazwa) !== 0) {
$swoj = 'l<"toolbar">frtip';
$odp = "false";
}
else {
$swoj = 'frltip';
$odp = "true";
}
$string = $usRow['pracodawca'];
 $ver = $praRow['zweryfikowany'];
 $web = $praRow['strona'];
 $f = $praRow['fb'];
 $tel = $praRow['telefon'];
 $krs = $praRow['krs'];
 $tw = $praRow['twitter'];
 $in = $praRow['insta'];
 
 $gw1 = $rateRow['1gw'];
 $gw2 = $rateRow['2gw'];
 $gw3 = $rateRow['3gw'];
 $gw4 = $rateRow['4gw'];
 $gw5 = $rateRow['5gw'];
 
 $all = $gw1+$gw2+$gw3+$gw4+$gw5;
if($all != 0) { 
$percent1 = $gw1/$all;
$pe1 = number_format( $percent1 * 100, 2 );


$percent2 = $gw2/$all;
$pe2 = number_format( $percent2 * 100, 2 );

$percent3 = $gw3/$all;
$pe3 = number_format( $percent3 * 100, 2 );

$percent4 = $gw4/$all;
$pe4 = number_format( $percent4 * 100, 2 );

$percent5 = $gw5/$all;
$pe5 = number_format( $percent5 * 100, 2 );

$sre = $gw1*1+$gw2*2+$gw3*3+$gw4*4+$gw5*5;
$sree = $sre/$all;
$sr = round($sree, 2);
 }
 else if($all == 0) {
 $sr = "0";
 $pe1 = "0";
 $pe2 = "0";
 $pe3 = "0";
 $pe4 = "0";
 $pe5 = "0";
 }
$pow = strpos($ver, $foundme);
 if ($pow === false) {
  $styl = "display:none;";
 }
 else {
 $styl = "display:initial;";
 }
 if (empty($web) && empty($f) && empty($tw) && empty($in)) {
  $o = "display:none;";
 }
 if (empty($web)) {
    $w = "display:none";
}
 if (empty($f)) {
    $x = "display:none";
}
if (empty($tw)) {
    $y = "display:none";
}
if (empty($in)) {
    $z = "display:none";
}
$as = $praRow['adres'].",".$praRow['miejscowosc'];
$za = $praRow['miejscowosc'];
$str = $praRow['adres'];
$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'A'=>'A', 'Á'=>'A','Ą'=>'A', 'Â'=>'A', 'A'=>'A', 'Ä'=>'A', 'A'=>'A', 'A'=>'A', 'Ć'=>'C','Ç'=>'C', 'E'=>'E','Ę'=>'E', 'É'=>'E',
                            'E'=>'E', 'Ë'=>'E', 'I'=>'I', 'Í'=>'I', 'Î'=>'I', 'I'=>'I', 'Ś'=>'S', 'Ń'=>'N','N'=>'N', 'O'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'O'=>'O', 'Ö'=>'O', 'O'=>'O', 'U'=>'U',
                            'Ú'=>'U', 'U'=>'U', 'Ü'=>'U', 'Ý'=>'Y','Ż'=>'Z','Ź'=>'Z', '?'=>'B', 'ß'=>'Ss', 'a'=>'a', 'á'=>'a','ą'=>'a', 'â'=>'a', 'a'=>'a', 'ä'=>'a', 'a'=>'a', 'a'=>'a', 'ç'=>'c',
                            'ć'=>'c', 'e'=>'e', 'é'=>'e', 'e'=>'e','ę'=>'e', 'ë'=>'e', 'i'=>'i', 'í'=>'i', 'î'=>'i', 'i'=>'i', '?'=>'o', 'n'=>'n', 'ń'=>'n', 'o'=>'o', 'ó'=>'o', 'ô'=>'o', 'o'=>'o',
                            'ö'=>'o','ś'=>'s', 'o'=>'o', 'u'=>'u', 'ú'=>'u', 'u'=>'u', 'ý'=>'y', '?'=>'b', 'y'=>'y','ż'=>'z','ź'=>'z');
$str = strtr( $str, $unwanted_array );
$linkacz = $usRow['userName'];
$linke = str_replace(" ", "-",$linkacz);
$link = strtr( $linke, $unwanted_array );
if (strpos($za, 'Bydgoszcz') !== false) {
    $nr = "8000";
}
else if (strpos($za, 'Poznań') !== false) {
    $nr = "1000";
}
else if (strpos($za, 'Wrocław') !== false) {
    $nr = "2000";
}
else if (strpos($za, 'Warszawa') !== false) {
    $nr = "3000";
}
else if (strpos($za, 'Szczecin') !== false) {
    $nr = "4000";
}
else if (strpos($za, 'Kraków') !== false) {
    $nr = "5000";
}
else if (strpos($za, 'Łódź') !== false) {
    $nr = "6000";
}
else if (strpos($za, 'Sopot') !== false) {
    $nr = "7000";
}
else if (strpos($za, 'Gdańsk') !== false) {
    $nr = "7000";
}
else if (strpos($za, 'Gdynia') !== false) {
    $nr = "7000";
}
else if (strpos($za, 'Toruń') !== false) {
    $nr = "8001";
}
else if (strpos($za,'Będzin') !== false || strpos($za,'Bytom') !== false || strpos($za,'Chorzów') !== false || strpos($za,'Czeladź') !== false || strpos($za,'Dąbrowa Górnicza') !== false || strpos($za,'Gliwice') !== false || strpos($za,'Katowice') !== false || strpos($za,'Mysłowice') !== false || strpos($za,'Ruda Śląska') !== false || strpos($za,'Siemianowice') !== false || strpos($za,'Sosnowiec') !== false || strpos($za,'Świętochłowice') !== false || strpos($za,'Tychy') !== false || strpos($za,'Zabrze') !== false || strpos($za,'Jaworzno') !== false) {
  $nr = "9000";
}
else if (strpos($za, 'Radom') !== false) {
    $nr = "10000";
}
else if (strpos($za, 'Białystok') !== false) {
    $nr = "11000";
}
$il1 = 0;
$sql = "SELECT * FROM comment WHERE komu='$nazwa'";
            $results = mysql_query($sql);
           
           
            while($riw = mysql_fetch_array($results)) {
			$ar = $riw['gwiazdki'];
			$stack[] = $ar;
}
	$counts = array_count_values($stack);
			$jed = $counts['1'];
			$dwa = $counts['2'];
			$trzy = $counts['3'];
			$cztery = $counts['4'];
			$pync = $counts['5'];

			$qw1 = "UPDATE `oceny` SET `1gw` = '$jed' WHERE `kto`='$nazwa'";
$rep1 = mysql_query($qw1);

$qw2 = "UPDATE `oceny` SET `2gw` = '$dwa' WHERE `kto`='$nazwa'";
$rep2 = mysql_query($qw2);

$qw3 = "UPDATE `oceny` SET `3gw` = '$trzy' WHERE `kto`='$nazwa'";
$rep3 = mysql_query($qw3);


$qw4 = "UPDATE `oceny` SET `4gw` = '$cztery' WHERE `kto`='$nazwa'";
$rep4 = mysql_query($qw4);

$qw5 = "UPDATE `oceny` SET `5gw` = '$pync' WHERE `kto`='$nazwa'";
$rep5 = mysql_query($qw5);

$jpeg = 'logo/'.$usRow['profilehash'].'.jpeg';
$jpg = 'logo/'.$usRow['profilehash'].'.jpg';
$gif = 'logo/'.$usRow['profilehash'].'.gif';
$png = 'logo/'.$usRow['profilehash'].'.png';
$bmp = 'logo/'.$usRow['profilehash'].'.bmp';

if(isset($_POST['upload']) ) {
if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {  
    $errMSG = "Wybierz plik z logiem!";
    $errStyle = "alert-danger";
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
    $errMSG = "Nie udało się przesłać pliku! Plik jest zbyt duży ( >1mb)";
	$errStyle = "alert-danger";
    $uploadOk = 0;
}
// Allow certain file formats
if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
&& $extension != "gif" && $extension != "bmp") {
    $errMSG = "Nie udało się przesłać pliku! Dostępne rozszerzenia to: jpg,png,jpeg,gif,bmp!";
	$errStyle = "alert-danger";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
$errMSG = "Nie udało się przesłać pliku!";
$errStyle = "alert-danger";
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
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "logo/{$new}")) {   
    $errMSG = "Logo zostało zmienione!";
    $errStyle = "alert-success";
    } else {
        $errMSG = "Nie udało się przesłać pliku";
    $errStyle = "alert-danger";
    }
}
}
}	

if (file_exists($jpeg)) {
    $path = $jpeg;
} 
else if (file_exists($jpg)) {
    $path = $jpg;
}
else if (file_exists($gif)) {
    $path = $gif;
} 
else if (file_exists($png)) {
    $path = $png;
} 
else if (file_exists($bmp)) {
    $path = $bmp;
}  else {
    $path = "user.png";
}
$blocked = $userRow['userName'];
$bl=mysql_query("SELECT * FROM blocked WHERE kto='$blocked'");
$blRow=mysql_fetch_array($bl);
$who = $blRow['kogo'];
if(!empty($blRow['kogo'])) {
$pieces = explode(",",$blRow['kogo']);
$num = count($pieces);
$arr = array();
for($x = "0";$x<$num;$x++) {
$temp = "(?!".$pieces[$x].")";
array_push($arr, $temp);
}
$com = implode("", $arr);
}
  $ziemek = $userRow['userName'];
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
$premium = "true";
}
 $pr2 = "SELECT name from premium where name='$var1'";
$pre2 = mysql_query($pr2);

if(mysql_num_rows($pre2) > 0)
{
  $prem2=mysql_query("SELECT * FROM premium WHERE name='$var1'");
$premRow2=mysql_fetch_array($prem2);
$dzisia = date("Y-m-d");
$wygas = $premRow2['do'];

$dzisiaj = strtotime($dzisia);
$wygasa = strtotime($wygas);

if ($dzisiaj >= $wygasa) { 
$end = "true";
$prac = $userRow['pracodawca'];
if($prac === "1") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$var1'");
$io = mysql_query($iop);
$jop = ("UPDATE adv SET wyr=0 WHERE kto='$var1'");
$jo = mysql_query($jop);
if($jo) {
$yyy="DELETE FROM premium WHERE name='$var1'";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
mysql_query($y);
}
}
else if($prac === "0") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$var1'");
$io = mysql_query($iop);
if($io) {
$yyy="DELETE FROM premium WHERE name='$var1'";
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
 $prka = "SELECT name from premium where name='$nazwa'";
$preka = mysql_query($prka);

if(mysql_num_rows($preka) > 0)
{
$premka=mysql_query("SELECT * FROM premium WHERE name='$nazwa'");
$premkaRow=mysql_fetch_array($premka);
$dzisia = date("Y-m-d");
$wygas = $premkaRow['do'];

$dzisiaj = strtotime($dzisia);
$wygasa = strtotime($wygas);
if ($dzisiaj >= $wygasa) { 
$us=mysql_query("SELECT * FROM users WHERE userName='$nazwa'");
$usRow=mysql_fetch_array($us);
$prac = $usRow['pracodawca'];
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
header("Refresh:0");
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
<title>Profil - <?php echo $nazwa; ?></title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href=" http://antenna.io/demo/jquery-bar-rating/dist/themes/fontawesome-stars.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	  <style>
.dataTables_filter { display: initial !important; float:right; }
.zwykly {
float:left;
}
.specjalny {
float:right;
}
.marginowy {
margin-top:0px;
}
@media (max-width:600px) {
.zwykly {
float:none;
}
.specjalny {
float:none;
margin-top:10px
}
.marginowy {
margin-top:5px;
}
}
</style>
</head>
<body style="background-color:#F1F3FA;">
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
		  <li <?php if (strcmp($var1, $nazwa) == 0) { ?> class="active" <?php } ?>><a href="<?php echo $linek; ?>">Mój profil</a></li>
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
</nav><?php if (strpos($who, $nazwa) !== false) {   ?>

		<center><div style="width:50%;" class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> Nie można wyświetlić profilu, użytkownik został zablokowany! Możesz odblokować go w <a href="setuser" class="alert-link">ustawieniach konta</a>.
                </div>
</div> </center><?php } ?>
  <?php if($end === "true") { ?><div style="width:50%" class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Uwaga!</strong> Ważność Twojego konta Premium wygasła! Aby wykupić dostęp ponownie kliknij <a style="font-weight:700; color:#BB4D55" href="kup">tutaj</a>.<br><strong>Dziękujemy za wsparcie serwisu mrwork.pl</strong>
</div><?php } ?>
<div class="container-fluid">
<?php if (strpos($who, $nazwa) !== false) {   ?> <script>$('.container-fluid').hide();</script> 
 <?php } ?>
<?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert <?php echo $errStyle; ?>">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
      	      <div class="form-group">
             <div id="wiadpo" style="display:none;" class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wiadomość została wysłana!
                </div>
             </div>
			   <script>
   if(window.location.hash) {
  $("#wiadpo").show();
} 
   </script>
   	  		    <div class="form-group">
             <div id="bravo" style="display:none;" class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Dziękujemy za dodanie komentarza!
                </div>
             </div>
			  <div class="form-group">
             <div id="thx" style="display:none;" class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Dziękujemy za dodanie odpowiedzi!
                </div>
             </div>
<br>
  <div class="row" style="margin-top:-1%;">
  <div class="col-md-1" style="width:1%;"> 
    &nbsp;
    </div>
     <div class="col-md-3 profil">
      <ul class="nav nav-pills nav-stacked nav-tabs">
        <li><div class="profile-userpic">
					<img src="<?php echo $path; ?>" class="img-responsive" alt="">
				</div><div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $usRow['userName']; ?>
					</div>	<?php if (strcmp($var1, $nazwa) == 0) { ?>
<button  type="button" name="showman" id="showman" class="btn btn-primary btn-sm"><b style="font-family: Raleway;" >Zmień logo</b></button>
<div id="zmiana" style="display:none;" ><form action="" method="post" enctype="multipart/form-data"><center>
<input style=" margin-bottom: 5px; " type="file" name="fileToUpload" id="fileToUpload"><button type="submit" name="upload" class="btn btn-primary btn-sm"><b style="font-family: Raleway;" >Wyślij</b></button>
<button type="button" id="cancel" class="btn btn-danger btn-sm"><b style="font-family: Raleway;" >Anuluj</b></button>
</center></form><p style="font-family: Raleway;" >Twój plik nie może mieć więcej niż <b style="color:red;">1MB</b>! Obsługiwane formaty: <b style="color:red;">.gif/.png/.jpg/.bmp</b></p></div><?php } ?>
<script>
$(document).ready(function(){
    $("#showman").click(function(){
        $("#zmiana").show('800');
		$("#showman").hide();
    });
	$("#cancel").click(function(){
        $("#zmiana").hide('800');
		$("#showman").show();
    });
});
</script>
				</div>
				<?php if (strcmp($var1, $nazwa) !== 0) { ?>
				<div class="profile-userbuttons">
					<button type="button" data-toggle="modal" data-target="#mess" class="btn btn-success btn-sm">Wiadomość</button>
					
					<button id="block" type="button" class="btn btn-danger btn-sm">Zablokuj</button>
				</div><?php } ?>
				<?php if($premium === "true") {?><div style="margin-top:5px; margin-bottom:-10px;"><p style="text-align:center;color: #058547;font-size: 20px;font-weight: 700;font-family: Muli;"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Użytkownik Premium</p></div><?php } ?>
				</li>
        <li style="padding-top:5px;" class="active"><a data-toggle="tab" href="#pod">Podstawowe informacje</a></li>
        <li><a data-toggle="tab" href="#kom">Komentarze</a></li>
		<li><a data-toggle="tab" href="#og">Ogłoszenia</a></li>
      </ul>
    </div>
	<div class="col-md-1" style="width:1%;"> 
    &nbsp;
    </div>
	<div class="tab-content">
    <div class="col-md-8 profile tab-pane fade in active" id="pod"> <p style="font-size:20px; margin:0; color:#396988; float:left;"><b>O nas:</b></p><div id="nad" style="<?php echo $styl; ?> float: right; color:#396988;"><b>Pracodawca zweryfikowany</b>&nbsp;
<img  class="icon icons8-Verified-Account-Filled" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAABf0lEQVRIS72VvVHDQBCF3xpy6AATMIMyl2ASS0TQAhVYrsDnCpArgBIgwpDgEiCSGBK5A5MDjzlhgXwS0g5gXajbe9+u9k/QwpEWGFBDPDMLCQwF0iWYUhA9jYOpxkkVxBvPIogMS4LkNJ4EYROoEnJobrqCzjmAPoDdJhEASwBz4n2UmOPUtS9BDsxdbxu8V4q7estXyNGzGTwUL0oQbzy7gsiJwvtqE/I6ngSn9RBzy18DVg9j4685X47kjxACL4nx1/K4BvmximpD4whACMhewSyKjW+/Z+cLYvsAEFtR6kPI2acIL9xH9i4xg0sXkjre1PtfA7APbcMmJth3IFUJ5wJA5EZYF0HRs7wAir+rMhJXUAsg8JgYv6fOSS78nchyDlQ5sUZ11aWNIIM5M+3f+8QyNt6MOkgbs8tO4S1wLsCOuitXhnakvEH6jVPY2mf7hBJRpK+BWXEh5xSGqn1S5f1GNmMlKJtt+SDkguiYfDY1/VbVjm8SabpvBfIByTerGmlxkWcAAAAASUVORK5CYII=" width="25" height="25">	</div>
	<p style="min-width:99%; float: left; margin:0;"><?php echo $praRow['opis']; ?></p>
	<br><p style="font-size:20px;"><span style="color:#396988;"><b>Dane kontaktowe:</b> </span><br><b style="font-size:14px;"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Adres:&nbsp;</b><span style="font-size:14px;"><?php echo $as; ?></span>
	<br><b style="font-size:14px;"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Telefon:&nbsp;</b><span style="font-size:14px;"><?php echo $tel; ?></span>
	<br><b style="font-size:14px;"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Numer KRS:&nbsp;</b><span style="font-size:14px;"><a title="Sprawdź pracodawcę" href="https://mojepanstwo.pl/<?php echo $link ?>"><?php echo $krs; ?></a></span>
 </p>
	<div class="dd"><span style="<?php echo $o; ?> font-size: 20px; color:#396988; "><b>Odwiedź nas:</b> </span><a style="<?php echo $w; ?>" href="<?php echo $praRow['strona']; ?>"><i class="fa fa-globe" aria-hidden="true"></i></a><a style="<?php echo $x; ?>" href="<?php echo $praRow['fb']; ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a><a style="<?php echo $y; ?>" href="<?php echo $praRow['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a><a style="<?php echo $z; ?>" href="<?php echo $praRow['insta']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></div><br>
	<div class="profile-userbuttons" style="width:100%;" >
									  	<button type="button"  class="zwykly btn btn-success btn-sm" data-toggle="modal" data-target="#map">Zobacz na mapie</button>
									  	<button id="doj" type="button" class="zwykly btn btn-primary btn-sm">Sprawdź dojazd</button>
										<?php if(strcmp($nazwa, $userRow['userName']) !== 0) {?> <button type="button" class="specjalny btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><b>Zgłoś użytkownika</b></button><?php }?>
									</div>
<script>$('#doj').on('click', function(event) {
 window.open('http://jakdojade.pl/?tn=<?php echo $str; ?>&cid=<?php echo $nr ?>&t=1', '_blank');
});</script>
    </div><div class="col-md-8 profile tab-pane " id="kom"><div class="row">
	<div class="col-md-1">&nbsp;</div>
    <div class="col-md-4"><div class="rating-block">
					<h3>Średnia ocena</h3>
					<h2 class="bold padding-bottom-7"><?php echo $sr; ?>&nbsp;<small>/ 5</small></h2>
					<?php 
					$gwiazdki = round($sr, 0); 
					for($z = 1; $z<=$gwiazdki; $z++){ ?> <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button> <?php } ?>
					<?php for($y = $gwiazdki+1; $y<=5; $y++){ ?><button type="button" class="btn btn-default btn-sm" aria-label="Left Align">
					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button> <?php } ?>
				</div></div>
    <div class="col-md-1">&nbsp;</div>
    <div class="col-md-5"> <span  style="float: left; width: 25px; margin-right: 5px;">5&nbsp;<i class="fa fa-star" aria-hidden="true"></i></span><div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
  aria-valuenow="<?php echo $pe5; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $pe5; ?>%">
  </div>
</div>
<span  style="float: left; width: 25px; margin-right: 5px;">4&nbsp;<i class="fa fa-star" aria-hidden="true"></i></span><div class="progress">
  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
  aria-valuenow="<?php echo $pe4; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $pe4; ?>%">
  </div>
</div>
<span  style="float: left; width: 25px; margin-right: 5px;">3&nbsp;<i class="fa fa-star" aria-hidden="true"></i></span><div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
  aria-valuenow="<?php echo $pe3; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $pe3; ?>%">
  </div>
</div>
<span  style="float: left; width: 25px; margin-right: 5px;">2&nbsp;<i class="fa fa-star" aria-hidden="true"></i></span><div class="progress">
  <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
  aria-valuenow="<?php echo $pe2; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $pe2; ?>%">
  </div>
</div>
<span  style="float: left; width: 25px; margin-right: 5px;">1&nbsp;<i class="fa fa-star" aria-hidden="true"></i></span><div class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
  aria-valuenow="<?php echo $pe1; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $pe1; ?>%">
  </div>
</div>
<center><span style="color: #555;" >na podstawie <span style="font-weight:700;"><?php echo $all; ?></span> ocen</span></center>
</div>
</div>

<div class="table-responsive">
   <table id="exa" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Komentarze</th>
            </tr>
        </thead>
        <tbody>
 <?php	$kk = $usRow['userName'];
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM comment WHERE komu='$kk' order by ID desc";
            $results = mysql_query($sql);
			
			
            while($raw = mysql_fetch_array($results)) {
			$gw = $raw['gwiazdki'];
			$ae = $raw['kto'];
			$pro=mysql_query("SELECT * FROM users WHERE userName='$ae'");
            $proRow=mysql_fetch_array($pro);
			$jpegg = 'logo/'.$proRow['profilehash'].'.jpeg';
$jpgg = 'logo/'.$proRow['profilehash'].'.jpg';
$giff = 'logo/'.$proRow['profilehash'].'.gif';
$pngg = 'logo/'.$proRow['profilehash'].'.png';
$bmpp = 'logo/'.$proRow['profilehash'].'.bmp';
if (file_exists($jpegg)) {
    $pathh = $jpegg;
} 
else if (file_exists($jpgg)) {
    $pathh = $jpgg;
}
else if (file_exists($giff)) {
    $pathh = $giff;
} 
else if (file_exists($pngg)) {
    $pathh = $pngg;
} 
else if (file_exists($bmpp)) {
    $pathh = $bmpp;
}  else {
    $pathh = "user.png";
}	

		mysql_query("SET NAMES utf8");
 $co=mysql_query("SELECT * FROM users WHERE userName='$ae'");
$coRow=mysql_fetch_array($co);
 $comine = $coRow['pracodawca'];
if (strpos($comine, '1') !== false) {
    $linka = 'profile?ran='.$coRow['profilehash'];
}
else {
$linka = 'usprofile?ran='.$coRow['profilehash'];
}

            ?>
                <tr>
<td>
						<div class="col-sm-3">
							<img src="<?php echo $pathh ?>" style="width:60px; height:60px;" class="img-rounded">
							<div class="review-block-name"><a href="<?php echo $linka ?>"><?php echo $raw['kto'] ?></a></div>
							<div class="review-block-date">Dodano:&nbsp;<?php echo $raw['dodano'] ?><br/>ID:&nbsp;<?php echo $raw['rand']; ?></div>
							<?php if($raw['nowy'] === "1" && $raw['komu'] === $userRow['userName'] ){ if($raw['komu'] === $userRow['userName']) { $rr = $userRow['userName']; $v = ("UPDATE comment SET nowy=0 WHERE komu='$rr'"); $vv = mysql_query($v); } ?><span style=" font-weight: 700; font-family: Raleway; color: #cc0000; ">Nowy komentarz</span><?php } ?>
						</div>
						<div class="col-sm-8">
							<div class="review-block-rate">
								<?php for($x = 1; $x<=$gw; $x++){ ?> <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button> <?php } ?>
								<?php for($x = $gw+1; $x<=5; $x++){ ?><button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button> <?php } ?>
								
							</div>
							<div class="review-block-title"><?php $mess = (preg_split('/[\s,]+/', $raw['tresc'], 3)); echo $mess[0]." ".$mess[1];?></div>
							<div class="review-block-description"><?php echo $raw['tresc'] ?></div>	
							<?php if(!empty($raw['odpowiedz'])){ ?><br><div class="review-block-description" style="" >[Odpowiedź z : <?php echo $raw['kiedy'] ?> ]&nbsp; <?php echo $raw['odpowiedz'] ?></div>	<?php } ?>
						</div>
						<?php if (strcmp($raw['kto'], $userRow['userName']) === 0) { ?><button value="<?php echo $raw['rand']; ?>,<?php echo $raw['gwiazdki']; ?>"  type="button" style="float:right; margin-top:10px;" class="delete btn btn-danger batton">Usuń komentarz</button><?php } ?>
						<?php if($odp === "true") { if(empty($raw['odpowiedz'])){  ?><button type="button" value="<?php echo $raw['rand']; ?>"  style="float:right; margin-top:10px;" id="odpowiedz" data-toggle="modal" data-target="#odp" class="btn btn-success batton">Dodaj odpowiedź</button><?php }} ?>
						
</td>              
  </tr>
            <?php

            }
            ?>
        </tbody>
    </table>
</div>
<script>
$(document).ready(function() {
var myCallback = function () { 
 };
    var oTable = $('#exa').DataTable( {
	"dom": '<?php echo $swoj;?>',
	"bSort" : false,
	"lengthMenu": [[5, 10, 20, 30, -1], [5, 10, 20,30,'Wszystko']],
	"order": [[ 0, "desc" ]],
		"language": {
    "processing":     "Przetwarzanie...",
    "search":         "Filtruj:",
    "lengthMenu":     "Pokaż _MENU_ komentarzy",
    "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "infoEmpty":      "Pozycji 0 z 0 dostępnych",
    "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "infoPostFix":    "",
    "loadingRecords": "Wczytywanie...",
    "zeroRecords":    "Nie znaleziono żadnych komentarzy!",
    "emptyTable":     "Nie dodano jeszcze żadnych komentarzy",
    "paginate": {
        "previous":   "Poprzednia",
        "next":       "Następna",
    },
    "aria": {
        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
    }
}

    } );
 $("div.toolbar").html('<button style="float: left;" data-toggle="modal" data-target="#dodaj" type="button" class="btn btn-success batton">Dodaj komentarz</button>');
oTable .columns(0) .search('^(?:<?php echo $com; ?>.)*$\r?\n?', true, false) .draw();
});</script>
	<div class="col-md-1">&nbsp;</div>
  </div>
   <div class="col-md-8 profile tab-pane" id="og"> 
   <div class="profile-userbuttons">
					<button type="button" id="oglo" class="btn btn-success btn-sm">Ogłoszenia</button>
					<button type="button" id="pomoc" class="marginowy btn btn-danger btn-sm">Pomoc sąsiedzka - ogłoszenia</button>
				</div><br>
<div id="bc" class="table-responsive">
   <table id="example" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Ogłoszenia</th>
            </tr>
        </thead>
        <tbody>
 <?php
			$kto = $usRow['userName'];
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM adv WHERE kto='$kto' order by ID desc";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			
            ?>
                <tr>
				<td><p style="float: left"><a href="<?php echo 'http://mrwork.pl/offer?ran='.$row['rand']; ?>"><?php echo $row['title'] ?></a><br><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $row['kto'] ?><br><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $row['cityOption'] ?></p><p style="margin: 0;"><div style="float: right"><?php echo $row['catOption'] ?></div><br>&nbsp;<span style="display:none;"><?php echo $row['jezyk']; echo "<br>"; echo $row['typ']; ?></span><br><div style="float: right">Dodano: <?php echo $row['data'] ?></div></p></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div><div id="qwerty" class="table-responsive">
   <table id="ex" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Pomoc sąsiedzka - ogłoszenia</th>
            </tr>
        </thead>
        <tbody>
 <?php
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM pomoc WHERE kto='$kto' order by ID desc";
            $results = mysql_query($sql);
			
			
            while($row = mysql_fetch_array($results)) {
 $a = $row['za'];
 if (strpos($a, '1') !== false) {
    $za = "godzinę";
}
else if (strpos($a, '2') !== false) {
    $za = "dzień";
}
else if (strpos($a, '3') !== false) {
    $za = "całość pracy";
}
			
            ?>
                <tr>
				<td><p style="float: left"><a href="<?php echo 'http://mrwork.pl/pomoffer?ran='.$row['rand']; ?>"><?php echo $row['title'] ?></a><br><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $row['kto'] ?><br><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $row['miejscowosc'] ?></p><p style="margin: 0;"><div style="float: right"><?php echo $row['stawka'] ?>zł za <?php echo $za ?></div><br>&nbsp;<br><div style="float: right">Dodano: <?php echo $row['dodane'] ?></div></p></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div><script>
$(document).ready(function() {
var myCallback = function () { 
 };
    var oTable = $('#example').DataTable( {
	"pagingType": "full_numbers",
	"bSort" : false,
	"lengthMenu": [[5, 10, 20, 30, -1], [5, 10, 20,30,'Wszystko']],
	"order": [[ 0, "desc" ]],
		"language": {
    "processing":     "Przetwarzanie...",
    "search":         "Filtruj:",
    "lengthMenu":     "Pokaż _MENU_ ogłoszeń",
    "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "infoEmpty":      "Pozycji 0 z 0 dostępnych",
    "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "infoPostFix":    "",
    "loadingRecords": "Wczytywanie...",
    "zeroRecords":    "Nie znaleziono żadnych ogłoszeń!",
    "emptyTable":     "Pracodawca nie dodał jeszcze żadnych ogłoszeń!",
    "paginate": {
        "first":      "Pierwsza",
        "previous":   "Poprzednia",
        "next":       "Następna",
        "last":       "Ostatnia"
    },
    "aria": {
        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
    }
}

    } ); 


});</script>
<script>
$(document).ready(function() {
var myCallback = function () { 
 };
    var oTable = $('#ex').DataTable( {
	"pagingType": "full_numbers",
	"bSort" : false,
	"lengthMenu": [[5, 10, 20, 30, -1], [5, 10, 20,30,'Wszystko']],
	"order": [[ 0, "desc" ]],
		"language": {
    "processing":     "Przetwarzanie...",
    "search":         "Filtruj:",
    "lengthMenu":     "Pokaż _MENU_ ogłoszeń",
    "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "infoEmpty":      "Pozycji 0 z 0 dostępnych",
    "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "infoPostFix":    "",
    "loadingRecords": "Wczytywanie...",
    "zeroRecords":    "Nie znaleziono żadnych ogłoszeń!",
    "emptyTable":     "Pracodawca nie dodał jeszcze żadnych ogłoszeń!",
    "paginate": {
        "first":      "Pierwsza",
        "previous":   "Poprzednia",
        "next":       "Następna",
        "last":       "Ostatnia"
    },
    "aria": {
        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
    }
}

    } );


});</script><script>$( document ).ready(function() {
   $("#qwerty").hide();
   $('#oglo').on('click', function(event) {
  event.preventDefault(); 
  $("#qwerty").hide();
  $("#bc").show();
});
$('#pomoc').on('click', function(event) {
  event.preventDefault(); 
  $("#qwerty").show();
  $("#bc").hide();
});
});</script>
    </div>
    <div class="clearfix visible-lg"></div>
	<?php if($odp === "false") { ?>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Zgłoś użytkownika</h4>
        </div>
        <div class="modal-body">
    <div class="form-group">
             <div id="good" style="display:none;" class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Dziękujemy za wysłanie zgłoszenia!
                </div>
             </div>
 <div class="form-group">
             <div id="bad" style="display:none;" class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Coś poszło nie tak, spróbuj jeszcze raz!
                </div>
				 <div id="pow" style="display:none;" class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wybierz powód zgłoszenia!
                </div>
             </div>
          <h4>Wybierz powód:</h4>
		  <input type="radio" name="report" value="1">&nbsp;Podszywanie się pod kogoś innego<br>
  <input type="radio" name="report" value="2">&nbsp;Użytkownik mnie obraża<br>
  <input type="radio" name="report" value="3">&nbsp;Nieprzyzwoita nazwa<br>
  <input type="radio" name="report" value="4">&nbsp;Nieprzyzwoity język<br>
  <input type="radio" name="report" value="5">&nbsp;Spam<br>
  <input type="radio" name="report" value="6">&nbsp;Oszustwo<br>
  <input type="radio" name="report" value="7">&nbsp;Inny<br>
  <div class="form-group">
      <label for="desc">Krótko uzasadnij zgłoszenie:</label>
<textarea style="width: 85%;" class="form-control"  rows="6" name="desc" id="desc" maxlength="500" ></textarea>
	  <div id="descNum" style="font-size: 12px;"></div>
    </div>
	<center><div class="g-recaptcha" style="margin-bottom: 5px; margin-top: 5px;" data-callback="recaptchaCallback" data-sitekey="6LfmhRQUAAAAAM2YStZNRsHBtuKuaTK7YSNd9mPn"></div></center>
	<span style="color: #555; font-size: 11px;">Zespół mrwork.pl codziennie dba o to ,aby użytkowanie serwisu było jak najbardziej przyjazne dla użytkowników.
	Interweniujemy gdy jakiś użytkownik łamie zasady użytkowania. Pamiętaj,że zgłoszenie musi być prawdziwe i poparte dowodami! </span>

	<script>$(document).ready(function() {
    var text_max = 500;
    $('#descNum').html("Pozostało: " + text_max + ' znaków.');

    $('#desc').keyup(function() {
        var text_length = $('#desc').val().length;
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
});</script>
        </div>
        <div class="modal-footer">
          <button id="send" name="send" type="button" disabled class="btn btn-primary">Wyślij</button>
        </div>
      </div>
      
    </div>
  </div>
  	<script>function recaptchaCallback() {
    $('#send').removeAttr('disabled');
}; </script>
  <script> $('#send').on('click', function(event) {
  event.preventDefault(); 
  if($("input:radio[name='report']").is(":checked")) {
  if (!$.trim($("#desc").val())) {
    $("#desc").addClass("area");
}
else {
$("#desc").removeClass("area");
var aaa = $('input[name=report]:checked').val();
var bbb = $("#desc").val();
var c = <?php echo json_encode($userRow['userName']); ?>;
var d = <?php echo json_encode($usRow['userName']); ?>;
$.ajax({
     url: 'report.php', 
     type: "POST",
     dataType:'json', 
     data: ({aaa: aaa, bbb: bbb, c: c, d: d}),
     success: function(data){
	 if (data == 'true') {
$('#bad').hide();
$('#pow').hide();
$('#good').show();
$('input[name="report"]').attr('checked',false); 
var content = "";
grecaptcha.reset();
$("#desc").val(content);
}
	 },
	 error: function () {
       $('#bad').show();
      }
});
}
  
  }
  else {$('#pow').show(); }
  
});</script><?php } ?>
  <div class="modal fade" id="map" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight:600;"> <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $as ?></h4>
        </div>
        <div class="modal-body">
         <center><iframe
  width="100%"
  height="450px;"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCLOxdH3Tp1V-nmmYRrELDr6TO9uG15sMc
    &q=<?php echo $as ?>" allowfullscreen>
</iframe></center>
		  
        </div>
      </div>
      
    </div>
  </div><?php if($odp === "false") {?>
  <div id="dodaj" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-comment" aria-hidden="true"></i>&nbsp;Dodaj komentarz - <?php echo $nazwa; ?></h4>
      </div>
      <div class="modal-body">
 <div class="form-group">
             <div id="bj" style="display:none;" class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Coś poszło nie tak, spróbuj jeszcze raz!
                </div>
</div>
 <div class="form-group">
				 <div id="empty" style="display:none;" class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wpisz komentarz!
                </div>
             </div>
                <center><span style=" font-size: 19px; font-weight: 700; ">Twoja ocena:</span><select id="example-fontawesome" name="rating" autocomplete="off">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
				<div class="form-group">
<textarea style="width: 85%;" class="form-control" placeholder="Treść komentarza" rows="6" name="kome" id="kome" maxlength="300" ></textarea>
	  <div id="komNum" style="font-size: 12px;"></div>
    </div>
	    <div id="ana" class="form-group">
      <label style="display:inline-block;" for="obli"><?php echo $math2; ?>=</label>   
<input style="display:inline-block; width:10%;" name="obli" id="obli" class="form-control" type="text" />
    </div>
	<br><span style="color: #555; font-size: 11px;">Dzięki Twojemu komentarzowi, inni użytkownicy będą wiedzieli więcej o potencjalnym pracodawcy. Pamiętaj ,żeby Twoja opinia była zgodna z zasadami netykiety oraz obiektywna! </span>
 <script>		
var Timer;                
var TI = 500; 
 
$('#obli').keyup(function(){
    clearTimeout(Timer);
    if ($('#obli').val) {
        Timer = setTimeout(function(){
		var cap2 = $('#obli').val();
			 
$.ajax({
     url: 'cap2.php', 
     type: "POST",
     dataType:'json', 
     data: ({cap2: cap2}),
     success: function(data){
	 if (data == 'true') {
$("#ana").addClass("has-success");
$("#ana").removeClass("has-error");
$('#add').prop('disabled', false);
}
else if(data == 'false') {
$("#ana").removeClass("has-success");
$("#ana").addClass("has-error");
$("#add").prop("disabled", true );
}
	 },
	 error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!"); 
      }
});
        }, TI);
    }
});
</script>
	 </div>
      <div class="modal-footer">
         <button id="add" name="add" type="button" class="btn btn-success" disabled>Dodaj</button>
	<script>$(document).ready(function() {
    var text_max = 300;
    $('#komNum').html("Pozostało: " + text_max + ' znaków.');

    $('#kome').keyup(function() {
        var text_length = $('#kome').val().length;
        var text_remaining = text_max - text_length;
if (text_remaining > 4 || text_remaining == 0){
$('#komNum').html("Pozostało: " + text_remaining + ' znaków.');
}
else if (text_remaining < 5  || text_remaining > 1){
$('#komNum').html("Pozostały: " + text_remaining + ' znaki.');
}
if (text_remaining == 1){
$('#komNum').html("Pozostał: " + text_remaining + ' znak.');
}
if (text_remaining <= 10){
$('#komNum').css('color', 'red');
}
else if (text_remaining >= 10){
$('#komNum').css('color', 'black');
}

    });
});</script>
<script>$('#add').on('click', function(event) { 
 var z = $('#example-fontawesome').val();
 var w = $('#kome').val();
 var y = <?php echo json_encode($userRow['userName']); ?>;
 var v = <?php echo json_encode($usRow['userName']); ?>;
 var x = <?php echo json_encode(generateRandomString()); ?>;
 if (!$.trim($("#kome").val())) {
    $("#kome").addClass("area");
	 $('#empty').show();
}
else {
$.ajax({
     url: 'comment.php', 
     type: "POST",
     dataType:'json', 
     data: ({z: z, w: w, y: y, v: v,x: x}),
     success: function(data){
	 if (data == 'true') {
$('#bj').hide();
$('#empty').hide();
 $("#kome").removeClass("area");
var content = "";
grecaptcha.reset();
$("#kome").val(content);
location.reload();
sessionStorage.reloadAfterPageLoad = true;
}
	 },
	 error: function () {
       $('#bj').show();
      }
});
}
 });</script>
 <script>$(document).ready(function(){ 
if ( sessionStorage.reloadAfterPageLoad ) {
        $('#bravo').show();
        sessionStorage.reloadAfterPageLoad = false;
    }
 });</script>
      </div>
    </div>
  </div></div><?php } ?></div>
  <?php if($odp === "true") { ?>
  <div id="odp" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dodaj odpowiedź</h4>
      </div>
      <div class="modal-body">
 <div class="form-group">
             <div id="niedod" style="display:none;" class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Coś poszło nie tak, spróbuj jeszcze raz!
                </div>
</div>
 <div class="form-group">
				 <div id="pusta" style="display:none;" class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wpisz treść odpowiedzi!
                </div>
             </div>
                <center>
				<div class="form-group">
<textarea style="width: 85%;" class="form-control" placeholder="Treść odpowiedzi" rows="6" name="odpo" id="odpo" maxlength="300" ></textarea>
	  <div id="odpNum" style="font-size: 12px;"></div>
    </div>
	<span style="color: #555; font-size: 11px;">Pamiętaj ,żeby Twoja odpowiedź była kulturalna oraz obiektywna! </span>
      </div>
      <div class="modal-footer">
        <button id="opp" name="opp" type="button" class="btn btn-success">Dodaj</button>
      </div>
    </div>

  </div>
</div>
<script>$('#odp').on('show.bs.modal', function (e) {
  var button = e.relatedTarget;
    if (button != null)
    {
        window.p = button.value;
    }
});</script>
<script>$(document).ready(function() {
    var text_max = 300;
    $('#odpNum').html("Pozostało: " + text_max + ' znaków.');

    $('#odpo').keyup(function() {
        var text_length = $('#odpo').val().length;
        var text_remaining = text_max - text_length;
if (text_remaining > 4 || text_remaining == 0){
$('#odpNum').html("Pozostało: " + text_remaining + ' znaków.');
}
else if (text_remaining < 5  || text_remaining > 1){
$('#odpNum').html("Pozostały: " + text_remaining + ' znaki.');
}
if (text_remaining == 1){
$('#odpNum').html("Pozostał: " + text_remaining + ' znak.');
}
if (text_remaining <= 10){
$('#odpNum').css('color', 'red');
}
else if (text_remaining >= 10){
$('#odpNum').css('color', 'black');
}

    });
});</script>
<script>$('#opp').on('click', function(event) { 
 var o = $('#odpo').val();
 var p = window.p;
 if (!$.trim($("#odpo").val())) {
    $("#odpo").addClass("area");
	 $('#pusta').show();
}
else {
$.ajax({
     url: 'odp.php', 
     type: "POST",
     dataType:'json', 
     data: ({o: o, p: p}),
     success: function(data){
	 if (data == 'true') {
$('#niedodano').hide();
$('#pusta').hide();
 $("#odpo").removeClass("area");
var content = "";
$("#odpo").val(content);
location.reload();
sessionStorage.reloadAfter = true;
}
	 },
	 error: function () {
       $('#niedodano').show();
      }
});
}
 });</script><?php }?>
  <script>$(document).ready(function(){ 
if ( sessionStorage.reloadAfter ) {
        $('#thx').show();
        sessionStorage.reloadAfter = false;
    }
 });</script>
 <?php if (strcmp($var1, $nazwa) !== 0) { ?>
 <script>$('.delete').on('click', function(event) { 
var eh = $(this).attr("value");
var values = eh.split(',');
var id = values[0];
var ocena = values[1];
 var kto = <?php echo json_encode($usRow['userName']); ?>;
if(confirm("Czy na pewno chcesz usunąć swój komentarz?")) { 
$.ajax({
     url: 'del.php', 
     type: "POST",
     dataType:'json', 
     data: ({id: id,ocena: ocena, kto: kto}),
     success: function(data){
	 if (data == 'true') {
if (!alert('Komentarz został usunięty')) {
          location.reload();  
 }
}
	 },
	 error: function () {
       alert("Coś poszło nie tak, spróbuj jeszcze raz!");
      }
});
}
 });</script><?php } ?>
 <?php if (strcmp($var1, $nazwa) !== 0) { ?>
 <script> $('#block').on('click', function(event) {
  event.preventDefault(); 
var r = confirm("Czy na pewno chcesz zablokować użytkownika?\nCzarną listę możesz znaleźć w ustawieniach.");
if (r == true) { 
var kogo = <?php echo json_encode($usRow['userName']); ?>;
var kto = <?php echo json_encode($userRow['userName']); ?>;
$.ajax({
     url: 'block.php', 
     type: "POST",
     dataType:'json', 
     data: ({kogo: kogo, kto: kto}),
     success: function(data){
	 if (data == 'true') {
if (!alert('Użytkownik został zablokowany!')) {
          window.location.href = 'home.php';  
 }
}
	 },
	 error: function () {
       alert("Coś poszło nie tak, spróbuj jeszcze raz!");
      }
});
 }
  });</script><?php } ?>
  <?php if (strcmp($var1, $nazwa) !== 0) { ?>
 <div id="mess" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Wyślij wiadomość do <?php echo $nazwa; ?></h4>
      </div>
      <div class="modal-body"> 
	      <div class="form-group">
             <div id="wiadpo" style="display:none;" class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wiadomość została wysłana!
                </div>
             </div>
			  <div class="form-group">
             <div id="mnie" style="display:none;" class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wiadomość nie została wysłana - użytkownik ,do którego chcesz wysłać wiadomość,zablokował Cię!
                </div>
</div>
 <div class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="do">Do:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="do" readonly value="<?php echo $nazwa; ?>">
      </div>
    </div>
    <div id="th" class="form-group">
      <label class="control-label col-sm-2" for="thema">Temat:</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" id="thema" placeholder="Temat wiadomości">
		<p id="temacik" style="display:none; color: #a94442; font-size: 14px; margin-top: 5px; font-family: Muli; ">Wpisz temat wiadomości</p>
      </div>
    </div>
	<div id="wia" class="form-group">
      <label class="control-label col-sm-2" for="wiad">Wiadomość:</label>
	  <div class="col-sm-8">     
<textarea  class="form-control"  rows="6"  id="wiad" placeholder="Twoja wiadomość"></textarea>
<p id="tre" style="display:none; color: #a94442; font-size: 14px; margin-top: 5px; font-family: Muli; ">Wpisz treść wiadomości</p></div>
    </div>	
	<div id="an" class="form-group">
      <label class="control-label col-sm-2" for="wiad"><?php echo $math; ?>=</label>
	  <div class="col-sm-2">     
<input name="answer" id="answer" class="form-control" type="text" />
    </div></div>
    </div>
      </div>
      <div class="modal-footer">
        <button id="sendd" name="sendd" type="button"  class="btn btn-primary" disabled>Wyślij</button>
      </div>
    </div>
<script>		
var typingTimer;                
var doneTypingInterval = 500; 
 
$('#answer').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#answer').val) {
        typingTimer = setTimeout(function(){
		var cap = $('#answer').val();
			 
$.ajax({
     url: 'cap.php', 
     type: "POST",
     dataType:'json', 
     data: ({cap: cap}),
     success: function(data){
	 if (data == 'true') {
$("#an").addClass("has-success");
$("#an").removeClass("has-error");
$('#sendd').prop('disabled', false);
}
else if(data == 'false') {
$("#an").removeClass("has-success");
$("#an").addClass("has-error");
$("#sendd").prop("disabled", true );
}
	 },
	 error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!"); 
      }
});
        }, doneTypingInterval);
    }
});
   
</script>
<script>
function listCookies() {
    var theCookies = document.cookie.split(';');
    var aString = '';
    for (var i = 1 ; i <= theCookies.length; i++) {
        aString += i + ' ' + theCookies[i-1] + "\n";
    }
    return aString;
}
var q = listCookies();
var res = q.split("\n");
var len = res.length;
var temp = "0";
for(x=0;x<len;x++) {
var string = res[x],
    substring = "draft";
if(string.indexOf(substring) !== -1) {
var rest = string.split("=");
var piersz = rest[0];
var dalej = piersz.split("  ");
var porzadkowa = dalej[0];
var draft = dalej[1];
draft = draft.replace("draft", "");
console.log(draft);
var temp = 0;
if(draft > temp){
temp = draft;
}
}
}
temp = parseInt(temp,10);
temp = temp + 1;
temp = temp.toString(); 
var cookie = "draft";
var nazwa = cookie+temp;

function functionToRun(e){
        var confirmationMessage = 'It looks like you have been editing something. '
                            + 'If you leave before saving, your changes will be lost.';

    (e || window.event).returnValue = confirmationMessage; 
    return confirmationMessage; 
}
$("#wiad").keyup(function(){
var x = $("#wiad").val().length;
var odb = $("#do").val();
var temat = $("#thema").val();
var tresc = $("#wiad").val();
var value = odb+","+temat+","+tresc;
if(x > 0) {
createCookie(nazwa,value,7);
window.addEventListener("beforeunload", functionToRun);
}
else if(x === 0) {
window.removeEventListener("beforeunload",functionToRun);
eraseCookie(nazwa);
}

});
function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}
function eraseCookie(name) {
    createCookie(name,"",-1);
}

$('#sendd').on('click', function(event) { 
event.preventDefault(); 
window.removeEventListener("beforeunload",functionToRun);
var doo = $('#do').val();
var thema = $('#thema').val();
var wiad = $('#wiad').val();
var nadawca = <?php echo json_encode($userRow['userName']); ?>;
if(thema === "") {
$("#th").addClass("has-error");
$("#temacik").show();
}
else {
$("#th").removeClass("has-error");
$("#th").addClass("has-success");
$("#temacik").hide();
}
if(wiad === "") {
$("#wia").addClass("has-error");
$("#tre").show();
}
else {
$("#wia").removeClass("has-error");
$("#wia").addClass("has-success");
$("#tre").hide();
}
 if(doo && thema && wiad) {
$("#tre").hide();
$("#temacik").hide();
$("#th").removeClass("has-error");
$("#wia").removeClass("has-error");
$.ajax({
     url: 'send.php', 
     type: "POST",
     dataType:'json', 
     data: ({doo: doo,thema: thema, wiad: wiad,nadawca: nadawca}),
     success: function(data){
	 if (data == 'true') {
	 eraseCookie(nazwa);
	    if(window.location.hash) {
  location.reload();
} 
else {
window.location.href += "#good";
location.reload();
}
}
else if(data == 'mnie') {
$("#mnie").show();
}
else if(data == 'ja') {
alert("Nie można wysłać wiadomości do użytkownika, który jest na czarnej liście!");
}
	 },
	 error: function () {
       alert("Coś poszło nie tak, spróbuj jeszcze raz!");
      }
});
}
});

</script>
  </div>
</div><?php } ?>
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

				<p>&copy; mrwork.pl - Wszelkie prawa zastrzeżone.</p><a style="font-size:14px; color:#999;" href="http://j.mp/metronictheme">Sidebar by <span style="color:#337ab7;">KeenThemes</span></a>
				<br><p style="font-size:14px; color:#999;">User icon made by <a title="Madebyoliver" href="http://www.flaticon.com/authors/madebyoliver">Madebyoliver</a> from <a title="Flaticon" href="http://www.flaticon.com">www.flaticon.com</a></p>
			</div>

		</footer></div></div>
		<script type="text/javascript">
   $(function() {
      $('#example-fontawesome').barrating({
        theme: 'fontawesome-stars'
      });
   });
</script>
		<script src="http://antenna.io/demo/jquery-bar-rating/jquery.barrating.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>