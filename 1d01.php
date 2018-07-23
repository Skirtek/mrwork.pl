<?php 
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$password = "FO5C9HPSCM";
 if ( isset($_POST['send']) ) {
   $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  if($pass === $password) {
   $il = trim($_POST['nazwa']);
  $il = strip_tags($il);
  $il = htmlspecialchars($il);
  if(empty($il)){
  echo "Ale wpisz nazwę...";
  }
  else {
$pr = "SELECT name from premium where name='$il'";
$pre = mysql_query($pr);

if(mysql_num_rows($pre) > 0)
{
echo "Ma premium";
}

else {
echo "Nie ma premium";
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
<button style="margin-top:5px;" type="submit" name="send">Wyślij</button></form></div></center>
</body>
</html>
<?php ob_end_flush(); ?>