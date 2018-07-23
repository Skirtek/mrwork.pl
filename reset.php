<?php
if(isset($_POST['submit']))
{ 
 mysql_connect('mysql.cba.pl','Skirtek','Polonia1920!') or die(mysql_error());
 mysql_select_db('mrrandom_cba_pl') or die(mysql_error());
 $mail=$_POST['userEmail'];
 $q=mysql_query("select mailhash,userEmail from users where userEmail='".$mail."' ") or die(mysql_error());
 $p=mysql_affected_rows();

 if($p!=0) 
 {

    
  $res=mysql_fetch_array($q);
  $to=$res['userEmail'];
$subject = 'Przypomnienie hasła';
$message = 'Została uruchomiona procedura zmiany zapomnianego hasła.'.PHP_EOL.'Link do zmiany: http://mrwork.pl/restore?name='.$res['mailhash'].PHP_EOL.'Wiadomość wygenerowana automatycznie, proszę nie odpowiadać!';
$headers = 'From: admin@mrwork.pl' . "\r\n" .
    'Reply-To: admin@mrwork.pl' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers.="Content-Type: text/plain; charset=UTF-8";
$m=mail($to, $subject, $message, $headers);
  if($m)
  {
    $success ='Sprawdź skrzynkę email!';
	$style ="hidden";
  }
  else
  {
   $text = 'Mail nie został wysłany';
   $style = "visible";
  }
 }
 else
 {
  $text = 'Wpisany email nie jest zarejestrowany na naszej stronie!';
  $style = "visible";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='http://code.jquery.com/jquery-latest.min.js'></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Przywracanie hasła</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>

<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body style="background-color:#F0F0F0;">

<center><div class="container logoCont">

 <div id="login-form">
    <form method="post" action="#">
    
     <div class="col-md-6 col-md-offset-3">
        
         <div class="form-group">
             <h2 class="">
			 <?php if($m) {  echo $success; echo "<br>"; echo "<a href='login' style='font-size:18px;'>Wróć do strony logowania</a>";}
			 else { echo "Przywróć hasło";} ?></h2>
            </div>
 
            

 <div style="visibility:<?php echo $style;?>;">           

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="text" name="userEmail" class="form-control" placeholder="Email:" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $text;?></span>
            </div>
			<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfmhRQUAAAAAM2YStZNRsHBtuKuaTK7YSNd9mPn"></div>
            <br>
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="submit" disabled>Wyślij</button>
            </div>
<script>function recaptchaCallback() {
    $('.btn').removeAttr('disabled');
}; </script>
			
        </div>
        </div>
   </form>
    </form>
    </div> 

</div>

</body>
</html>