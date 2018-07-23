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
  header("Location: login?continue=offer?ran=$abc");
  exit;
 }
  $po = "SELECT rand from adv where rand='$abc'";
$pp = mysql_query($po);

if(mysql_num_rows($pp) === 0)
{
    header("Location:404.html");
}
 // szczegóły użytkownika
 mysql_query("SET NAMES utf8");
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
   $mine = $userRow['pracodawca'];
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
	$sta = "false";
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
$sta = "true";
}
 $server = $_SERVER['QUERY_STRING'];
 $ran = substr($server, 4);
 $adv=mysql_query("SELECT * FROM adv WHERE rand='$ran'");
 $advRow=mysql_fetch_array($adv);
 $next = $advRow['ID'] + 1;
 $nex=mysql_query("SELECT rand FROM adv WHERE ID='$next'");
 $nextRow=mysql_fetch_array($nex); 
 $_SESSION["rand"] = $ran;
 $kto = $advRow['kto'];
 $pra=mysql_query("SELECT * FROM pradet WHERE name='$kto'");
$praRow=mysql_fetch_array($pra);
 $us=mysql_query("SELECT * FROM users WHERE userName='$kto'");
$usRow=mysql_fetch_array($us);
   $usmine = $usRow['pracodawca'];
if (strpos($usmine, '1') !== false) {
    $linka = 'profile?ran='.$usRow['profilehash'];
}
else {
$linka = 'usprofile?ran='.$usRow['profilehash'];
}
$tel = $praRow['telefon'];
$f = $advRow['wym'];
if(empty($f)){
$er = true;
}
if (strpos($tel, '-') !== false) {
    $first = substr($tel, 0, -9);
	$rest = substr($tel,2);
}
else {
$first = substr($tel, 0, -7);
$rest = substr($tel,2);
}
$blocked = $userRow['userName'];
$bl=mysql_query("SELECT * FROM blocked WHERE kto='$blocked'");
$blRow=mysql_fetch_array($bl);
$who = $blRow['kogo'];
$nazwa = $advRow['kto'];
$ten = $userRow['userName'];
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
 $old = mysql_query("SELECT * FROM `comment` WHERE komu='$nazwa' and nowy=1");
$new = mysql_num_rows($old);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title><?php echo $advRow['title']; ?></title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <span class="glyphicon glyphicon-info-sign"></span> Nie można wyświetlić ogłoszenia, ponieważ użytkownik które je dodał, jest na czarnej liście! Możesz odblokować go w <a href="setuser" class="alert-link">ustawieniach konta</a>.
                </div>
</div> </center><?php } ?>
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
<div class="container-fluid">
<?php if (strpos($who, $nazwa) !== false) {   ?> <script>$('.container-fluid').hide();</script> 
 <?php } ?>
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="row">
    <div class="col-sm-12"><a href="#" onclick="window.history.back();" style="float: left; font-size:15px; font-weight: 700; font-family: Raleway;"><i class="fa fa-angle-left" aria-hidden="true"></i>&nbsp;Wróć</a>
	<?php if (mysql_num_rows($nex) != 0) { ?><div><a href="offer?ran=<?php echo $nextRow['rand']; ?>" style="float: right; font-size:15px; font-weight: 700; font-family: Raleway;">Następne ogłoszenie&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a></div><? } ?>
	</div>
</div>
	<hr style="margin-bottom:10px; margin-top: 10px !important; border-top: 1px solid #D8D8D8 !important;">
<div class="row">
    <div class="col-sm-8"><h2 style="margin-top:5px; word-break: keep-all;"><?php  echo $advRow['title']; ?>&nbsp;<?php $var1 = $advRow['kto']; $var2 = $userRow['userName']; if (strcmp($var1, $var2) == 0) { echo "<a href='edit' style='font-size:12px;'>Edytuj</a>"; } ?></h2>
	<h4><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $advRow['cityOption']; ?> <br> <span style="font-size:14px; font-weight: 200;">Dodano: <?php echo $advRow['data']; ?>, ID ogłoszenia: <?php echo $advRow['rand']; ?> </span></h4>
	<ul class="list-inline" style="margin-top:-5px;">
  <li><b>Stanowisko:</b>&nbsp;<?php echo $advRow['catOption']; ?></li>
  <br><li><b>Wymiar zatrudnienia:</b>&nbsp;<?php echo $advRow['cat1Option']; ?></li>
  <br>&nbsp;<b>Forma zatrudnienia:</b>&nbsp;<?php echo $advRow['typ']; ?>
  <br><li style="margin-top:5px;"><b>Wymagany język:</b>&nbsp;<?php echo $advRow['jezyk']; ?></li></ul>
	</div>
    <div class="col-sm-4" style="margin-top:10px;"><a <?php if(strcmp($ten,$nazwa) !=0){?>data-toggle="modal" data-target="#mess"<?php } ?> <?php if (strcmp($ten, $nazwa) == 0) { echo "style='pointer-events: none; cursor: default;'";} else { echo "style='cursor: pointer;'";}?>>
				<div class="osoba">
				<p style="color:#fff; font-weight: 600; text-align: center; vertical-align: middle; margin-top: 10px;"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;Napisz wiadomość</p> 
				</div>
				</a> 
				<a href="<?php echo $linka; ?>">
			<div class="osoba" style="margin-top:5px;">
				<p style="color:#fff; font-weight: 600; text-align: center; vertical-align: middle; margin-top: 10px;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo $advRow['kto']; ?></p> 
				</div></a>
				<div class="osoba" style="margin-top:5px;">
				<p style="color:#fff; font-weight: 600; text-align: center; vertical-align: middle; margin-top: 10px;"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;<?php echo $first; ?><span id="number" style="display:none;"><?php echo $rest; ?></span><span id="show">&nbsp;Pokaż</span></p> 
				</div>
				</div>
    <div class="col-sm-8"><div class="opis"><p style="margin: 5px;"><?php echo $advRow['opis']; ?></p><p style="<?php if($er) { echo "display:none;"; } ?>"><b>Dodatkowe wymagania:</b>&nbsp;<?php echo $advRow['wym']; ?></p></div>
	<div style="float:left;" class="fb-share-button" data-href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer?u=http%3A%2F%2F<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>%2F&amp;src=sdkpreparse">Udostępnij</a></div>

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
<?php if(strcmp($ten,$nazwa) !=0){ ?>
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

				<p>&copy; mrwork.pl - Wszelkie prawa zastrzeżone.</p>
			</div>

		</footer></div></div>
 

  
    
</body>
</html>
<?php ob_end_flush(); ?>