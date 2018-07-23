<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';

 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home");
  exit;
 }
 if($_SESSION['email'] || $_SESSION['name'] || $_SESSION['linkacz']) {
 unset($_SESSION['email']);
unset($_SESSION['linkacz']);
unset($_SESSION['name']);
 }
 $a = $_SERVER['QUERY_STRING'];
if (strpos($a, 'good') !== false) {
    $errStyle = "alert-success";
    $errMSG = "Konto zostało usunięte. Dziękujemy za korzystanie z portalu mrwork.pl!";
}
else if (strpos($a, 'cha') !== false) {
    $errStyle = "alert-success";
    $errMSG = "Hasło zostało zmienione!";
}
 $error = false;
 if(!isset($_COOKIE["user"])) {
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Wpisz poprawny adres email.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Wpisz poprawny adres email.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Wpisz hasło.";
  }
  $salty = '&e336ks1!Xyy@Kpz';
  $emaill = hash('sha256',$email);
  $mailha = md5($salty.$emaill);
   $res=mysql_query("SELECT * FROM userdet WHERE mailha='$mailha'");
   $u=mysql_fetch_array($res);
   $re = $u['ver'];
   $abc=mysql_query("SELECT * FROM pradet WHERE mailha='$mailha'");
   $ab=mysql_fetch_array($abc);
   $a = $ab['ver'];
if (strpos($re,'0') !== false || strpos($a,'0') !== false) {
    $error = true;
  $errMSG = "Twoje konto nie zostało zweryfikowane!";
  $errStyle = "alert-danger";
}
  // if there's no error, continue to login
  if (!$error) {
   
  $salt = '&8nP36vg!Xy@Keb';
  $passw = hash('sha512',$pass);
  $password = md5($salt.$passw);
  
   $res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
	if(isset($_POST['remember']) && 
   $_POST['remember'] == '1') 
{
    	$cookie_name = "user";
$cookie_value = $email . "," . $password;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}
if(trim($_POST['ratownik']) == '')
{
   $url = "home";
}
else {
$url = $_POST['ratownik'];
}

    header("Location:".$url);
   } else {
   $errStyle = "alert-danger";
    $errMSG = "Niepoprawny adres email lub hasło. Spróbuj ponownie!";
   }
    
  }
  
 }
 } 
 else {
 $valju = $_COOKIE["user"];
	$pieces = explode(",", $valju);
$nazwa = $pieces[0];
$haslo = $pieces[1];
$res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$nazwa'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$haslo ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home");
   } 
    else {
	$errStyle = "alert-danger";
    $errMSG = "Niepoprawny adres email lub hasło. Spróbuj ponownie!";
   }

}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zaloguj się!</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<script src='http://code.jquery.com/jquery-latest.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
.uwaga {
color: #fff; font-family: Muli; font-weight: 700; display:none;
}
html, 
body {
    min-height: 100%;
}
</style>
</head>
<body style="background-image: url(images/testing.jpg); background-repeat: no-repeat; background-position: center center; background-attachment: fixed; background-size: cover; ">
<center><div class="container logoCont">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    <input type="hidden" name="ratownik" value="<?php echo $_GET["continue"]; ?> "/>
     <div class="col-md-6 col-md-offset-3">
        
         <div class="form-group">
             <h1 style="color:white; font-family: Merriweather;">Zaloguj się!</h1>
            </div>
        
         <div class="form-group">
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
			 <label class="webfont_envelope" style="width: 100%;">
             <input type="email" name="email" class="form-control" placeholder="Email:" value="<?php echo $email; ?>" maxlength="40" style="font-family: Muli; color: white;border-radius: 20px; background: rgba(0,0,0,0.2);" />
                </div>
				</label>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group" style="margin-top:-10px;">
			<label class="webfont_lock" style="width: 100%;">
             <input type="password" name="pass" class="form-control" onkeypress="capLock(event)" data-trigger="manual" data-placement="bottom" title="Caps Lock jest włączony!" placeholder="Hasło:" maxlength="20" autocomplete="off" style="font-family: Muli; color: white;border-radius: 20px; background: rgba(0,0,0,0.2);" />
                </label>
				</div>
				<span class="text-danger uwaga"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Caps Lock jest włączony!</span>
                <span class="text-danger"><?php echo $passError; ?></span>
				<a href="reset" style="float: right;text-decoration: none;margin-right: 90px;font-size: 12px;color: #f8f8f8;margin-top: -6px; font-family: Merriweather;">Zapomniałeś hasła?</a><br>
            </div>
			<div class="form-group">
				<input type="checkbox" id="check"  name="remember" value="1">
				<label for="check" style=" color: white; font-family: Merriweather; font-weight: normal;" >Zapamiętaj logowanie</label>
			</div>
            
            <div class="form-group">
			 <center><button type="submit" name="btn-login" class="byd">Zaloguj się!</button></center>
            </div>
             <a href="register" style=" color: #f8f8f8; font-family: Merriweather; ">Nie masz konta? Zarejestruj się tutaj!</a>		 
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
        </div>
   
    </form>
    </div> 

</div>

</body>
</html>
<?php ob_end_flush(); ?>