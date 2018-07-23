<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=contact");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 
if(isset($_POST['bat']) ) { 
    $user = $userRow['userName'];
	$ema = $userRow['userEmail'];
	
	$desc = trim($_POST['desc']);
	$desc = strip_tags($desc);
	$desc = htmlspecialchars($desc);
	
	
	
$to = "kontakt@mrwork.pl";
$subject = "Wiadomość od użytkownika";
$txt = "Użytkownik: ".$user.PHP_EOL."Email: ".$ema.PHP_EOL."Wiadomość: ".$desc."";
$headers = "From: kontakt@mrwork.pl" . "\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8";
$m = mail($to,$subject,$txt,$headers);
if($m)
  {
    $errMSG = "Dziękujemy za kontakt, postaramy się odpowiedzieć jak najszybciej!";
	$errStyle = "success";
  }
  else
  {
   $errMSG = "Coś poszło nie tak :( Spróbuj jeszcze raz!";
	$errStyle = "danger";
  }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kontakt</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<script src='http://code.jquery.com/jquery-latest.min.js'></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: url('7.jpg') 0 0; background-size: cover; background-repeat: no-repeat;">
<div class="cont">  
  <form id="contact" action="" method="post" enctype="multipart/form-data">
    <h3>Skontaktuj się z nami</h3>
	<?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo $errStyle; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
    <fieldset>
      <input placeholder="Nazwa" type="text"  disabled value="<?php echo $userRow['userName'] ?>">
    </fieldset>
    <fieldset>
      <input id="dis" placeholder="Adres email" type="email" value="<?php echo $userRow['userEmail'] ?>" disabled>
    </fieldset>
    <fieldset>
      <textarea name="desc" placeholder="Twoja wiadomość" required></textarea>
    </fieldset>
	<center><div class="g-recaptcha" style="margin-bottom: 5px; margin-top: 5px;" data-callback="recaptchaCallback" data-sitekey="6LfmhRQUAAAAAM2YStZNRsHBtuKuaTK7YSNd9mPn"></div></center>
    <fieldset>
      <button name="bat" type="submit" class="btn btn-block btn-primary" style="align: center; width:100%;" disabled>Wyślij</button>
    </fieldset>
    
	<table style="width:100%; margin-top:15px;">
	<tr><td style="float: left;"><p class="copyright" >Praca dla młodych - <a href="http://mrwork.pl" target="_blank">mrwork.pl</a></p></td>
	<td style="float:right;"><a style="font-family: 'Inder', sans-serif; font-size:12px; color: #666" href="mailto:kontakt@mrwork.pl?subject=mrwork.pl"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;kontakt@mrwork.pl</td></tr>
	<tr><td style="float: left; margin-top:5px;"><p class="copyright">Design <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a></p></td>
	<td style="float:right; margin-top:5px;"><a style="font-family: 'Inder', sans-serif; font-size:12px; color: #666" href="https://www.facebook.com/Woorkerpl" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;Facebook</a></td></tr>
	<tr><td style="float: left; margin-top:5px;"><p class="copyright">Powrót do <a href="home">strony głównej</a></p></td>
	<td style="float:right; margin-top:5px; font-family: 'Inder', sans-serif; font-size:12px; color: #666">Made by Bartosz with <i class="fa fa-heart" aria-hidden="true"></i></td></tr>
	</table>
  </form>
  <script>function recaptchaCallback() {
    $('.btn').removeAttr('disabled');
}; </script>
</div>
</body>
<?php ob_end_flush(); ?>