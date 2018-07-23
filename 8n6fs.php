<?php 
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$password = "3NB7HDNU9R";
 if ( isset($_POST['send']) ) {
   $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  if($pass === $password) {
  $il = trim($_POST['much']);
  $il = strip_tags($il);
  $il = htmlspecialchars($il);
  if(empty($il)){
  echo "Ale wpisz ilość...";
  }
  
  else {
$q = "select MAX(ID) from promo";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
$I = $data[0];
$ile = $il + $I;
$ID = $I+1;
  for($x=$ID;$x <= $ile; $x++) {
  $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789');
shuffle($seed); 
$rand = '';
foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
$d = "INSERT INTO promo (ID,rand) VALUES ('$x','$rand')";
$r = mysql_query($d);
if($r) {
echo $rand;
echo "<br>";
}
}
echo "Wrzucono";
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
<input style="margin-top:5px;" type="number" name="much" placeholder="Ile?"><br>
<button style="margin-top:5px;" type="submit" name="send">Wyślij</button></form></div></center>
</body>
</html>
<?php ob_end_flush(); ?>