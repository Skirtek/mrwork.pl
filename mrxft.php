<?php 
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$password = "JPYEDQ2VMX";
 if ( isset($_POST['send']) ) {
   $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  if($pass === $password) {
   $il = trim($_POST['nazwa']);
  $il = strip_tags($il);
  $il = htmlspecialchars($il);
 if(empty($il)){
 echo "Ale wpisz email...";
 }
 else {
 $res=mysql_query("SELECT * FROM users WHERE userEmail='$il'");
 $userRow=mysql_fetch_array($res);
 $prac = $userRow['pracodawca'];
 $nazwa = $userRow['userName'];
 if($prac === "1"){
     mysql_query("SET NAMES utf8");
	$sql="DELETE FROM users WHERE userEmail='$il'";
	mysql_query($sql);
	$sq = "SET @count = 0";
	mysql_query($sq);
	$s = "UPDATE `users` SET `users`.`userId` = @count:= @count + 1";
	mysql_query($s);
$yyy="DELETE FROM pradet WHERE name='$nazwa' ";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `pradet` SET `pradet`.`ID` = @count:= @count + 1";
mysql_query($y);
$opp="DELETE FROM oceny WHERE kto='$nazwa'";
	mysql_query($opp);
	$ab = "SET @count = 0";
	mysql_query($op);
	$a = "UPDATE `oceny` SET `oceny`.`ID` = @count:= @count + 1";
	mysql_query($o);
if($y && $o && $s) {
echo "Usunięto";
}	
}
else {
mysql_query("SET NAMES utf8");
	$sql="DELETE FROM users WHERE userEmail='$il'";
	mysql_query($sql);
	$sq = "SET @count = 0";
	mysql_query($sq);
	$s = "UPDATE `users` SET `users`.`userId` = @count:= @count + 1";
	mysql_query($s);
$yyy="DELETE FROM userdet WHERE name='$nazwa' ";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `userdet` SET `userdet`.`ID` = @count:= @count + 1";
mysql_query($y);
if($y && $s) {
echo "Usunięto";
}
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
<input style="margin-top:5px;" type="text" name="nazwa" placeholder="Email"><br>
<h3 style="color:#cc0000;">UWAGA! SKRYPT DZIAŁA TYLKO PRZY USUWANIU NIEAKTYWANEGO KONTA, NA KTÓRYM NIE BYŁY WYKONANE ŻADNE AKTYWNOŚCI</h3>
<button style="margin-top:5px;" type="submit" name="send">Wyślij</button></form></div></center>
</body>
</html>
<?php ob_end_flush(); ?>