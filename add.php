<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=add");
  exit;
 }

 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $end = $_SESSION["end"];
 unset($_SESSION['end']);
  $mine = $userRow['pracodawca'];
    $linek = 'profile?ran='.$userRow['profilehash'];
 $string = $userRow['pracodawca']; 
  $nazwa = $userRow['userName'];
$findme   = '0';
$pos = strpos($string, $findme);
 if ($pos === false) {
 mysql_query("SET NAMES utf8");
    $pra=mysql_query("SELECT * FROM pradet WHERE name='$nazwa'");
    $praRow=mysql_fetch_array($pra);
	$miej = $praRow['miejscowosc'];
	$tel = $praRow['telefon'];
	$op = $praRow['opis'];
	$ad = $praRow['adres'];
	if (empty($miej) || empty($tel) || empty($op) || empty($ad)) {
    $errStyle = "alert-info";
	$errMSG = "Aby móc dodawać ogłoszenia, uzupełnij wymagane pola w <a style='font-weight:700;' href='setuser'>ustawieniach konta</a> ";
	$er = "tru";
}
}
if (strpos($string, '1') !== false) {
	$error = false;
	 $cityOption = $praRow['miejscowosc'];
	if( isset($_POST['btn-login']) ) { 
	$title = trim($_POST['title']);
	$title = strip_tags($title);
	$title = htmlspecialchars($title);
  
	$wym = trim($_POST['wym']);
	$wym = strip_tags($wym);
	$wym = htmlspecialchars($wym);
	
	$desc = trim($_POST['desc']);
	$desc = strip_tags($desc);
	$desc = htmlspecialchars($desc);
	
	$cityOption = trim($_POST['city']);
	$cityOption = strip_tags($cityOption);
	$cityOption = htmlspecialchars($cityOption);
	
	
	$catOption = trim($_POST['cat']);
	$catOption = strip_tags($catOption);
	$catOption = htmlspecialchars($catOption);
	
	$cat1Option = $_POST['cat1'];
	$typ = $_POST['typ'];
	
	if (empty($title)) {
   $error = true;
   $titleError = "Wpisz tytuł!";
  }  
   else if (strlen($title) < 3) {
   $error = true;
   $titleError = "Tytuł musi zawierać przynajmniej 3 znaki.";
}

  if (strpos($cat1Option, 'for') !== false) {
  $error = true;
  $cat1Error = "Wybierz wymiar zatrudnienia!";
  }
   if (strpos($typ, 'typ') !== false) {
  $error = true;
  $cat1Error = "Wybierz formę zatrudnienia!";
  }
  if (empty($cityOption)) {
   $error = true;
   $cityError = "Wpisz miasto!";
  }
  if (empty($desc)) {
   $error = true;
   $descError = "Wpisz opis!";
  }
     else if (strlen($desc) < 3) {
   $error = true;
   $descError = "Opis musi zawierać przynajmniej 3 znaki.";
   }
if (isset($_POST['other'])) {
   if(!empty($_POST['jezyk'])) {
   $elements = array();
    foreach($_POST['jezyk'] as $check) {
            $elements[] = $check;
    }
	$jez = implode(',', $elements);
	if (empty($_POST['addlg'])) {
   $error = true;
   $addlgError = "Wpisz dodatkowe języki!";
  }
  else if (!empty($_POST['addlg'])) {
	$jezy = $_POST['addlg'];
	$je = $jez . ',' . $jezy;
	$array = explode(',', $je);
	sort($array);
	$jezyk = implode(",",$array);
  }
}
	}
	else {
		if(!empty($_POST['jezyk'])) {
    foreach($_POST['jezyk'] as $check) {
            $je = implode(',', $_POST['jezyk']);
			$array = explode(',', $je);
	sort($array);
	$jezyk = implode(",",$array);
			
	}
		}
	}
if( !$error ){
mysql_query("SET NAMES utf8");
$kto = $userRow['userName'];
$dzisiaj = date("Y-m-d");
$rand = substr(md5(microtime()),rand(0,26),10);
$linkacz = 'http://mrwork.pl/offer?ran=';
 $q = "select MAX(ID) from adv";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
$I = $data[0];
$ID = $I+1;
$title = mysql_real_escape_string($title);
$cityOption = mysql_real_escape_string($cityOption);
$wym = mysql_real_escape_string($wym);
$jezyk = mysql_real_escape_string($jezyk);
$desc = mysql_real_escape_string($desc);
$query = "INSERT INTO adv(ID,title,kto,catOption,cat1Option,cityOption,typ,wym,jezyk,opis,data,rand) VALUES('$ID','$title','$kto','$catOption','$cat1Option','$cityOption','$typ','$wym','$jezyk','$desc','$dzisiaj','$rand')";
   $res = mysql_query($query);
   
   if ($res) {
    unset($title);
    unset($catOption);
    unset($cat1Option);
    unset($wym);
    unset($desc);
	unset($kto);
	$title = "";
	$wym = "";
	$desc = "";
    $errMSG = "Dziękujemy! <a href=".$linkacz.$rand.">Ogłoszenie</a> zostało dodane!"; 
	$errStyle = "alert-success";
	
   } else {
    $errTyp = "danger";
    $errMSG = "Coś poszło nie tak, spróbuj ponownie!"; 
	$errStyle = "alert-danger";
   } 
}


	}
}
else if (strpos($string, '1') == false) {
    header("Location: home");
}
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
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

      <ul class="nav navbar-nav navbar-right" >
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span>
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
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span>
             <input type="text" name="cat" id="cat" class="form-control" data-toggle="tooltip" data-placement="right" title="Jeżeli nie dotyczy,zostawić puste!" placeholder="Stanowisko" value="<?php echo $cat; ?>" maxlength="255" />
                </div>
            </div>
			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-list"></span></span>
             <select name="typ" id="typ"  class="form-control selectpicker" >
      <option value="typ" >Forma zatrudnienia</option>
	  <option value="Umowa o pracę" >Umowa o pracę</option>
	  <option value="Umowa zlecenie" >Umowa zlecenie</option>
	  <option value="Umowa o dzieło" >Umowa o dzieło</option>
	  <option value="Nie dotyczny" >Nie dotyczy</option></select>
                </div>
                <span class="text-danger"><?php echo $typError; ?></span>
            </div>
			 
			 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-list"></span></span>
             <select name="cat1" id="cat1" class="form-control selectpicker" >
      <option value="for" >Wymiar zatrudnienia</option>
	  <option value="Pełen etat" >Pełen etat</option>
	  <option value="Praca czasowa" >Praca czasowa</option>
	  <option value="Praktyka/staż" >Praktyka/staż</option>
	  <option value="Nie dotyczy" >Nie dotyczy</option></select>
                </div>
                <span class="text-danger"><?php echo $cat1Error; ?></span>
            </div>
			
			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" name="city" id="city" class="form-control" placeholder="Miasto" value="<?php echo $cityOption; ?>" />
                </div>
                <span class="text-danger"><?php echo $cityError; ?></span>
            </div>
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
<script>var typingTimer;                //timer identifier
var doneTypingInterval = 2000;  //time in ms (5 seconds)

//on keyup, start the countdown
$('#city').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#city').val()) {
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    }
});

function doneTyping () {
$('#city').val( $('#city').val().replace(', Polska',''));
}</script>
			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
             <input type="text" name="wym" id="wym" class="form-control" placeholder="Dodatkowe wymagania" value="<?php echo $wym; ?>" data-toggle="tooltip" data-placement="right" title="Wymagania prosimy oddzielać przecinkami!" />
                </div>
                <span class="text-danger"><?php echo $wymError; ?></span>
            </div>
			
			
			<div class="form-group">
                        <label class="control-label">Wymagany język:</label><br>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="angielski">Angielski</label>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="niemiecki">Niemiecki</label>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="hiszpański">Hiszpański</label><br>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="francuski">Francuski</label>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="rosyjski">Rosyjski</label>
<label class="checkbox-inline"><input type="checkbox" name="other" id="other">Inny</label>
<div id="oder" style="display:none;"><div class="form-group" style="margin-top:15px;">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
             <input type="text" name="addlg" id="addlg" class="form-control" placeholder="Jaki?" value="<?php echo $addlg; ?>" maxlength="200" data-toggle="tooltip" data-placement="right"  title="Języki prosimy oddzielać przecinkami! "/>
                </div>
                <span class="text-danger"><?php echo $addlgError; ?></span>
            </div></div>
			</div>
			<script>$(function(){
   
    $('#other').click(function(){
	if (this.checked){
 $("#oder").show();
}
else {
$("#oder").hide();
}
    }); 
    
});</script>
			
		
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
		   <button type="button" style="margin-top: -10px;" id="podg" class="btn btn-link" <?php  $finde = 'tru'; $edc = strpos($er, $finde);  if ($edc === false) { } else { echo "disabled"; }?>>Zobacz pogląd</button>
             <button type="submit" class="btn btn-block btn-primary" name="btn-login" <?php  $finde = 'tru'; $edc = strpos($er, $finde);  if ($edc === false) { } else { echo "disabled"; }?>>Dodaj</button>
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
var a =  "good";
var b =  $("#title").val();
var c =  $("#cat").val();
var d =  $("#cat1").val();
var e =  $("#city").val();
var f =  $("#wym").val();
var g =  $("#desc").val();
var h = ($(':checkbox:checked').map(function() {
    return this.value;
}).get().join(', '));
var i =  $("#addlg").val();
var j = $("#typ").val();
		$.ajax({
     url: 'addajax.php', //This is the current doc
     type: "POST",
     dataType:'json', // add json datatype to get json
     data: ({a: a, b: b, c: c, d: d, e: e, f: f, g: g, h: h, i: i, j: j}),
     success: function(data){
	 if (data == 'true') {
popup('view.php')
}
	 },
	 error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!"); 
      }
});
})</script>			
        
        </div>
   
    </form>
    </div> 

</div>
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
					<a href="report">Zgłoś opinię/błąd</a>
					·
					<a href="premium">Premium</a>
					·
					<a href="contact">Kontakt</a>
				</p>

				<p>&copy; mrwork.pl - Wszelkie prawa zastrzeżone.</p>
			</div>

		</footer> </div>
		</div>
    
</body>
</html>
<?php ob_end_flush(); ?>