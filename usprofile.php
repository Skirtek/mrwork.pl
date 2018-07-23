<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
  $digit1 = mt_rand(1,20);
    $digit2 = mt_rand(1,20);
    if( mt_rand(0,1) === 1 ) {
            $math = "$digit1 + $digit2";
            $_SESSION['answer'] = $digit1 + $digit2;
    } else {
            $math = "$digit1 - $digit2";
            $_SESSION['answer'] = $digit1 - $digit2;
    }
 $abc = $_GET['ran'];
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=usprofile?ran=$abc");
  exit;
 }
  $po = "SELECT userId from users where profilehash='$abc'";
$pp = mysql_query($po);

if(mysql_num_rows($pp) === 0)
{
    header("Location:404");
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
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
}
 $us=mysql_query("SELECT * FROM users WHERE profilehash='$rest'");
$usRow=mysql_fetch_array($us);
$cking = $usRow['pracodawca'];
if($cking === "1") {
header("Location: profile?ran=$rest");
}
$nazwa = $usRow['userName'];
$var1 = $userRow['userName'];
 $pra=mysql_query("SELECT * FROM userdet WHERE name='$nazwa'");
$praRow=mysql_fetch_array($pra);
$op = $praRow['opis'];
$as = $praRow['imie'];
$temp = $praRow['plec'];
if($temp === "1") {
$plec = "mężczyzna";
}
else {
$plec = "kobieta";
}
$temporary = $praRow['szkola'];
if($temporary === "0") {
$sz = true;
}
else if($temporary === "1") {
$szkola = "gimnazjum";
}
else if($temporary === "2") {
$szkola = "liceum";
}
else if($temporary === "3") {
$szkola = "technikum";
}
else if($temporary === "4") {
$szkola = "zawodowa";
}
else if($temporary === "5") {
$sz = true;
}

$jpeg = 'avatar/'.$usRow['profilehash'].'.jpeg';
$jpg = 'avatar/'.$usRow['profilehash'].'.jpg';
$gif = 'avatar/'.$usRow['profilehash'].'.gif';
$png = 'avatar/'.$usRow['profilehash'].'.png';
$bmp = 'avatar/'.$usRow['profilehash'].'.bmp';

if(isset($_POST['upload']) ) {
if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {  
    $errMSG = "Wybierz plik z avatarem!";
    $errStyle = "alert-danger";
}
else {
$filename  = basename($_FILES['fileToUpload']['name']);
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$new       = $userRow['profilehash'].".".$extension;
$uploadOk = 1;
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
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "avatar/{$new}")) {   
    $errMSG = "Avatar został zmieniony!";
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
$kto = $usRow['userName'];
$str = $praRow['strona'];
$blocked = $userRow['userName'];
$bl=mysql_query("SELECT * FROM blocked WHERE kto='$blocked'");
$blRow=mysql_fetch_array($bl);
$who = $blRow['kogo'];
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
			$nam = $usRow['userName'];
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
.zglaszacz {
float:right;
}
@media (max-width:600px) {
.zglaszacz {
float:none;
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
						<?php echo $nazwa; ?>
					</div>	<?php if (strcmp($var1, $nazwa) == 0) { ?>
<button style="<?php echo $odp; ?>" type="button" name="showman" id="showman" class="btn btn-primary btn-sm"><b style="font-family: Raleway;" >Zmień avatar</b></button>
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
					<button type="button" id="block" class="btn btn-danger btn-sm">Zablokuj</button>
				</div><?php } ?>
				<?php if($premium === "true") {?><div style="margin-top:5px; margin-bottom:-10px;"><p style="text-align:center;color: #058547;font-size: 20px;font-weight: 700;font-family: Muli;"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Użytkownik Premium</p></div><?php } ?></li>
        <li style="padding-top:5px;" class="active"><a data-toggle="tab" href="#pod">Podstawowe informacje</a></li>
		<li><a data-toggle="tab" href="#og">Ogłoszenia</a></li>
      </ul>
    </div>
	<div class="col-md-1" style="width:1%;"> 
    &nbsp;
    </div>
	<div class="tab-content">
    <div class="col-md-8 profile tab-pane fade in active" id="pod"><div style="width:100%;"> <p style="font-size:20px; margin:0; color:#396988;"><b>Coś o mnie:</b></p>
	<p style=" margin:0;"><?php echo $op; ?></p>
	<?php if (!empty($praRow['zai'])) {   ?>
	<p style="font-size:20px; margin:0; color:#396988;"><b>Interesuję się:</b></p>
	<p style=" margin:0;"><?php echo $praRow['zai']; ?></p><?php } ?>
	<p style="font-size:20px;"><span style="color:#396988;"><b>Ja:</b> </span><br><b style="font-size:14px;">Imię:&nbsp;</b><span style="font-size:14px;"><?php echo $as; ?></span>
	<br><b style="font-size:14px;">Płeć:&nbsp;</b><span style="font-size:14px;"><?php echo $plec; ?></span>
	<?php if($sz != true) { ?><br><b style="font-size:14px;">Szkoła:&nbsp;</b><span style="font-size:14px;"><?php echo $szkola; ?></span><?php } ?>
	<br><b style="font-size:14px;">Miejscowość:&nbsp;</b><span style="font-size:14px;"><?php echo $praRow['miejscowosc']; ?></span>
	<?php if (!empty($praRow['telefon'])) {   ?>
	<br><b style="font-size:14px;">Telefon:&nbsp;</b><span style="font-size:14px;"><?php echo $praRow['telefon']; ?></span><?php } ?>
 </p><?php if (!empty($str)) {   ?>
	<div class="dd"><span style="<?php echo $o; ?> font-size: 20px; color:#396988; "><b>Odwiedź mnie:</b> </span>
	<?php if (strpos($str, 'facebook') == false && strpos($str, 'github') == false) {   ?>
	<a href="<?php echo $praRow['strona']; ?>"><i class="fa fa-globe" aria-hidden="true"></i></a><?php } ?>
	<?php if (strpos($str, 'facebook') !== false) {   ?>
	<a href="<?php echo $praRow['strona']; ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a><?php } ?>
	<?php if (strpos($str, 'github') !== false) {   ?>
	<a href="<?php echo $praRow['strona']; ?>"><i class="fa fa-github" aria-hidden="true"></i></a><?php } ?>
	
	</div><?php } ?><br>
	<div class="profile-userbuttons" style="width:100%;" >
										<?php if(strcmp($kto, $userRow['userName']) !== 0){ ?><button type="button" class="zglaszacz btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><b>Zgłoś użytkownika</b></button><?php }?>
									</div>
</div>
    </div>
   <div class="col-md-8 profile tab-pane" id="og"> 
<div class="table-responsive">
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
</div>
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
    "emptyTable":     "Użytkownik nie dodał jeszcze żadnych ogłoszeń!",
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
    </div>
    <div class="clearfix visible-lg"></div>
	<?php if (strcmp($var1, $nazwa) !== 0) { ?>
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
  
});</script>
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
  });</script><?php }?>
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

				<p>&copy; mrwork.pl - Wszelkie prawa zastrzeżone.</p><a style="font-size:14px; color:#999;" href="http://j.mp/metronictheme">Sidebar by <span style="color:#337ab7;">KeenThemes</span></a>
				<br><p style="font-size:14px; color:#999;">User icon made by <a title="Madebyoliver" href="http://www.flaticon.com/authors/madebyoliver">Madebyoliver</a> from <a title="Flaticon" href="http://www.flaticon.com">www.flaticon.com</a></p>
			</div>

		</footer></div></div>
</body>
</html>
<?php ob_end_flush(); ?>