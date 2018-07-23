<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=mine");
  exit;
 }


 // select loggedin users detail
 mysql_query("SET NAMES utf8");
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $end = $_SESSION["end"];
 unset($_SESSION['end']);
 $ran = $_SESSION["rand"];
 $adv=mysql_query("SELECT * FROM adv WHERE rand='$ran'");
 if($adv === FALSE) { 
    echo mysql_error();
}
$advRow=mysql_fetch_array($adv);
$title = $advRow['title'];
$wym = $advRow['wym'];
$cityOption = $advRow['cityOption'];
$addlg = $advRow['jezyk'];
$addlg = str_replace('angielski', '', $addlg);
$addlg = str_replace('niemiecki', '', $addlg);
$addlg = str_replace('francuski', '', $addlg);
$addlg = str_replace('hiszpański', '', $addlg);
$addlg = str_replace('rosyjski', '', $addlg);
$addlg = str_replace(',', '', $addlg);
$var1 = $advRow['kto'];
$var2 = $userRow['userName'];
 if (strcmp($var1, $var2) == 0) { 
	$error = false;
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
	
	$catOption = $_POST['cat'];
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
 if (strpos($catOption, 'kat') !== false) {
  $error = true;
  $catError = "Wybierz kategorię!";
  }
  if (strpos($cat1Option, 'for') !== false) {
  $error = true;
  $cat1Error = "Wybierz formę zatrudnienia!";
  }
 if (empty($cityOption)) {
   $error = true;
   $cityError = "Wpisz adres!";
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
$query = "UPDATE `adv` SET `title` = '$title',`wym` = '$wym',`opis` = '$desc',`catOption` = '$catOption',`cat1Option` = '$cat1Option',`cityOption` = '$cityOption',`typ` = '$typ',`jezyk` = '$jezyk' WHERE `rand`='$ran'";
   $res = mysql_query($query);
   
   if ($res) {
    unset($title);
    unset($catOption);
    unset($cat1Option);
	unset($cityOption);
    unset($wym);
    unset($desc);
	unset($_SESSION['rand']);
	$title = "";
	$wym = "";
	$desc = "";
    $errMSG = "Ogłoszenie zostało zedytowane!"; 
	$errStyle = "alert-success";
	
   } else {
    $errTyp = "danger";
    $errMSG = "Coś poszło nie tak, spróbuj ponownie!"; 
	$errStyle = "alert-danger";
   } 
}


	}
}
else if (strcmp($var1, $var2) !== 0) {
    header("Location: login");
  exit;
}
$nazwa = $userRow['userName'];
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
<title>Edytuj ogłoszenie</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/css/bootstrap-select.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/js/bootstrap-select.min.js"></script>
   <script src="http://maps.google.com/maps/api/js?key=AIzaSyCM_QyIy1IwRbKBZ5_me2e_wq5ry_fHZAI&libraries=places"></script>
</head>
<body>
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
             <h1 class="">Edytuj ogłoszenie!</h1>
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
             <input type="text" name="title" id="title" class="form-control" placeholder="Tytuł" value="<?php echo $title ?>" maxlength="80" />
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
         <script>
  $(function(){

	// Set desired text 
  var optionToSet = <?php echo json_encode($advRow['catOption']); ?>;
  
	$("#cat option").filter(function(){
  	// Get the option by its text
  	var hasText = $.trim($(this).text()) ==  optionToSet;
    if(hasText){
      // Set the "selected" value of the <select>.
      $("#cat").val($(this).val());
      // Force a refresh.
      $("#cat").selectpicker('refresh')
    }
	}).prop('selected', true);

});
</script> 

			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-list"></span></span>
             <select id="cat" name="cat" class="form-control selectpicker" >
      <option value="kat" >Wybierz kategorię</option>
	  <option value="Florystyka">Florystyka</option>
	  <option value="IT" >IT</option>
	  <option value="Ulotki" >Ulotki</option></select>
                </div>
                <span class="text-danger"><?php echo $catError; ?></span>
            </div>
	<script>
  $(function(){

	// Set desired text 
  var optionToSet = <?php echo json_encode($advRow['cat1Option']); ?>;
  
	$("#cat1 option").filter(function(){
  	// Get the option by its text
  	var hasText = $.trim($(this).text()) ==  optionToSet;
    if(hasText){
      // Set the "selected" value of the <select>.
      $("#cat1").val($(this).val());
      // Force a refresh.
      $("#cat1").selectpicker('refresh')
    }
	}).prop('selected', true);

});
</script>	
<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-list"></span></span>
             <select name="typ" id="typ"  class="form-control selectpicker" >
      <option value="typ" >Typ umowy</option>
	  <option value="Umowa o pracę" >Umowa o pracę</option>
	  <option value="Umowa zlecenie" >Umowa zlecenie</option></select>
                </div>
                <span class="text-danger"><?php echo $typError; ?></span>
            </div>	 
			<script>
  $(function(){

	// Set desired text 
  var optionToSet = <?php echo json_encode($advRow['typ']); ?>;
  
	$("#typ option").filter(function(){
  	// Get the option by its text
  	var hasText = $.trim($(this).text()) ==  optionToSet;
    if(hasText){
      // Set the "selected" value of the <select>.
      $("#typ").val($(this).val());
      // Force a refresh.
      $("#typ").selectpicker('refresh')
    }
	}).prop('selected', true);

});
</script>	
			 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-list"></span></span>
             <select id="cat1" name="cat1" class="form-control selectpicker" >
      <option value="for" >Forma zatrudnienia</option>
	  <option value="Pełen etat" >Pełen etat</option>
	  <option value="Praca czasowa" >Praca czasowa</option>
	  <option value="Praktyka/staż" >Praktyka/staż</option></select>
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
             <input type="text" name="wym" id="wym" class="form-control" placeholder="Dodatkowe wymagania" value="<?php echo $wym ?>" data-toggle="tooltip" data-placement="right" title="Wymagania prosimy oddzielać przecinkami!" />
                </div>
                <span class="text-danger"><?php echo $wymError; ?></span>
            </div>
			
	<script></script>		
			<div class="form-group">
                        <label class="control-label">Wymagany język:</label><br>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="angielski" <?php if (strpos($advRow['jezyk'], 'angielski') !== false) { echo 'checked'; }?>>Angielski</label>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="niemiecki" <?php if (strpos($advRow['jezyk'], 'niemiecki') !== false) { echo 'checked'; }?>>Niemiecki</label>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="hiszpański"<?php if (strpos($advRow['jezyk'], 'hiszpański') !== false) { echo 'checked'; }?>>Hiszpański</label><br>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="francuski" <?php if (strpos($advRow['jezyk'], 'francuski') !== false) { echo 'checked'; }?>>Francuski</label>
<label class="checkbox-inline"><input type="checkbox" name="jezyk[]" value="rosyjski" <?php if (strpos($advRow['jezyk'], 'rosyjski') !== false) { echo 'checked'; }?>>Rosyjski</label>
<label class="checkbox-inline"><input type="checkbox" name="other" id="other" <?php if (!empty($addlg)) { echo 'checked'; } ?>>Inny</label>
<div id="oder" style="display:<?php if (!empty($addlg)) { echo 'initial'; } else { echo 'none';}?>;"><div class="form-group" style="margin-top:15px;">
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
<textarea style="width: 85%;" class="form-control"  rows="6" name="desc" id="desc" placeholder="Opis" maxlength="500" data-toggle="tooltip" data-placement="right" title="Uwaga! Chrome ma problem z rozpoznawaniem enterów. Przy użyciu entera liczba pozostałych znaków może się różnić od prawdziwej! "><?php echo $advRow['opis']; ?></textarea>
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
		   		   <button type="button" style="margin-top: -10px;" id="podg" class="btn btn-link">Zobacz pogląd</button>
             <button type="submit" class="btn btn-block btn-primary" name="btn-login">Edytuj</button>
			 <div class="btn-group btn-group-justified" style="margin-top: 5px; width:70%;">
			  <a href="home" class="btn btn-danger">Strona główna</a>
  <a href="offer?ran=<?php echo $ran; ?>" class="btn btn-danger">Przejdź do ogłoszenia</a>
 </div>
			 
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
		</div>
    
</body>
</html>
<?php ob_end_flush(); ?>