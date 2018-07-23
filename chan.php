<?php
require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$server = $_SERVER['QUERY_STRING'];
$pieces = explode("?", $server);
$ol = $pieces[0];
$new = $pieces[1];
$prac = $pieces[2];
$old = substr($ol, 4);

$res=mysql_query("SELECT * FROM users WHERE userEmail='$old'");
 $userRow=mysql_fetch_array($res);
 $nam = $userRow['userName']; 
$findme = 'YpKZQ';
$pos = strpos($prac, $findme);
 
 $old= strip_tags($old);
  $old = htmlspecialchars($old);
 
 $new = strip_tags($new);
  $new = htmlspecialchars($new);
 
 $salty = '&e336ks1!Xyy@Kpz';
  $emaill = hash('sha256',$new);
  $mailhash = md5($salty.$emaill);
 
 if ($pos === true){
  $sql = ("UPDATE users SET userEmail='$new' WHERE userEmail='$old'");
  $res = mysql_query($sql);
  $sq = ("UPDATE users SET mailhash='$mailhash' WHERE userEmail='$new'");
  $re = mysql_query($sq);
  $s = ("UPDATE pradet SET mailha='$mailhash' WHERE name='$nam'");
  $r = mysql_query($s);
  if($r) {
  $errMSG = "Adres email został zmieniony!";
	$errStyle = "alert-success";
  }
  else {
  $errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
  }
  }
  
  else {
  $sql = ("UPDATE users SET userEmail='$new' WHERE userEmail='$old'");
  $res = mysql_query($sql);
  $sq = ("UPDATE users SET mailhash='$mailhash' WHERE userEmail='$new'");
  $re = mysql_query($sq);
  $s = ("UPDATE userdet SET mailha='$mailhash' WHERE name='$nam'");
  $r = mysql_query($s);
  if($r) {
  $errMSG = "Adres email został zmieniony!";
	$errStyle = "alert-success";
  }
  else {
  $errMSG = "Wystąpił błąd,spróbuj jeszcze raz.";
	$errStyle = "alert-danger";
  }
  } ?>
  <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Zmiana adresu email</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>

  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  
  
</head>
<body>
<center><div class="container-fluid">
<div class="col-md-6 col-md-offset-3" style="margin-top:5%;">
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
   ?><br><div class="cl-effect-1">
  <a href="login" style="text-decoration: none ;font-weight: bold; font-size:30px; color: #000;">Powrót do strony głównej</a></div></div></div></center>
</body>
</html>