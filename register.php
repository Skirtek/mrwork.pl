<?php
 ob_start();
 session_start();
 header('content-type: text/html; charset=utf-8');
 if( isset($_SESSION['user'])!="" ){
  header("Location: home");
 }
 
 include_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $error = false;
	$server = $_SERVER['QUERY_STRING'];
 if (strpos($server, 'email=') !== false) {
 $str = str_replace("%40","@",$server);
 $string = substr($str,6);
 }
 
 if ( isset($_POST['btn-signup']) ) {
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  $uppercase = preg_match('@[A-Z]@', $pass);
 
 if (!isset($_POST['check1'])) {
  if (empty($name)) {
   $error = true;
   $nameError = "Wpisz swoją nazwę";
  }  
  else if (strlen($name) < 5) {
   $error = true;
   $nameError = "Nazwa musi zawierać przynajmniej 5 znaków!";
  } else if (!preg_match("/^[a-zA-Z0-9_.]+$/",$name)) {
   $error = true;
   $nameError = "Nazwa może zawierać tylko małe i duże litery, cyfry oraz znaki _ i . !";
  }
  else if (!empty($name)) {
   // check email exist or not
   $query = "SELECT userName FROM users WHERE userName='$name'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $nameError = "Podana nazwa jest już w użyciu!";
   }
  }
    
} else {
  if (empty($name)) {
   $error = true;
   $nameError = "Wpisz swoją nazwę";
  }  
  else if (strlen($name) < 5 && !isset($_POST['check1'])) {
   $error = true;
   $nameError = "Nazwa musi zawierać przynajmniej 5 znaków.";
  } 
  else if (!empty($name)) {
   // check email exist or not
   $query = "SELECT userName FROM users WHERE userName='$name'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $nameError = "Podana nazwa jest już w użyciu!";
   }
  }
   }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Wpisz prawidłowy adres email!";
  } else {
   // czy email istnieje czy nie
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Podany email jest już w użyciu!";
   }
  }
  // sprawdzenie hasła
  if (empty($pass)){
   $error = true;
   $passError = "Wpisz hasło.";
  } else if(!$uppercase || strlen($pass) < 6) {
   $error = true;
   $passError = "Hasło musi zawierać co najmniej 6 liter i przynajmniej 1 dużą literę";
  }
  
  // kodowanie hasła
  $salt = '&8nP36vg!Xy@Keb';
  $passw = hash('sha512',$pass);
  $password = md5($salt.$passw);
  
  $salty = '&e336ks1!Xyy@Kpz';
  $emaill = hash('sha256',$email);
  $mailhash = md5($salty.$emaill);
  // if there's no error, continue to signup
  if( !$error ) {
  if(!isset($_POST['check1'])){
  $pracodawca = "0";
mysql_query("SET NAMES utf8");
 $q = "select MAX(userId) from users";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
$I = $data[0];
$ID = $I+1;
 $e = "select MAX(ID) from userdet";
$re = mysql_query($e);
$da = mysql_fetch_array($re);
$IDER = $da[0];
$IDE = $IDER+1;
$ver = "0";
$pro = substr(md5(microtime()),rand(0,26),10);
   $query = "INSERT INTO users(userId,userName,userEmail,userPass,mailhash,pracodawca,profilehash) VALUES('$ID','$name','$email','$password','$mailhash','$pracodawca', '$pro')";
   $res = mysql_query($query);
   $d = "INSERT INTO userdet (ID,name,mailha,ver) VALUES('$IDE','$name','$mailhash','$ver')";
   $r = mysql_query($d);
    
   if ($r && $res) {
   $linkacz = "http://mrwork.pl/activate?mai=".$mailhash;
   $errTyp = "success";
   $errMSG = "Rejestracja przebiegła pomyślnie! Dokonaj weryfikacji poprzez kliknięcie linku w wysłanym emailu! (sprawdź folder SPAM) Jeżeli email nie dotrze w ciągu 5 minut kliknij <a style='font-weight:700' id='resend'>tutaj</a>."; 
   $to = $email;
$subject = "Potwierdzenie rejestracji w serwisie mrwork.pl";
$txt = "Aby aktywować swoje konto w serwisie mrwork.pl kliknij poniższy link: ".$linkacz.PHP_EOL."Dane:".PHP_EOL."Użytkownik: ".$name.PHP_EOL."Email: ".$email.PHP_EOL."Hasło: Podane podczas rejestracji".PHP_EOL."Pozdrawiamy! Zespół mrwork.pl";
$headers = 'From: admin@mrwork.pl' . "\r\n" .
    'Content-Type: text/html; charset=UTF-8' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers.="Content-Type: text/plain; charset=UTF-8";
mail($to,$subject,$txt,$headers);
$_SESSION["linkacz"] = $linkacz;
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Coś poszło nie tak, spróbuj ponownie!"; 
   } 
   } 
   else if (isset($_POST['check1'])) {
   $pracodawca = "1";
    $krs = $_POST['krs'];
   mysql_query("SET NAMES utf8");
 $q = "select MAX(userId) from users";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
$I = $data[0];
$ID = $I+1;
 $e = "select MAX(ID) from pradet";
$re = mysql_query($e);
$da = mysql_fetch_array($re);
$IDER = $da[0];
$IDE = $IDER+1;
 $u = "select MAX(ID) from oceny";
$ue = mysql_query($u);
$ux = mysql_fetch_array($ue);
$ui = $ux[0];
$uid = $ui+1;
$zero = "0";
$ver = "0";
$pro = substr(md5(microtime()),rand(0,26),10);
   $query = "INSERT INTO users(userId,userName,userEmail,userPass,mailhash,pracodawca,profilehash) VALUES('$ID','$name','$email','$password','$mailhash','$pracodawca','$pro')";
   $res = mysql_query($query);
   $d = "INSERT INTO pradet (ID,name,mailha,ver,krs,zweryfikowany) VALUES('$IDE','$name','$mailhash','$ver','$krs','$zero')";
   $r = mysql_query($d);
   $o = "INSERT INTO oceny (ID,kto,1gw,2gw,3gw,4gw,5gw) VALUES('$uid','$name','$zero','$zero','$zero','$zero','$zero')";
   $p = mysql_query($o);
    
   if ($p && $res && $r) {
   $linkacz = "http://mrwork.pl/activate?mail=".$mailhash;
   $errTyp = "success";
   $errMSG = "Rejestracja przebiegła pomyślnie! Dokonaj weryfikacji poprzez kliknięcie linku w wysłanym emailu! (sprawdź folder SPAM) Jeżeli email nie dotrze w ciągu 5 minut kliknij <a style='font-weight:700' id='resend'>tutaj</a>."; 
   $to = $email;
$subject = "Potwierdzenie rejestracji w serwisie mrwork.pl";
$txt = "Aby aktywować swoje konto w serwisie mrwork.pl kliknij poniższy link: ".$linkacz.PHP_EOL."Dane:".PHP_EOL."Użytkownik: ".$name.PHP_EOL."Email: ".$email.PHP_EOL."Hasło: Podane podczas rejestracji".PHP_EOL."Pozdrawiamy! Zespół mrwork.pl";
$headers = 'From: admin@mrwork.pl' . "\r\n" .
    'Content-Type: text/html; charset=UTF-8' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers.="Content-Type: text/plain; charset=UTF-8";
mail($to,$subject,$txt,$headers);
$_SESSION["linkacz"] = $linkacz;
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
    unset($name);
    unset($email);
    unset($pass);
	unset($krs);
   } else {
    $errTyp = "danger";
    $errMSG = "Coś poszło nie tak, spróbuj ponownie!"; 
   } 
   }
  }
  
  
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zarejestruj się!</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<script src='http://code.jquery.com/jquery-latest.min.js'></script>
<script src='assets/js/jquery.dotanimation.min.js'></script>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
html, 
body {
    min-height: 100%;
}
.uwaga {
color: #fff; font-family: Muli; font-weight: 700; display:none;
}
.nowy {  background-color: transparent;
    cursor: pointer;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-bottom: 1px solid;
    border-bottom-color: #f2f2f2;
	color:#fff;
	font-weight:600;
	font-family:Raleway;
	opacity:1;
	}
.nowy::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #fff;
  opacity:0.8;
}
.nowy:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color: #fff;
  opacity:0.8;
}
.nowy::-moz-placeholder { /* Mozilla Firefox 19+ */
  color: #fff;
  opacity:0.8;
}
.nowy:-ms-input-placeholder { /* Internet Explorer 10-11 */
     color: #fff;
  opacity:0.8;
}
.form-control:focus {
border-color:snow;
}
a {
color: #f4f4f4;
}
a:hover {
color: #fff;
}
.nowy[readonly] {
    background-color: #6c6c6c;
    opacity: 1;
    cursor: not-allowed;
}
.text-danger {
    color: #fff;
    font-family: Raleway;
    font-weight: 700;
}
label {
color: #010208;
font-family: Raleway;
}
.webfont_envelope:before {
opacity: 0.8;
left: 5px;
top: 6px;
}
.webfont_envelope input {
    text-indent: 12px;
}
.webfont_lock:before {
opacity: 0.8;
left: 5px;
top: 6px;
}
.webfont_lock input {
    text-indent: 12px;
}
.webfont_krs:before {
opacity: 0.8;
left: 5px;
top: 6px;
}
.webfont_krs input {
    text-indent: 12px;
}
.webfont_user:before {
opacity: 0.8;
left: 5px;
top: 6px;
}
.webfont_user input {
    text-indent: 12px;
}
.masz {
margin-right: 80px;
    font-size: 12px;
}
.maszdiv{
text-align:right;
}
@media (max-width: 600px) { 
.masz {
margin-right:0px;
}
.maszdiv{
text-align:center;
}
}
#resend {
color:#000;
}
#resend:hover {
color:#000;
cursor:pointer;
}
</style>
</head>
<body  style="background-image: url(images/rg.jpg); background-repeat: no-repeat; background-position: center center; background-attachment: fixed; background-size: cover; ">

<center><div class="container logoCont">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-6 col-md-offset-3">
        
         <div class="form-group">
             <h1 style=" font-family: Merriweather; color: #fff; ">Zarejestruj się!</h1>
            </div>
        
         <div class="form-group">
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
           <div style="display:none;" id="zlee" class="alert alert-danger alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Ups...</strong> Coś poszło nie tak,spróbuj ponownie :(
</div>
<div style="display:none" id="dobrzee" class="alert alert-success alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sukces!</strong> Link aktywacyjny został wysłany ponownie!
</div>
            <div class="form-group">
             <div class="input-group">
			 <label class="webfont_user" style="width: 100%;">
             <input type="text" name="name" id="nazwa" class="nowy form-control" placeholder="Nazwa" maxlength="80" value="<?php echo $name ?>" />
			 </label>
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
			 <label class="webfont_envelope" style="width: 100%;">
             <input type="email" name="email" class="nowy form-control" placeholder="Email" maxlength="40" value="<?php $server = $_SERVER['QUERY_STRING'];
 if (strpos($server, 'email=') !== false) {echo $string;} else {echo $email;} ?>" />
 </label>
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            <div class="form-group">
             <div class="input-group">
			 <label class="webfont_lock" style="width: 100%;">
             <input type="password" name="pass" onkeypress="capLock(event)"  class="nowy form-control" placeholder="Hasło" maxlength="20" />
			 </label>
                </div>
				<span class="text-danger uwaga"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Caps Lock jest włączony!</span>
                <span class="text-danger"><?php echo $passError; ?></span>
				<div class="maszdiv" style=" margin-top: -8px; "> <a href="login" class="masz">Masz już konto? Zaloguj się.</a></div>
				 <input type="checkbox" id="reg" /><label for="reg">&nbsp;Zapoznałem się i <a href="regulamin">akceptuję</a> regulamin serwisu mrwork.pl</label>
				 <br><input type="checkbox" id="button" name="check1" /><label for="button">&nbsp;Jestem pracodawcą</label>
            </div>
			<div id="empl" style="display: none;">
			<div class="form-group">
             <div class="input-group">
			 <label class="webfont_krs" style="width: 100%;">
             <input name="krs" id="krs" class="nowy form-control" placeholder="Numer KRS"  value="<?php echo $krs ?>" oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10" /></label>
                </div>
                <span class="text-danger"><?php echo $krsError; ?></span>
            </div>
<p id="ee" style="font-size:18px; color: #fff; font-family: Raleway; font-weight: 700;">Proszę czekać</p>
<p id="rr" style="font-size:18px; color: #fff; font-family: Raleway; font-weight: 700;">Błędny numer KRS!</p>
			</div>
			
			<center><div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfmhRQUAAAAAM2YStZNRsHBtuKuaTK7YSNd9mPn"></div></center>
			<script language="Javascript">
function capLock(e){
 kc = e.keyCode?e.keyCode:e.which;
 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk)){
  $(".uwaga").show(); }
  else {
  $(".uwaga").hide();
  }

}
</script>
			<script>
$('#ee').hide()	
 $('#rr').hide();		
var typingTimer;                
var doneTypingInterval = 1000;  //czas w milisekundach
 
//po naciśnięciu przycisku odliczaj
$('#krs').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#krs').val) {
        typingTimer = setTimeout(function(){
 $('#krs').blur();
 $('#ee').show();
  $('#rr').hide();
$(function () {  $el = $('#ee'); $el.dotAnimation({ speed: 450, dotElement: '.', numDots: 3 }); });
             var v = $("#krs").val();
			 
$.ajax({
     url: 'response.php', //This is the current doc
     type: "POST",
     dataType:'json', // add json datatype to get json
     data: ({v: v}),
     success: function(data){
	 if (data == 'false') {
       var re = "";
       $('#nazwa').val(re);
       $('#krs').val(re);
	   $('#ee').hide();
	   $('#rr').show();
}
else {
$('#nazwa').val(data);
$('#ee').hide()	
 $('#rr').hide();
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
<br> <script>$(function(){
   
    $('#button').click(function(){
	if (this.checked){
       $('#nazwa')
 .not(':button, :submit, :reset, :hidden')
 .val('')
 $("#nazwa").prop('readonly', true);
 $("#empl").show();
}
else {
$("#nazwa").prop('readonly', false);
$("#empl").hide();
}
    }); 
    
});</script>
<script>
$("#resend").click(function(event){
    event.preventDefault();
	$.ajax({
     url: 'resend.php', 
     type: "POST",
     dataType:'json', 
     success: function(data){
	 if (data == 'true') {
$("#zlee").hide();
$("#dobrzee").show();
}
else if(data == 'false') {
$("#zlee").show();
$("#dobrzee").hide();
}
	 },
	 error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!"); 
      }
});
});
</script>
            
            <div class="form-group">
             <button type="submit" style="display:none;" class="btn btn-block btn-success" name="btn-signup" disabled>Zarejestruj się!</button>
            </div>
            <script>
    $('#reg').click(function(){
	if (this.checked){
$('.btn').show();
}
else {
$('.btn').hide();
}
    }); 
			function recaptchaCallback() {
    $('.btn').removeAttr('disabled');
}; </script>
            
             

			
        
        </div>
   
    </form>
    </div> 

</div>

</body>
</html>
<?php ob_end_flush(); ?>