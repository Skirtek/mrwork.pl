<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
   $abc = $_SERVER['QUERY_STRING'];
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=detail?$abc");
  exit;
 }

   $bol = "0";
    mysql_query("SET NAMES utf8");
   $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $end = $_SESSION["end"];
 unset($_SESSION['end']);
  $nazwa = $userRow['userName'];
    $exi = "SELECT ID from mess where rand='$abc'";
$ex = mysql_query($exi);

if(mysql_num_rows($ex) === 0)
{
    header("Location:404");
}
  $prof = "SELECT ID from mess WHERE (od = '$nazwa' and rand = '$abc') OR (do = '$nazwa' and rand = '$abc')";
$pro = mysql_query($prof);

if(mysql_num_rows($pro) === 0)
{
    header("Location:404");
}
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
if(empty($tego)) {
 header("Location: 404");
}
$ten = mysql_query("SELECT * FROM `mess` WHERE rand='$tego'");
 $tenRow=mysql_fetch_array($ten);
 $kto = $tenRow['od'];
 $us = mysql_query("SELECT * FROM `users` WHERE userName='$kto'");
 $usRow=mysql_fetch_array($us);
$pra = $usRow['pracodawca'];
if($pra === "1") {
$profil = "profile?ran=".$usRow['profilehash'];
$jpeg = 'logo/'.$usRow['profilehash'].'.jpeg';
$jpg = 'logo/'.$usRow['profilehash'].'.jpg';
$gif = 'logo/'.$usRow['profilehash'].'.gif';
$png = 'logo/'.$usRow['profilehash'].'.png';
$bmp = 'logo/'.$usRow['profilehash'].'.bmp';

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
}
else {
$profil = "usprofile?ran=".$usRow['profilehash'];
$jpeg = 'avatar/'.$usRow['profilehash'].'.jpeg';
$jpg = 'avatar/'.$usRow['profilehash'].'.jpg';
$gif = 'avatar/'.$usRow['profilehash'].'.gif';
$png = 'avatar/'.$usRow['profilehash'].'.png';
$bmp = 'avatar/'.$usRow['profilehash'].'.bmp';
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
}
if (strcmp($tenRow['od'], $userRow['userName']) === 0) {
	if($tenRow['przecznad'] === "0") {
	$idek = $tenRow['ID'];
$d = "UPDATE `mess` SET `przecznad` = '1' WHERE `ID`='$idek'";
$g = mysql_query($d);
$nieod = $nieod-1;
}
}
if (strcmp($tenRow['do'], $userRow['userName']) === 0) {
	if($tenRow['przecz'] === "0") {
	$idek = $tenRow['ID'];
$d = "UPDATE `mess` SET `przecz` = '1' WHERE `ID`='$idek'";
$g = mysql_query($d);
$nieod = $nieod-1;
}
}
else { $reply = $tenRow['od']; }
if($rep) {
$replyto = $rep;
}
else if($reply){
$replyto = $reply;
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
<title><?php echo $tenRow['temat']; ?></title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href=" http://antenna.io/demo/jquery-bar-rating/dist/themes/fontawesome-stars.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
 <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<script>$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");
	});</script>
<div class="se-pre-con"></div>
<body style="background-color:#F1F3FA;"> 
<nav class="navbar navbar-default" style="margin-bottom:0px !important;">
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
  <?php if($end === "true") { ?><div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Uwaga!</strong> Ważność Twojego konta Premium wygasła! Aby wykupić dostęp ponownie kliknij <a style="font-weight:700; color:#BB4D55" href="kup">tutaj</a>.<br><strong>Dziękujemy za wsparcie serwisu mrwork.pl</strong>
</div><?php } ?>
    <div class="row">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-8"  style="min-height:400px; background: white; border-radius:5px; ">
	<div style="margin: 5px 5px; ">
	<div class="sprzatacz"> <button class="barek" style="margin-top: 10px; display: inline-block; float:left;" onclick="window.history.back();" data-tooltip="tooltip" data-placement="bottom" title="Powrót"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
	<div align="center">
	<?php if($bol === "0" && $tenRow['ulubodb'] === "0" || $bol === "1" && $tenRow['ulubnad'] === "0" ) { ?><button id="ulub" class="ulubiona barek <?php if($bol === "0" && $tenRow['ulubodb'] === "0" ) { echo "odb"; } else if($bol === "1" && $tenRow['ulubnad'] === "0" ) { echo "nad";  } ?> <?php echo $tego; ?>" style="margin-top: 10px;" data-tooltip="tooltip" data-placement="bottom" title="Dodaj do ulubionych"><i class="fa fa-star-o" aria-hidden="true"></i></button><?php } ?>
	<?php if($bol === "0" && $tenRow['ulubodb'] === "1" || $bol === "1" && $tenRow['ulubnad'] === "1" ) { ?><button id="usuw" class="ulubiona barek <?php if($bol === "0" && $tenRow['ulubodb'] === "1" ) { echo "odb"; } else if($bol === "1" && $tenRow['ulubnad'] === "1" ) { echo "nad";  } ?> <?php echo $tego; ?>" style="margin-top: 10px;" data-tooltip="tooltip" data-placement="bottom" title="Usuń wątek z ulubionych"><i class="fa fa-star" aria-hidden="true"></i></button><?php } ?>
	<button id="refresh" class="barek" style="margin-top: 10px;" onclick="location.reload();" data-tooltip="tooltip" data-placement="bottom" title="Odśwież"><i class="fa fa-refresh" aria-hidden="true"></i></button>
	<button id="thresh" class="<?php echo $tego; ?> <?php if($bol === "1") { echo "nad";} else if($bol === "0") { echo "odb"; } ?> barek" style="margin-top: 10px;" data-tooltip="tooltip" data-placement="bottom" title="Usuń"><i class="fa fa-trash" aria-hidden="true"></i></button>
	<?php if($bol === "0") { ?><button id="block" class="barek" style="margin-top: 10px;" data-tooltip="tooltip" data-placement="bottom" title="Zablokuj nadawcę"><i class="fa fa-ban" aria-hidden="true"></i></button><?php } ?>
	<?php if($bol === "0") { ?><button id="flag" data-toggle="modal" data-target="#zglos" class="barek" style="margin-top: 10px; " data-tooltip="tooltip" data-placement="bottom" title="Zgłoś naruszenie"><i class="fa fa-flag" aria-hidden="true"></i></button><?php } ?>
	 </div> 
	<div style=" margin-top: 10px; "><button id="reply" onclick="$('.arena').focus();" class="barek" data-tooltip="tooltip" data-placement="bottom" title="Odpowiedz"><i class="fa fa-reply" aria-hidden="true"></i></button></div> 
	</div>
</div>
<hr class="hark">
<script>
$("#thresh").click(function(){
var str = ($("#thresh").attr('class'));
var raz = str.replace("barek", "");
var trzy = raz.trim();
var res = trzy.split(" ");
var miej = res[1];
var co = res[0];
var r = confirm("Czy na pewno chcesz usunąć wątek?");
if (r == true) {
$.ajax({
     url: 'us.php',
     type: "POST",
     dataType:'json',
     data: ({co: co, miej: miej}),
     success: function(data){
     if (data == 'usunieto') {
window.location.href = 'mess';
}

if (data == 'false') { alert("Coś poszło nie tak,spróbuj jeszcze raz!"); }
     },
     error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!");
      }
});
}
});
</script>
<?php if($bol === "0" && $tenRow['ulubodb'] === "0" || $bol === "1" && $tenRow['ulubnad'] === "0" ) { ?>
<script>
$("#ulub").click(function(){
var str = ($("#ulub").attr('class'));
var raz = str.replace("ulubiona", "");
var dwa = raz.replace("barek", "");
var trzy = dwa.trim();
var res = trzy.split(" ");
var miejsce = res[0];
var pinc = res[1];
var x ="0";
$.ajax({
     url: 'fav.php',
     type: "POST",
     dataType:'json',
     data: ({pinc: pinc, miejsce: miejsce, x: x}),
     success: function(data){
     if (data == 'dodano') {
alert("Wątek został dodany do ulubionych.");
location.reload();
}

if (data == 'false') { alert("Coś poszło nie tak,spróbuj jeszcze raz!"); }
     },
     error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!");
      }
});
});
</script><?php } ?>
<?php if($bol === "0" && $tenRow['ulubodb'] === "1" || $bol === "1" && $tenRow['ulubnad'] === "1" ) { ?>
<script>
$("#usuw").click(function(){
var str = ($("#usuw").attr('class'));
var raz = str.replace("ulubiona", "");
var dwa = raz.replace("barek", "");
var trzy = dwa.trim();
var res = trzy.split(" ");
var miejsce = res[0];
var pinc = res[1];
var x ="1";
$.ajax({
     url: 'fav.php',
     type: "POST",
     dataType:'json',
     data: ({pinc: pinc, miejsce: miejsce, x: x}),
     success: function(data){
     if (data == 'usun') {
alert("Wątek został usunięty z ulubionych.");
location.reload();
}

if (data == 'false') { alert("Coś poszło nie tak,spróbuj jeszcze raz!"); }
     },
     error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!");
      }
});
});
</script><?php } ?>
	<script>
$(document).ready(function(){
    $('[data-tooltip="tooltip"]').tooltip(); 
});
</script><div style="width:100%">
<h2 style=" font-size: 20px; font-family: Raleway; font-weight: 600; display:inline-block;"><?php echo $tenRow['temat']; ?></h2>
<div class="print" style="float: right;display: inline-block;"><a data-tooltip="tooltip" data-placement="bottom" title="Drukuj" style="color:#000;" href="print?<?php echo $tenRow['rand']; ?>" target="_blank"> <i style=" font-size: 20px; margin-top: 20px; margin-bottom: 10px; line-height: 1.1; " class="fa fa-print" aria-hidden="true"></i></a></div></div>
 <hr class="hark">

 <div style=" margin-top: 15px; margin-left: 5px; ">
<img src="<?php echo $path; ?>" class="img-responsive" style="width:64px; height:64px; display:inline-block;" alt="">
<p style=" display: inline-block; vertical-align: top; font-weight:700; font-family:Raleway; font-size:20px; ">&nbsp; <span style="font-weight:normal;">OD:&nbsp;</span><a href="<?php echo $profil; ?>" style="color:#000; text-decoration:none;"><?php echo $tenRow['od']; ?></a></p>
<div style="float: right;display: inline-block;"><span style=" vertical-align: top; font-family: Raleway; " >Wysłano: <span style="font-weight:700; vertical-align:top;"><?php echo $tenRow['wyslano']; ?></span></span>
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
			$on = $row['kto'];
			$usa = mysql_query("SELECT * FROM `users` WHERE userName='$on'");
 $usaRow=mysql_fetch_array($usa);
$pra = $usaRow['pracodawca'];
if($pra === "1") {
$profila = "profile?ran=".$usaRow['profilehash'];
$jpeg = 'logo/'.$usaRow['profilehash'].'.jpeg';
$jpg = 'logo/'.$usaRow['profilehash'].'.jpg';
$gif = 'logo/'.$usaRow['profilehash'].'.gif';
$png = 'logo/'.$usaRow['profilehash'].'.png';
$bmp = 'logo/'.$usaRow['profilehash'].'.bmp';

if (file_exists($jpeg)) {
    $patha = $jpeg;
} 
else if (file_exists($jpg)) {
    $patha = $jpg;
}
else if (file_exists($gif)) {
    $patha = $gif;
} 
else if (file_exists($png)) {
    $patha = $png;
} 
else if (file_exists($bmp)) {
    $patha = $bmp;
}  else {
    $patha = "user.png";
}
}
else {
$profila = "usprofile?ran=".$usaRow['profilehash'];
$jpeg = 'avatar/'.$usaRow['profilehash'].'.jpeg';
$jpg = 'avatar/'.$usaRow['profilehash'].'.jpg';
$gif = 'avatar/'.$usaRow['profilehash'].'.gif';
$png = 'avatar/'.$usaRow['profilehash'].'.png';
$bmp = 'avatar/'.$usaRow['profilehash'].'.bmp';
if (file_exists($jpeg)) {
    $patha = $jpeg;
} 
else if (file_exists($jpg)) {
    $patha = $jpg;
}
else if (file_exists($gif)) {
    $patha = $gif;
} 
else if (file_exists($png)) {
    $patha = $png;
} 
else if (file_exists($bmp)) {
    $patha = $bmp;
}  else {
    $patha = "user.png";
}
}
			
			?>
 <div style=" margin-top: 15px; margin-left: 5px; ">
<img src="<?php echo $patha; ?>" class="img-responsive" style="width:64px; height:64px; display:inline-block;" alt="">
<p style=" display: inline-block; vertical-align: top; font-weight:700; font-family:Raleway; font-size:20px; ">&nbsp; <span style="font-weight:normal;">OD:&nbsp;</span><a href="<?php echo $profila ?>" style="color:#000; text-decoration:none;"><?php echo $row['kto']; ?></a></p>
<div style="float: right;display: inline-block;"><span style=" vertical-align: top; font-family: Raleway; " >Wysłano: <span style="font-weight:700; vertical-align:top;"><?php echo $row['wyslano']; ?></span></span>
</div>
</div>
<div style=" margin-top: 15px; margin-left: 5px; "><span style="font-family:Raleway;"><?php echo $row['text']; ?></span></div>
 <hr class="hark">			
			<?php } ?>
  <textarea rows="4" placeholder="Odpowiedz" class="arena"></textarea>		
<button type="button" id="wysylam"  class="btn btn-success btn-block pull-right" style="width:10vw; margin-right:5px; display:none; margin-bottom:5px;">Wyślij</button>
	<script>
function functionToRun(e){
        var confirmationMessage = 'It looks like you have been editing something. '
                            + 'If you leave before saving, your changes will be lost.';

    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
}
$(".arena").keyup(function(){
var x = $(".arena").val().length;
if(x > 0) {
window.addEventListener("beforeunload", functionToRun);
}
else if(x === 0) {
window.removeEventListener("beforeunload",functionToRun);
}

});

</script>
 <script>
$(document).ready(function(){
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
var col = $(".col-sm-8").height();
}
else {
var col = $(".col-sm-8").height();
$('.col-sm-2').height(col);
}
});
 </script>
<script>$("#wysylam").click(function() {
window.removeEventListener("beforeunload",functionToRun);
var text = $(".arena").val();
var rand = <?php echo json_encode($tenRow['rand']); ?>;
var nad = <?php echo json_encode($userRow['userName']); ?>;
var doom = <?php echo json_encode($replyto); ?>;

$.ajax({
     url: 'reply.php', 
     type: "POST",
     dataType:'json',
     data: ({text: text, rand: rand, nad: nad, doom: doom}),
     success: function(data){
	 if (data == 'true') {
alert("Odpowiedź została wysłana");
$(".arena").val("");
$("#wysylam").hide();
location.reload();
}
else if (data == 'false') {
alert("Coś poszło nie tak, spróbuj jeszcze raz!");
}
else if(data == 'mnie') {
alert("Nie można wysłać wiadomości do użytkownika, który Cie blokuje!");
}
else if(data == 'ja') {
alert("Nie można wysłać wiadomości do użytkownika, który jest na czarnej liście!");
}
	 },
	 error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Żądana strona nie została znaleziona. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Wewnętrzny błąd serwera. [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Przekroczono czas odpowiedzi.';
        } else if (exception === 'abort') {
            msg = 'Żądanie zostało anulowane.';
        } else {
            msg = 'Nieznany błąd.\n' + jqXHR.responseText;
        }
        alert(msg);
    }
});
});
</script>
<script>
$('.arena').keyup(function() {
   if ($.trim($('.arena').val()).length > 0)
{
$("#wysylam").fadeIn(500);
}
else {
$("#wysylam").fadeOut(200);
}
});
	</script>
</div><div class="col-sm-2"><a id="back-to-top" href="#" style="cursor: pointer;  display:none; bottom:0; position:absolute;" class="btn btn-primary btn-lg back-to-top" role="button" title="Wróć do góry" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
</div>
	<script>$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});</script>
	</div>
    </div>
</div>


	<div class="modal fade" id="zglos" role="dialog">
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
   <input type="checkbox" id="dolacz" name="add"> Czy chcesz dołączyć ,do zgłoszenia, treść otrzymanej wiadomość ?<br>
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
var add = <?php echo json_encode($tenRow['wiad']); ?>;
$.ajax({
     url: 'report.php', 
     type: "POST",
     dataType:'json', 
     data: ({aaa: aaa, bbb: bbb, c: c, d: d, add: add}),
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
    </div>
  </div>
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
  });</script>
   <div class="row"><footer class="footer-distributed">

			<div class="footer-right">

				<a href="https://www.facebook.com/Woorkerpl"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/woorkerpl"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="hall"><i class="fa fa-university" aria-hidden="true"></i></a>

			</div>

			<div class="footer-left">

				<p class="footer-links">
					<a href="home" >Strona główna</a>
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
				<p style="font-size:14px; color:#999;">User icon made by <a title="Madebyoliver" href="http://www.flaticon.com/authors/madebyoliver">Madebyoliver</a> from <a title="Flaticon" href="http://www.flaticon.com">www.flaticon.com</a></p>
			</div>

		</footer></div></div>
</body>
</html>
<?php ob_end_flush(); ?>