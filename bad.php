<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=bad");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 
if(isset($_POST['bat']) ) { 
if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
    	$user = $userRow['userName'];
	$ema = $userRow['userEmail'];
	
	$desc = trim($_POST['desc']);
	$desc = strip_tags($desc);
	$desc = htmlspecialchars($desc);
	$new = "Użytkownik nie dołączył obrazka";
	
	
	$errMSG = "Zgłoszenie wysłane poprawnie, dziękujemy!";
	$errStyle = "success";
$to = "admin@mrwork.pl";
$subject = "Zgłoszenie błędu na stronie mrwork.pl";
$txt = "Użytkownik: ".$user.PHP_EOL."Email: ".$ema.PHP_EOL."Wiadomość: ".$desc.PHP_EOL."Nazwa załączonego pliku: ".$new." ";
$headers = "From: admin@mrwork.pl" . "\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8";
mail($to,$subject,$txt,$headers);
}
else {
$filename  = basename($_FILES['fileToUpload']['name']);
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$new       = md5($filename).'.'.$extension;
$uploadOk = 1;
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $errMSG = "Nie udało się przesłać pliku! Plik jest zbyt duży ( >5mb)";
    $uploadOk = 0;
}
// Allow certain file formats
if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
&& $extension != "gif" ) {
    $errMSG = "Nie udało się przesłać pliku! Dostępne formaty to: jpg,png,jpeg,gif!";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
$errMSG = "Nie udało się przesłać pliku!";
$errStyle = "danger";
// wszystko ok, wrzuć plik -  plik pusty 
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "bledy/{$new}")) {
	$user = $userRow['userName'];
	$ema = $userRow['userEmail'];
	
	$desc = trim($_POST['desc']);
	$desc = strip_tags($desc);
	$desc = htmlspecialchars($desc);
	
	
	
	$errMSG = "Zgłoszenie wysłane poprawnie, dziękujemy!";
	$errStyle = "success";
$to = "admin@mrwork.pl";
$subject = "Zgłoszenie błędu na stronie mrwork.pl";
$txt = "Użytkownik: ".$user.PHP_EOL."Email: ".$ema.PHP_EOL."Wiadomość: ".$desc.PHP_EOL."Nazwa załączonego pliku: ".$new." ";
$headers = "From: admin@mrwork.pl" . "\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8";
mail($to,$subject,$txt,$headers);
    } else {
        $errMSG = "Nie udało się przesłać pliku";
	$errStyle = "danger";
    }
}
}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zgłoś błąd</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<script src='http://code.jquery.com/jquery-latest.min.js'></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body style="background-color:#71c6c1;">
<div class="cont">  
  <form id="contact" action="" method="post" enctype="multipart/form-data">
    <h3>Zgłoś błąd</h3>
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
    Screen błędu (opcjonalne, do 5MB)
    <input style="margin-top:8px;" type="file" name="fileToUpload" id="fileToUpload">
    </fieldset>
    <fieldset>
      <textarea name="desc" placeholder="Twoja wiadomość" required></textarea>
    </fieldset>
	<center><div class="g-recaptcha" style="margin-bottom: 5px; margin-top: 5px;" data-callback="recaptchaCallback" data-sitekey="6LfmhRQUAAAAAM2YStZNRsHBtuKuaTK7YSNd9mPn"></div></center>
    <fieldset>
      <button name="bat" type="submit" class="btn btn-block btn-primary" style="align: center; width:100%;" disabled>Wyślij</button>
    </fieldset>
    <p class="copyright">Praca dla młodych - <a href="http://mrwork.pl" target="_blank">mrwork.pl</a></p>
	<p class="copyright">Design <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a></p><p class="copyright">Powrót do <a href="home">strony głównej</a></p>
  </form>
  <script>function recaptchaCallback() {
    $('.btn').removeAttr('disabled');
}; </script>
</div>
</body>
<?php ob_end_flush(); ?>