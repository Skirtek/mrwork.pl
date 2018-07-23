<?php 
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$password = "MVKTJMHDYT";
 if ( isset($_POST['send']) ) {
   $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  if($pass === $password) {
   $il = trim($_POST['nazwa']);
  $il = strip_tags($il);
  $il = htmlspecialchars($il);
 $pra=mysql_query("SELECT * FROM users WHERE userName='$il'");
$praRow=mysql_fetch_array($pra);
$pre = mysql_query($pra);

if(mysql_num_rows($pre) === 0)
{
$error = true;
echo "Użytkownik nie istnieje";
}
if(empty($il)){
  echo "Ale wpisz nazwę";
  $error = true;
  }
$pra = $praRow['pracodawca'];
$mail = $praRow['userEmail'];
$_SESSION["mailo"] = $mail;
if(!$error) {
    mysql_query("SET NAMES utf8");
	$sql="DELETE FROM users WHERE userName='$il'";
	mysql_query($sql);
	$sq = "SET @count = 0";
	mysql_query($sq);
	$s = "UPDATE `users` SET `users`.`userId` = @count:= @count + 1";
	mysql_query($s);
	
		$d = "UPDATE `mess` SET `usunodb` = '1' WHERE `do`='$il'";
		$g = mysql_query($d);
		$t = "UPDATE `mess` SET `usunnad` = '1' WHERE `od`='$il'";
		$u = mysql_query($t);
				$sql = "SELECT * FROM mess WHERE usunodb=1 and usunnad=1";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$for = $row['rand'];
$ppp="DELETE FROM reply WHERE replyfor='$for'";
mysql_query($ppp);
$pp = "SET @count = 0";
mysql_query($pp);
$p = "UPDATE `reply` SET `reply`.`ID` = @count:= @count + 1";
mysql_query($p);
			}
$yyy="DELETE FROM mess WHERE usunodb=1 and usunnad=1";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `mess` SET `mess`.`ID` = @count:= @count + 1";
mysql_query($y);
 $pr = "SELECT name from premium where name='$il'";
$pre = mysql_query($pr);

if(mysql_num_rows($pre) > 0)
{
$opp="DELETE FROM premium WHERE name='$il'";
	mysql_query($opp);
	$ab = "SET @count = 0";
	mysql_query($op);
	$a = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
	mysql_query($o);
}
	if($s && $pra == 0){
	$abc="DELETE FROM userdet WHERE name='$il'";
	mysql_query($abc);
	$ab = "SET @count = 0";
	mysql_query($ab);
	$a = "UPDATE `userdet` SET `userdet`.`ID` = @count:= @count + 1";
	mysql_query($a);
	
	$tyu="DELETE FROM pomoc WHERE kto='$il'";
	mysql_query($tyu);
	$ty = "SET @count = 0";
	mysql_query($ty);
	$t = "UPDATE `pomoc` SET `pomoc`.`ID` = @count:= @count + 1";
	mysql_query($t);
	
	$gw=mysql_query("SELECT * FROM oceny");
$gwRow=mysql_fetch_array($gw);

	$jkl="DELETE FROM comment WHERE kto='$il'";
	mysql_query($jkl);
	$jk = "SET @count = 0";
	mysql_query($jk);
	$j = "UPDATE `comment` SET `comment`.`ID` = @count:= @count + 1";
	mysql_query($j);
	
	 			$sql = "SELECT * FROM comment WHERE kto='$il'";
            $results = mysql_query($sql);
			
			
            while($raw = mysql_fetch_array($results)) {
			$ar =  $raw['gwiazdki'];
			$komu =  $raw['komu'];
$stack[] = $ar;
$kom[] = $komu;
}
$komuu = array_unique($kom);
foreach ($komuu as $key => $value) {
    $arrayname[$key] = $value;
}
$le = max(array_keys($arrayname));
for($e = 0; $e <= $le; $e++){
 $name = "variable{$e}";
     $$name = $arrayname[$e];
	 $var = $arrayname[$e];
	mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM comment WHERE komu='$var'";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$ocena = $row['gwiazdki'];
			 $rate=mysql_query("SELECT * FROM oceny WHERE kto='$il'");
$rateRow=mysql_fetch_array($rate);
			if($ocena == 1) {
$il = $rateRow['1gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `1gw` = '$new' WHERE `kto`='$il'";
$rep = mysql_query($qw);
}
}
			if($ocena == 2) {
$il = $rateRow['2gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `2gw` = '$new' WHERE `kto`='$il'";
$rep = mysql_query($qw);
}
}
if($ocena == 3) {
$il = $rateRow['3gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `3gw` = '$new' WHERE `kto`='$il'";
$rep = mysql_query($qw);
}
}
if($ocena == 4) {
$il = $rateRow['4gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `4gw` = '$new' WHERE `kto`='$il'";
$rep = mysql_query($qw);
}
}
if($ocena == 5) {
$il = $rateRow['5gw'];
if ($il > 0) {
$new = $il-1;
$qw = "UPDATE `oceny` SET `5gw` = '$new' WHERE `kto`='$il'";
$rep = mysql_query($qw);
}
}
			}
}

	if($a && $t && $j) {
	$go = $_SESSION["mailo"];
		$to = $go;
$subject = "Twoje konto zostało usunięte.";
$txt = "Witaj! 
Z przykrością informujemy ,że Twoje konto zostało usunięte permanetnie z powodu naruszenia regulaminu.
Przypominamy, że było to już drugie poważne i uzasadnione dowodami naruszenie, które skutkuje właśnie usunięciem konta.
W razie jakichkolwiek wątpliwości prosimy o kontakt na adres kontakt@mrwork.pl.
Pozdrawiamy!
Zespół mrwork.pl
";
$headers = "From: admin@mrwork.pl" . "\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8";

$m = mail($to,$subject,$txt,$headers);
if($m) {
echo "Wysłano";
unset($_SESSION["mailo"]);
}
	}
	else {
	echo "Coś się ,coś się zepsuło...";
	}
	}
	else if($s && $pra == 1){
	$abc="DELETE FROM pradet WHERE name='$il'";
	mysql_query($abc);
	$ab = "SET @count = 0";
	mysql_query($ab);
	$a = "UPDATE `pradet` SET `pradet`.`ID` = @count:= @count + 1";
	mysql_query($a);

	$qtz="DELETE FROM oceny WHERE kto='$il'";
	mysql_query($qtz);
	$qt = "SET @count = 0";
	mysql_query($qt);
	$q = "UPDATE `oceny` SET `oceny`.`ID` = @count:= @count + 1";
	mysql_query($q);
	
	$xxx="DELETE FROM adv WHERE kto='$il'";
	mysql_query($xxx);
	$xx = "SET @count = 0";
	mysql_query($xx);
	$x = "UPDATE `adv` SET `adv`.`ID` = @count:= @count + 1";
	mysql_query($x);
	
	$qaza="DELETE FROM pomoc WHERE kto='$il'";
	mysql_query($qaza);
	$qaz = "SET @count = 0";
	mysql_query($qaz);
	$gaz = "UPDATE `pomoc` SET `pomoc`.`ID` = @count:= @count + 1";
	mysql_query($gaz);
	
	$haza="DELETE FROM comment WHERE komu='$il'";
	mysql_query($haza);
	$haz = "SET @count = 0";
	mysql_query($haz);
	$ha = "UPDATE `comment` SET `comment`.`ID` = @count:= @count + 1";
	mysql_query($ha);
	
	$laza="DELETE FROM comment WHERE kto='$il'";
	mysql_query($laza);
	$laz = "SET @count = 0";
	mysql_query($laz);
	$la = "UPDATE `comment` SET `comment`.`ID` = @count:= @count + 1";
	mysql_query($la);
	
	 
	
	
	if($a && $q && $x && $gaz && $ha && $la) {
	$go = $_SESSION["mailo"];
		$to = $go;
$subject = "Twoje konto zostało usunięte.";
$txt = "Witaj! 
Z przykrością informujemy ,że Twoje konto zostało usunięte permanetnie z powodu naruszenia regulaminu.
Przypominamy, że było to już drugie poważne i uzasadnione dowodami naruszenie, które skutkuje właśnie usunięciem konta.
W razie jakichkolwiek wątpliwości prosimy o kontakt na adres kontakt@mrwork.pl.
Pozdrawiamy!
Zespół mrwork.pl
";
$headers = "From: admin@mrwork.pl" . "\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8";

$m = mail($to,$subject,$txt,$headers);
if($m) {
echo "Wysłano";
unset($_SESSION["mailo"]);
}
	}
	else {
	echo "Coś się coś się zepsuło";
	}
	}
	else {
	echo "Coś się coś się zepsuło";
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