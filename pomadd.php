<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 
 // if session is not set this will redirect to login page
  if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=pomadd");
  exit;
 }
 $er = "false";
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $end = $_SESSION["end"];
 unset($_SESSION['end']);
 mysql_query("SET NAMES utf8");
 $mailhash = $userRow['userName']; 
  $string = $userRow['pracodawca']; 
   $mine = $userRow['pracodawca'];
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
}
$findme   = '0';
$pos = strpos($string, $findme);
 if ($pos === false) {
    $pra=mysql_query("SELECT * FROM pradet WHERE name='$mailhash'");
    $praRow=mysql_fetch_array($pra);
	$miasto = $praRow['miejscowosc'];
	$miej = $praRow['miejscowosc'];
	$tel = $praRow['telefon'];
	$op = $praRow['opis'];
	$ad = $praRow['adres'];
	if (empty($miej) || empty($tel) || empty($op) || empty($ad)) {
    $errStyle = "alert-info";
	$errMSG = "Aby móc dodawać ogłoszenia, uzupełnij wymagane pola w <a style='font-weight:700;' href='setuser'>ustawieniach konta</a> ";
	$er = "true";
}
}
else {
$uz=mysql_query("SELECT * FROM userdet WHERE name='$mailhash'");
$uzRow=mysql_fetch_array($uz);
$miasto = $uzRow['miejscowosc'];
$mie = $uzRow['miejscowosc'];
$im = $uzRow['imie'];
$tel = $uzRow['telefon'];
$op = $uzRow['opis'];
   if (empty($mie) || empty($im) || empty($op)) {
    $errStyle = "alert-info";
	$errMSG = "Aby dodać ogłoszenie, uzupełnij wymagane pola <a  style='font-weight:700;'href='setuser'>ustawieniach konta</a> ";
	$er = "true";
}
else if (empty($tel)) {
$errStyle = "alert-info";
	$errMSG = "Aby dodać ogłoszenie, wpisz numer telefonu w <a style='font-weight:700;' href='setuser'>ustawieniach konta</a> ";
	$er = "true";
}
}
	$error = false;
	 $uz=mysql_query("SELECT * FROM userdet WHERE name='$mailhash'");
$uzRow=mysql_fetch_array($uz); 
	if( isset($_POST['btn-login']) ) { 
	$title = trim($_POST['title']);
	$title = strip_tags($title);
	$title = htmlspecialchars($title);
	
	$desc = trim($_POST['desc']);
	$desc = strip_tags($desc);
	$desc = htmlspecialchars($desc);
	
	$data= trim($_POST['data']);
	$data = strip_tags($data);
	$data = htmlspecialchars($data);
	$date = date('Y-m-d', strtotime($data));
	
	$miasto= trim($_POST['miasto']);
	$miasto = strip_tags($miasto);
	$miasto = htmlspecialchars($miasto);
	$place = str_replace(', Polska', '', $miasto);
	
	$dod= trim($_POST['dod']);
	$dod = strip_tags($dod);
	$dod = htmlspecialchars($dod);
	
	$ilosc = $_POST['stawka'];
	$za = $_POST['czas'];
	
	if (empty($title)) {
   $error = true;
   $titleError = "Wpisz tytuł!";
  }  
   else if (strlen($title) < 3) {
   $error = true;
   $titleError = "Tytuł musi zawierać przynajmniej 3 znaki.";
}
  if (empty($desc)) {
   $error = true;
   $descError = "Wpisz opis!";
  }
     else if (strlen($desc) < 3) {
   $error = true;
   $descError = "Opis musi zawierać przynajmniej 3 znaki.";
   }
   if($za === "czas") {
   $error = true;
   $timeError = "Okreś za jaki okres jest wynagrodzenie";
   }

if( !$error ){
mysql_query("SET NAMES utf8");
$kto = $userRow['userName'];
$dodane = date("Y-m-d");
$rand = substr(md5(microtime()),rand(0,26),10);
$linkacz = 'http://mrwork.pl/pomoffer?ran=';
$q = "select MAX(ID) from pomoc";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
$I = $data[0];
$ID = $I+1;
$title = mysql_real_escape_string($title);
$place = mysql_real_escape_string($place);
$ilosc = mysql_real_escape_string($ilosc);
$za = mysql_real_escape_string($za);
$dod = mysql_real_escape_string($dod);
$desc = mysql_real_escape_string($desc);
$zero = "0";
$query = "INSERT INTO pomoc(ID,kto,title,dodane,data,miejscowosc,stawka,za,dodatkowe,opis,rand,wyr) VALUES('$ID','$kto','$title','$dodane','$date','$place','$ilosc','$za','$dod','$desc','$rand','$zero')";
$res = mysql_query($query);
   
   if ($res) {
    unset($title);
	unset($dod);
	unset($desc);
	unset($data);
    $errMSG = "Dziękujemy! <a href=".$linkacz.$rand.">Ogłoszenie</a> zostało dodane!"; 
	$errStyle = "alert-success";
	
   } else {
    $errTyp = "danger";
    $errMSG = "Coś poszło nie tak, spróbuj ponownie!"; 
	$errStyle = "alert-danger";
   } 
}


	}
  $nazwa = $userRow['userName'];
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
 $pr = "SELECT name from premium where name='$nazwa'";
$pre = mysql_query($pr);

if(mysql_num_rows($pre) === 0)
{
$unpr = "SELECT rand from pomoc where kto='$nazwa'";
$unpre = mysql_query($unpr);

if(mysql_num_rows($unpre) === 2)
{
$er = "true";
$errStyle2 = "alert-info";
$errMSG2 = "Osiągnąłeś limit 2 ogłoszeń w darmowej wersji konta. Aby dodać kolejne ogłoszenie <a style='font-weight:700;' href='premium'>kup konto Premium</a> ";
}
}
else if(mysql_num_rows($pre) > 0)
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
 $old = mysql_query("SELECT * FROM `comment` WHERE komu='$nazwa' and nowy=1");
$new = mysql_num_rows($old);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Dodaj ogłoszenie</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="assets/js/bootstrap-datetimepicker.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="assets/js/bootstrap-material-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/js/material.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap-material-datetimepicker.css" />
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCM_QyIy1IwRbKBZ5_me2e_wq5ry_fHZAI&libraries=places"></script>
<style>
@media (max-width:600px) {
.input-group {
width:100%;
}
#desc {
width:100%;
}
}
</style>
</head>
<body>
<nav class="navbar naw navbar-default">
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
            <li><a href="pommine">Moje ogłoszenia</a></li>
			<li><a href="mess">Wiadomości&nbsp;<span <?php if($nieod>0) {?>style="font-weight:bold; color:#d2201d;"<?php } ?>>(<?php echo $nieod; ?>)</span></a></li>
			<li style="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "display:block;";
} else if (strpos($string, '1') == false) {  echo "display:none;";} ?>"><a href="<?php echo $linek; ?>">Nowe komentarze&nbsp;<span <?php if($new>0) {?>style="font-weight:bold; color:#d2201d;"<?php } ?>>(<?php echo $new; ?>)</span></a></li>
            <li><a href="setuser">Ustawienia konta</a></li>
            <li><a href="logout?logout">Wyloguj</a></li>
          </ul>
        </li>
		<li style="color:#fff; background-color:#0271b3;"><a href="pomhome"><i class="fa fa-life-ring" aria-hidden="true"></i>&nbsp;Pomoc sąsiedzka</a></li>  
      </ul>
    </div>
  <script>$('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});</script>
</nav>

<div class="container-fluid">
  <?php if($end === "true") { ?><div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Uwaga!</strong> Ważność Twojego konta Premium wygasła! Aby wykupić dostęp ponownie kliknij <a style="font-weight:700; color:#BB4D55" href="kup">tutaj</a>.<br><strong>Dziękujemy za wsparcie serwisu mrwork.pl</strong>
</div><?php } ?>
<center><div class="container">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-6 col-md-offset-3">
        
         <div class="form-group">
             <h1 class="">Dodaj ogłoszenie!</h1>
            </div>
                <?php
   if ( isset($errMSG2) ) {
    
    ?>
    <div class="form-group">
             <div class="alert <?php echo $errStyle2; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG2; ?>
                </div>
             </div>
                <?php
   }
   ?>       
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
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-header fa-fw"></i></span>
             <input type="text" name="title" id="title" class="form-control" placeholder="Tytuł" value="<?php echo $title; ?>" maxlength="80" />
                </div>
				<span class="text-danger"><?php echo $titleError; ?></span>
				<div id="charNum" style="font-size: 12px;"></div>     
            </div>
            <script>$(document).ready(function() {
    var text_max = 80;
    $('#charNum').html("Pozostało: " + text_max + ' znaków.');

    $('#title').keyup(function() {
        var text_length = $('#title').val().length;
        var text_remaining = text_max - text_length;
if (text_remaining > 4 || text_remaining == 0){
$('#charNum').html("Pozostało: " + text_remaining + ' znaków.');
}
else if (text_remaining < 5  || text_remaining > 1){
$('#charNum').html("Pozostały: " + text_remaining + ' znaki.');
}
if (text_remaining == 1){
$('#charNum').html("Pozostał: " + text_remaining + ' znak.');
}
if (text_remaining <= 10){
$('#charNum').css('color', 'red');
}
else if (text_remaining >= 10){
$('#charNum').css('color', 'black');
}
    });
});</script>
            
			<div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <span class="input-group-addon">
                        <i class="fa fa-calendar fa-fw"></i>
                    </span> <input placeholder="Kiedy?" type='text' id="data" name="data" class="form-control" value="<?php echo $data; ?>" /> 
                </div>
				<span class="text-danger"><?php echo $dataError; ?></span>
            </div>
						
			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
            <input type="text" name="miasto" id="miasto" value="<?php echo $miasto; ?>" class="form-control" placeholder="Miejscowość" readonly="readonly"><span class="input-group-addon"><label class="checkbox-inline"><input type="checkbox" id="chan">Zmień</label></span>
                </div>
                <span class="text-danger"><?php echo $miastoError; ?></span>
            </div>
		<div class="form-group">
		<div class="input-group">
   <span class="input-group-addon"><i class="fa fa-dollar fa-fw"></i></span><input placeholder="Stawka" id="stawka" name="stawka" type="number" maxlength="30" class="form-control" value="<?php echo $ilosc; ?>" /> <span class="input-group-addon">zł</span>
  <span class="input-group-btn" style="width:2px;"></span>
 <select id="czas" name="czas" class="form-control selectpicker" >
      <option value="czas" >Stawka za</option>
	  <option value="1">Godzinę</option>
	  <option value="2">Dzień</option>
	  <option value="3">Wykonaną pracę</option>
	  </select>
</div>
<span class="text-danger"><?php echo $timeError; ?></span>
		</div>	
			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-star fa-fw"></i></span>
             <input type="text" name="dod" id="dod" class="form-control" placeholder="Dodatkowe wymagania" value="<?php echo $dod; ?>" />
                </div>
                <span class="text-danger"><?php echo $dodError; ?></span>
            </div>
		<script>$('#chan').change(function(){ 
		if ($('#chan').is(":checked")) {
            $('#miasto').attr('readonly',false);
}	
	else {
	$('#miasto').attr('readonly',true);
	}
 });</script>	 
<script>function autocompleteLoad() {
    var input = document.getElementById('miasto');
    var countryRestrict = { 'country': 'pl' }; 
    var options = {
        types: ['(cities)'], 
        componentRestrictions: countryRestrict
    };
    // documentation: developers.google.com/maps/documentation/javascript/reference#Autocomplete
    var autocomplete = new google.maps.places.Autocomplete(input, options);
}

google.maps.event.addDomListener(window, 'load', autocompleteLoad);</script>
		
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                 format: 'YYYY-MM-DD',
				 locale: 'pl'
           });
            });
        </script>

			
		
		<div class="form-group">
      <label for="desc">Opis:</label>
<textarea style="width: 85%;" class="form-control"  rows="6" name="desc" id="desc" placeholder="Opis" maxlength="500" data-toggle="tooltip" data-placement="right" title="Uwaga! Chrome ma problem z rozpoznawaniem enterów. Przy użyciu entera liczba pozostałych znaków może się różnić od prawdziwej! "></textarea>
	  <span class="text-danger"><?php echo $descError; ?></span>
	  <div id="descNum" style="font-size: 12px;"></div>
    </div>	
	<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
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
		   <div class="form-group" style="margin-top: 10px;">
		   		   <button type="button" style="margin-top: -10px;" id="podg" class="btn btn-link" <?php  if($er === "true") { echo "disabled"; }?>>Zobacz pogląd</button>
            <?php if($er === "false") { ?> <button type="submit" class="btn btn-block btn-primary" name="btn-login">Dodaj</button><?php }?>
            </div>
				
        
        </div>
   
    </form>
    </div> 
 <script type="text/javascript">
function popup(url) 
{
 params  = 'width='+screen.width;
 params += ', height='+screen.height;
 params += ', top=0, left=0'
 params += ', fullscreen=yes';

 newwin=window.open(url,'windowname4', params);
 if (window.focus) {newwin.focus()}
 return false;
}
</script>          
	<script>$('#podg').click(function()
{
var aa =  "good";
var bb =  $("#title").val();
var cc =  $("#data").val();
var dd =  $("#miasto").val();
var ee =  $("#stawka").val();
var ff =  $("#czas").val();
var gg =  $("#dod").val();
var hh =  $("#desc").val();
		$.ajax({
     url: 'pomaddajax.php', //This is the current doc
     type: "POST",
     dataType:'json', // add json datatype to get json
     data: ({aa: aa, bb: bb, cc: cc, dd: dd, ee: ee, ff: ff, gg: gg, hh: hh }),
     success: function(data){
	 if (data == 'true') {
popup('pomview.php')
}
	 },
	 error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!"); 
      }
});
})</script>	
</div>
		</div>
    
</body>
</html>
<?php ob_end_flush(); ?>