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
    mysql_query("SET NAMES utf8");
   $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
    $mine = $userRow['pracodawca'];
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
	$sta = "false";
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
$sta = "true";
}
$array = $_COOKIE;
$content = $array[$abc];
$czesci = explode(",", $content);
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title><?php echo $czesci[1]; ?></title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href=" http://antenna.io/demo/jquery-bar-rating/dist/themes/fontawesome-stars.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
 <script src='https://www.google.com/recaptcha/api.js'></script>
 <style>
 .themat {
 width:30%;
 }
 @media screen and (max-width: 767px) {
.themat {
width:70%;
}
}
 @media screen and (min-width: 992px) {
.butek {
width:10vw;
}
}
 </style>
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
             <div id="zapis" style="display:none;" class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wersja robocza została zapisana poprawnie!
                </div>
             <div id="mnie" style="display:none;" class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wiadomość nie została wysłana - użytkownik ,do którego chcesz wysłać wiadomość,zablokował Cię!
                </div>
    <div class="row">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-8"  style="background: white; border-radius:5px; ">
	<div style="margin: 5px 5px; "><button class="barek" style="margin-top: 10px;" onclick="window.history.back();" data-tooltip="tooltip" data-placement="bottom" title="Powrót"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
	<button id="refresh" class="barek" style="margin-top: 10px;" onclick="location.reload();" data-tooltip="tooltip" data-placement="bottom" title="Odśwież"><i class="fa fa-refresh" aria-hidden="true"></i></button>
	<button id="thresh" class="barek" style="margin-top: 10px;" data-tooltip="tooltip" data-placement="bottom" title="Usuń wersję roboczą"><i class="fa fa-trash" aria-hidden="true"></i></button> 
</div>
<hr class="hark">

	<script>
$(document).ready(function(){
    $('[data-tooltip="tooltip"]').tooltip(); 
});
</script><div style="width:100%">
<h2 style=" font-size: 20px; font-family: Raleway; font-weight: 600; display:inline-block;">Do:&nbsp;<?php echo $czesci[0]; ?></h2></div>

<div style=" margin-top: 10px;">
 <div id="th" class="form-group">
  <input type="text" placeholder="Temat" value="<?php echo $czesci[1]; ?>" class="themat form-control" id="usr">
  <p id="temacik" style="display:none; color: #a94442; font-size: 14px; margin-top: 5px; font-family: Muli; ">Wpisz temat wiadomości</p>
</div>
</div>
  <textarea rows="4" placeholder="Treść" class="arena"><?php echo $czesci[2]; ?></textarea>	
  <p id="tre" style="display:none; color: #a94442; font-size: 14px; margin-top: 5px; font-family: Muli; ">Wpisz treść wiadomości</p>
  <div class="btn-group pull-right" style="margin-right:5px; margin-bottom:5px;">
<button type="button" id="zapisuje"  class="butek btn btn-primary" >Zapisz</button>  
<button type="button" id="wysylam"  class="butek btn btn-success">Wyślij</button>
</div>

	<script>
function functionToRun(e){
        var confirmationMessage = 'It looks like you have been editing something. '
                            + 'If you leave before saving, your changes will be lost.';

    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
}
var x = $(".arena").val().length;
window.addEventListener("beforeunload", functionToRun);
$(".arena").keyup(function(){
var x = $(".arena").val().length;
if(x > 0) {
window.addEventListener("beforeunload", functionToRun);
}
else if(x === 0) {
window.removeEventListener("beforeunload",functionToRun);
}

});
$(document).ready(function(){
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
var col = $(".container-fluid").height();
}
else {
var col = $(".container-fluid").height();
if(col < 450) {
var ile = 450 - col;
$(".stopka").css("marginTop", ile);
}
}
});
$("#zapisuje").click(function(){
window.removeEventListener("beforeunload",functionToRun);
var odb = <?php echo json_encode($czesci[0]); ?>;
var temat = $("#usr").val();
var tresc = $(".arena").val();
var value = odb+","+temat+","+tresc;
var n = <?php echo json_encode($abc); ?>;
createCookie(n,value,7);
$("#zapis").show();
});
$("#wysylam").click(function(){
window.removeEventListener("beforeunload",functionToRun);
var doo = <?php echo json_encode($czesci[0]); ?>;
var thema = $("#usr").val();
var wiad = $('.arena').val();
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
$(".arena").addClass("has-error");
$("#tre").show();
}
else {
$(".arena").removeClass("has-error");
$(".arena").addClass("has-success");
$("#tre").hide();
}
 if(doo && thema && wiad) {
$("#tre").hide();
$("#temacik").hide();
$("#th").removeClass("has-error");
$(".arena").removeClass("has-error");
$.ajax({
     url: 'send.php', 
     type: "POST",
     dataType:'json', 
     data: ({doo: doo,thema: thema, wiad: wiad,nadawca: nadawca}),
     success: function(data){
	 if (data == 'true') {
	 var nam = <?php echo json_encode($abc); ?>;
	 eraseCookie(nam);
window.location.href = "mess#send";
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
$("#thresh").click(function(){
var str = ($("#thresh").attr('class'));
var raz = str.replace("barek", "");
var trzy = raz.trim();
var res = trzy.split(" ");
var miej = res[1];
var co = res[0];
var r = confirm("Czy na pewno chcesz usunąć wersję roboczą?");
if (r == true) {
var nazwa = <?php echo json_encode($abc); ?>;
eraseCookie(nazwa);
window.location.href = 'mess';
}
});
function eraseCookie(name) {
    createCookie(name,"",-1);
}
function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}
</script>
</div><div class="col-sm-2">&nbsp;</div>

	</div>
    </div>
   <div class="row stopka"><footer class="footer-distributed">

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
			</div>

		</footer></div></div>
</body>
</html>
<?php ob_end_flush(); ?>