<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Premium - mrwork.pl</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
 <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<style>
.comp li {
margin:0 0 10px 0;
}
</style>
</head>
<script>$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});</script>
<div class="se-pre-con"></div>
<body style="background-color:#f8f8f8;">
<nav style="width:100%;background:#0271B3;border-color: transparent;" class="navbar navbar-default">
  <div class="navbar-header ">
      <button type="button" onclick="clickedIt()" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-left" style="margin-left: 20px;" href="/"><img class="ele" src="logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right" >
	  <?php  if( !isset($_SESSION['user']) ) {
 
 ?>
<li style="margin-right: 20px;font-weight: 600;"><a href="login"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Zaloguj się</a></li>
<?php 
}
 else {
?>
<li style="margin-right: 20px;font-weight: 600;"><a href="home"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Strona główna</a></li>
<?php } ?>
      </ul>
    </div>
</nav>
<div class="bg"></div>
<div class="jumbotron">
 <div style="margin-left: 3vw;width: 45vw;margin-top: 8vh;text-align: center;"> <h1 style="font-family: Merriweather;font-weight: 700; color: #3c3f42;">Przejdź na wersję premium i odkryj <span style="color: #000;">więcej!</span></h1>
 <center><div class="byf">Dołącz już dziś!</div></center>
 </div>
</div>

<div class="container-fluid">
  <div class="row">
<div class="col-sm-1"></div>
        <div class="col-sm-10">
		<div class="row">
    <div class="col-sm-4" style="text-align:center;"><i style=" color: #ff4b4b; " class="fa fa-heart fa-5x" aria-hidden="true"></i><h3 class="eg" >Bądź skuteczny!</h3><p class="eq">Dzięki możliwości wyróżnienia ogłoszenia ,miej pewność, że zobaczy je każdy!</p></div>
        <div class="col-sm-4" style="text-align:center;"><i style=" color: #333; " class="fa fa-binoculars fa-5x" aria-hidden="true"></i><h3 class="eg" >Wiedz więcej!</h3><p class="eq">Dzięki Premium, możesz przeglądać wszystkie dostępne ogłoszenia!</p></div>
    <div class="col-sm-4" style="text-align:center;"><i style=" color: #05944c; " class="fa fa-usd fa-5x" aria-hidden="true"></i><h3 class="eg" >Bądź oszczędny!</h3><p class="eq">Konto premium kosztuje tylko 3.76zł za 30 dni!</p></div>
</div>
		</div>
        <div class="col-sm-1"></div>
  </div>
  <hr>
  <div class="row">
    <h2 style="text-align:center; font-family:Raleway;">Przeglądaj <b>za darmo</b> lub przejdź na wersję <b>Premium.</b></h2>

<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8"><div class="row">
    <div class="col-sm-5"><div class="freebox">
	<p style="padding: 0px 13px;font-size: 32px;color: #cc0000;Font-family: Raleway;font-weight: 700;">Darmowe konto</p>
	<br style=" line-height: 35px;">
	<ul class="comp">
  <li class="med">5 najnowszych ogłoszeń pracodawców</li>
  <li class="med">Możliwość dodania 2 ogłoszeń w pomocy sąsiedzkiej</li>
  <li class="cons">Możliwość wyróżnienia ogłoszenia</li>
  <li class="cons">Specjalne oznaczenie w profilu</li>
  <li class="cons">Nazwa konta zostanie wpisana na ścianie sław</li>
  <li class="cons">Wsparcie rozwoju serwisu</li>
</ul>	
 <center><div class="byg" style=" width: 75%; margin-bottom: 10px; ">Załóż darmowe konto</div></center>
	</div></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-5"><div class="premiumbox">
	<p style="padding: 0px 13px;font-size: 32px;color: #058547;Font-family: Raleway;font-weight: 700;">Premium</p>
	<p style="padding: 0px 13px;margin-top: -12px;font-size: 32px;color: #058547;font-family: Muli;">3.76zł <span style="font-size:20px;">/ 30 dni (płatność SMS)</span></p>
	<ul class="comp pros">
  <li>Widoczne wszystkie ogłoszenia w serwisie</li>
  <li>Nieograniczona ilość dodawanych ogłoszeń</li>
  <li>Możliwość wyróżnienia jednego z ogłoszeń (również dla pracodawców)</li>
  <li>Specjalne oznaczenie w profilu</li>
  <li>Nazwa konta zostanie wpisana na specjalną ścianę <a href="hall">sław</a></li>
  <li>Możliwość umieszczenia swojego logo w sekcji&nbsp;<a href="http://mrwork.pl/about#trusted">Zaufali nam</a>&nbsp;(tylko dla pracodawców)</li>
  <li>Wsparcie rozwoju serwisu</li>
</ul>	
 <center><div class="byf" style=" width: 75%; margin-bottom: 10px; ">Zacznij z Premium!</div></center>
	</div></div>
</div></div>
    <div class="col-sm-2">&nbsp;</div>
</div>
  </div>
  <hr>
  <div class="row">
    <h1 style="text-align:center; font-family:Raleway;">Nie zastanawiaj się i już dziś <a style="font-weight:700; color:#05944c" href="kup">dołącz</a> do posiadaczy Premium!</h1>
<center><div style="width:50%"><a href="https://simpay.pl/dokumenty/simpay_regulamin_uzytkownik_koncowy_01_03_15.pdf" style="font-family:Raleway; float:left">Regulamin usługi SMS Premium</a><a href="regulamin" style="font-family:Raleway; float:right">Regulamin serwisu mrwork.pl</a></div></center>
	</div>

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
					<a class="active" href="premium">Premium</a>
					·
					<a href="contact">Kontakt</a>
				</p>

				<p>&copy; mrwork.pl - Wszelkie prawa zastrzeżone. <a style="color: #999; font-size: 14px; margin: 0;" href="https://icons8.com/web-app/27/Checkmark">Checkmark icon credits</a></p>
			</div>

		</footer></div></div>
		<script>
$(document).ready(function() {
    $('.byf').click(function(e) {  
     window.location.href = 'kup';
    });
	$('.byg').click(function(e) {  
     window.location.href = 'register';
    });
});
</script>
<script> function clickedIt() {   
   var canSee = $("#myNavbar").is(":visible");
   if(canSee == false) {
$(".navbar-default").addClass("scrolled");
$("#myNavbar").addClass("scrolled");
}
 else if(canSee == true) {
$(".navbar-default").removeClass("scrolled");
$("#myNavbar").removeClass("scrolled");
}
}
var jumboHeight = $('.jumbotron').outerHeight();
function parallax(){
    var scrolled = $(window).scrollTop();
    $('.bg').css('height', (jumboHeight-scrolled) + 'px');
}

$(window).scroll(function(e){
    parallax();
});
</script>
</body>
</html>
<?php ob_end_flush(); ?>