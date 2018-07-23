<?php 
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$password = "LCD4JMVQ5A";
 if ( isset($_POST['send']) ) {
   $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  if($pass === $password) {
  if(!isset($_POST['zaw']) && !isset($_POST['odw'])){
  echo "Ale zaznacz coś";
  $error = true;
  }
     $il = trim($_POST['nazwa']);
  $il = strip_tags($il);
  $il = htmlspecialchars($il);
    if(empty($il)){
  echo "Ale wpisz nazwę";
  $error = true;
  }
    $pra=mysql_query("SELECT * FROM users WHERE userName='$il'");
$praRow=mysql_fetch_array($pra);
$pre = mysql_query($pra);

if(mysql_num_rows($pre) === 0)
{
$error = true;
echo "Użytkownik nie istnieje?";
}
if(!$error){
$pracek = $praRow['pracodawca'];
if(isset($_POST['zaw'])){
if($pracek === "1"){
$sql = ("UPDATE pradet SET ver=0 WHERE name='$il'");
	$res = mysql_query($sql);
}
else {
$sql = ("UPDATE userdet SET ver=0 WHERE name='$il'");
	$res = mysql_query($sql);
}
}
else if(isset($_POST['odw'])){
if($pracek === "1"){
$sql = ("UPDATE pradet SET ver=1 WHERE name='$il'");
	$res = mysql_query($sql);
}
else {
$sql = ("UPDATE userdet SET ver=1 WHERE name='$il'");
	$res = mysql_query($sql);
}
}
}
  else {
  echo "NIE :)";
  }
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>rand</title>
</head>
<body><center><div style="margin-top:20px;">
<form method="POST">
<input type="password" name="pass"><br>
<input style="margin-top:5px;" type="text" name="nazwa" placeholder="Nazwa"><br>
<label for="zaw">Zawieś</label><input type="radio" name="zaw" id="zaw">
<label for="odw">Odwieś</label><input type="radio" name="odw" id="odw">
<br>
<button style="margin-top:5px;" type="submit" name="send">Wyślij</button></form></div></center>
</body>
</html>
<?php ob_end_flush(); ?>