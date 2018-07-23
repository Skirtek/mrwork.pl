<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$high = mysql_result(mysql_query("SELECT MAX(ID) FROM userdet"), 0);
$high2 = mysql_result(mysql_query("SELECT MAX(ID) FROM pradet"), 0);
$high3 = mysql_result(mysql_query("SELECT MAX(ID) FROM adv"), 0);
$dir    = '/home/mrworkpl/domains/mrwork.pl/public_html/trust/';
$files1 = scandir($dir,1);
$wynik = count($files1);
$minusik = $wynik -2;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>O nas - mrwork.pl</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
 <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
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
<div class="bg" style="height:600px; background: url('/images/bgab.jpg') no-repeat center center; background-size:cover; "></div>
<div class="jumbotron" style="height:600px">
 <div style="margin-left: 3vw;width: 45vw;margin-top: 15vh;text-align: center;"> <h1 style="font-family: Merriweather;font-weight: 700; color: #fff;">mrwork.pl - Praca w zasięgu <span style="color: #000;">ręki!</span></h1>
 <center><div class="byf">Dołącz już dziś!</div></center>
 </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3">&nbsp;</div>
    <div class="col-sm-2" ><center><i style=" margin-top: 5px; " class="fa fa-user fa-5x" aria-hidden="true"></i></center><h3 class="eg" >Kim jesteśmy?</h3><p class="eq">Serwisem z ogłoszeniami z pracą dla osób w wieku 13-19 lat.</p></div>
    <div class="col-sm-2" ><center><i style=" margin-top: 5px; " class="fa fa-gear fa-5x" aria-hidden="true"></i></center><h3 class="eg" >Co robimy?</h3><p class="eq">Umożliwiamy znalezienie pracy przez młodzież w wieku od 13 do 19 lat. Co więcej, dzięki opcji pomoc sąsiedzka ,pozwalamy na łączenie osób, które szukają małych zleceń tj. wyprowadzenie psa czy przyniesienie zakupów.</p></div>
    <div class="col-sm-2" ><center><i style=" margin-top: 5px; " class="fa fa-question fa-5x" aria-hidden="true"></i></center><h3 class="eg" >Dlaczego my?</h3><p class="eq">Jesteśmy jedynym serwisem z ogłoszeniami ,którego grupą docelową jest młodzież!</p></div>
    <div class="col-sm-3">&nbsp;</div>
  </div>
  <div class="row" style="margin-top:10px; padding:0 !important; background-size: cover; background:#f0f0f0 url('/images/bg4.png') no-repeat center; height: 100%;">
<div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-8" >
<div class="row" style="margin-top:10px; margin-bottom:10px;">
 <p class="partext">mrwork.pl w liczbach</p>
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-2" ><center><div class="circle">
                <span><?php echo $high; ?></span><br>użytkowników
            </div></center></div>
			<div class="col-sm-2" ><center><div class="circle">
                <span><?php echo $high2; ?></span><br>pracodawców
            </div></center></div>
    <div class="col-sm-2" ><center><div class="circle">
                <span><?php echo $high3; ?></span><br>ogłoszeń
            </div></center></div>
    <div class="col-sm-2" ><center><div class="circle"><span id="lajki">2</span><br>fanów na FB
            </div></center></div>
    <div class="col-sm-2">&nbsp;</div>
</div>
    </div>
	<div class="col-sm-2">&nbsp;</div>
  </div>
  <div class="row" style=" background-color: #da594c;">
<div class="col-sm-1">&nbsp;</div>
        <div class="col-sm-10" ><center>
<div class="row" style="margin-top:10px; margin-bottom:10px;">
 <p class="partext">Poznaj nasz zespół</p>
   <div class="col-sm-1">&nbsp;</div>
    <div class="col-sm-2" ><img style="width:180px; height:180px;" class="face uno" src="images/face.png"></div>
   <div class="col-sm-2" ><img style="width:180px; height:180px;" class="face double " src="images/babe.png"></div>
   <div class="col-sm-2" ><img style="width:180px; height:180px;" class="face three" src="images/bober.png"></div>
   <div class="col-sm-2" ><img style="width:180px; height:180px;" class="face quadra" src="images/fox.png"></div>
   <div class="col-sm-2" ><img style="width:180px; height:180px;" class="face penta" src="images/ja.png"></div>

			<div class="col-sm-1">&nbsp;</div>

</div>
<div id="facepng"><p class="slowa">Kierowanie zespołem może przyprawić o niezły zawrót głowy, lecz efekty są warte swojej ceny. Wkręć się i dołącz już dziś!</p>
<p class="powiedz">Janusz Biznesu<p class="podpis">dyrektor firmy</p></p>
    </center></div>

	</div>
	<div class="col-sm-2">&nbsp;</div>
</div>
 <?php if($minusik > 0){?> <div class="row">
  <div class="col-sm-3">&nbsp;</div>
		<div id="trusted" class="col-sm-6"><h1 style="text-align:center; font-family: 'Merriweather', serif;">Zaufali nam</h1><center>
		<?php for($x = 0;$x < $minusik; $x++) {
$temp =  $files1[$x];
$path = $dir.$temp;
$exp = (explode(".",$temp));
$hash = $exp[0];
$guy = mysql_query("SELECT * FROM `users` WHERE profilehash='$hash'");
$guyRow=mysql_fetch_array($guy);
$nazwa = $guyRow['userName'];
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
unlink($path);
header("Refresh:0");
}
}
else {
unlink($path);
}
?>
<img style="padding:10px; width:150px; height:60px;" src="trust/<?php echo $files1[$x]; ?>">

<?php } ?>
</center></div>
		<div class="col-sm-3">&nbsp;</div>
</div><?php } ?>
<div class="row"><div class="col-sm-3">&nbsp;</div>
		<div class="col-sm-6"><center><h1 class="ping" >Firma działa w ramach konkursu na Miniprzedsiębiorstwo.<img style="margin-top:10px;" src="http://www.miniprzedsiebiorstwo.junior.org.pl/img/logo.gif"></center></div>
		<div class="col-sm-3">&nbsp;</div></div>
<div class="row"><div class="col-sm-3">&nbsp;</div>
		<div class="col-sm-6"><center><h1 style="text-align:center; color:black; font-family: 'Merriweather', serif;">Masz pytanie?</h1>
		<button type="button" style="margin-bottom:10px;" class="center-block btn btn-primary" data-toggle="modal" data-target="#myModal"><b>Napisz do nas!</b></button></center></div>
		<div class="col-sm-3">&nbsp;</div></div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kontakt</h4>
      </div>
      <div class="modal-body">
         <div id="contact" class="aboutcon" style="background: transparent; padding: 0px; margin: 0px; box-shadow: none;">
    <div id="gj" style="display:none;" class="form-group">
             <div class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Dziękujemy za wiadomość! :)
                </div>
             </div>
			   <div id="bj" style="display:none;" class="form-group">
             <div class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Coś poszło nie tak,spróbuj jeszcze raz!
                </div>
             </div>
			  <div id="empty" style="display:none;" class="form-group">
             <div class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wpisz treść wiadomości!
                </div>
             </div>
			     <fieldset>
     <input id="ema" placeholder="Adres email" type="email" maxlength="80">
    </fieldset>
    <fieldset>
      <input id="nam" placeholder="Temat" type="text" maxlength="20">
    </fieldset>
    <fieldset>
      <textarea name="desc" id="desc" placeholder="Twoja wiadomość" required maxlength="300"></textarea>
	  <div id="komNum" style="font-size: 12px;"></div>
    </fieldset>
	<center><div class="g-recaptcha" style="margin-bottom: 5px; margin-top: 5px;" data-callback="recaptchaCallback" data-sitekey="6LfmhRQUAAAAAM2YStZNRsHBtuKuaTK7YSNd9mPn"></div></center>
    <fieldset>
    </fieldset>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="send" class="btn btn-primary" disabled>Wyślij</button>
      </div>
    </div>

  </div>
</div>
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
					<a href="premium">Premium</a>
					·
					<a href="contact">Kontakt</a>
				</p>

				<p>&copy; mrwork.pl - Wszelkie prawa zastrzeżone.</p>
			</div>

		</footer></div></div>
				<script>
$(document).ready(function() {
    $('.byf').click(function(e) {  
     window.location.href = 'register.php';
    });

});
</script>
<script>$( document ).ready(function() {
if ($(window).width() < 960) {
$("#facepng").show();
}
else {
$("#facepng").hide();
}
    $(".uno").on("click", function()
{
if ($(window).width() < 960) {
$('html,body').animate({
            scrollTop: $("#facepng").offset().top},
            'slow');
}
$("#facepng").show();
$(".slowa").text("Kierowanie zespołem może przyprawić o niezły zawrót głowy, lecz efekty są warte swojej ceny. Wkręć się i dołącz już dziś!");
$(".powiedz").text("Filip");
$(".podpis").text("dyrektor firmy");
});
 $(".double").on("click", function()
{
if ($(window).width() < 960) {
$('html, body').animate({
        scrollTop: $("#facepng").offset().top-50
    }, 1000);
}
$("#facepng").show();
$(".slowa").text("Matematyka w firmie jest przydatna, zwłaszcza gdy zbliża się okres rozliczeniowy. Na nas możesz liczyć bardziej niż na liczby!");
$(".powiedz").text("Paulinka");
$(".podpis").text("dyrektor ds. finansowych");
});
 $(".three").on("click", function()
{
if ($(window).width() < 960) {
$('html, body').animate({
        scrollTop: $("#facepng").offset().top-50
    }, 1000);
}
$("#facepng").show();
$(".slowa").text("Każdy pomysł to perspektywa na lepszą przyszłość. Dzięki pracy naszej ekipy możesz zadbać o swoją!");
$(".powiedz").text("Świstak Marwoorker");
$(".podpis").text("maskotka");
});
 $(".quadra").on("click", function()
{
if ($(window).width() < 960) {
$('html, body').animate({
        scrollTop: $("#facepng").offset().top-50
    }, 1000);
}
$("#facepng").show();
$(".slowa").text("Podstawą każdego przedsiębiorstwa jest dobra reklama. Przyrost popularności serwisu = większa szansa na znalezienie czegoś dla siebie.");
$(".powiedz").text("Olcia");
$(".podpis").text("dyrektor ds. marketingu");
});
 $(".penta").on("click", function()
{


$("#facepng").show();
$(".slowa").text("Dokładamy wszelkich starań, aby nasz serwis działał jak należy. Zapewniamy profesjonalną pomoc techniczną i bezpieczeństwo. My dbamy o Twoje dane, a Ty możesz spokojnie szukać pracy!");
$(".powiedz").text("Bartek");
$(".podpis").text("programista");
});
});</script>
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
  <script>function recaptchaCallback() {
    $('#send').removeAttr('disabled');
}; </script>
	<script>$(document).ready(function() {
    var text_max = 300;
    $('#komNum').html("Pozostało: " + text_max + ' znaków.');

    $('#desc').keyup(function() {
        var text_length = $('#desc').val().length;
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
<script>$('#send').on('click', function(event) { 
 var y = $('#nam').val();
 var w = $('#ema').val();
 var z = $('#desc').val();
 if (!$.trim($("#desc").val())) {
    $("#desc").addClass("area");
	 $('#empty').show();
}
else {
$.ajax({
     url: 'cont.php', 
     type: "POST",
     dataType:'json', 
     data: ({z: z, w: w, y: y}),
     success: function(data){
	 if (data == 'true') {
$('#bj').hide();
$('#gj').show();
$('#empty').hide();
 $("#desc").removeClass("area");
var content = "";
grecaptcha.reset();
$("#desc").val(content);
$('#ema').val(content);
$('#nam').val(content);
}
	 },
	 error: function () {
       $('#bj').show();
      }
});
}
 });</script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>