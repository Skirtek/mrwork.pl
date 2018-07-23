<?php
	require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
	$one = "true";
	$two = "true";
	$three = "true";
	$four = "true";
  $do = $_POST['doo']; 
   $temat = $_POST['thema']; 
    $wiadomosc = $_POST['wiad']; 
	 $nadawca = $_POST['nadawca']; 
	 $wysl = date("d.m.Y,H:i:s");
	 $przecz = "0";
	 $pro = substr(md5(microtime()),rand(0,26),10);
	 if($nadawca === $do) {
	 $three = "false";
	 echo json_encode("sam");
	 }
	 $bl=mysql_query("SELECT * FROM blocked WHERE kto='$nadawca'");
$blRow=mysql_fetch_array($bl);
$who = $blRow['kogo'];
if (strpos($who, $do) !== false) {
  
  $one = "false";
}

	 $ble=mysql_query("SELECT * FROM blocked WHERE kto='$do'");
$bleRow=mysql_fetch_array($ble);
$whoo = $bleRow['kogo'];
if (strpos($whoo, $nadawca) !== false) {
   $two = "false";
   
}
if($one === "false" && $two === "true"){
echo json_encode("ja");
}
if($one === "true" && $two === "false"){
echo json_encode("mnie");
}
if($one === "false" && $two === "false") {
$four = "false";
echo json_encode("ja");
}
if ($one === "true" && $two === "true" && $three === "true" && $four === "true" ) {
mysql_query("SET NAMES utf8");
	 $e = "select MAX(ID) from mess";
$re = mysql_query($e);
$da = mysql_fetch_array($re);
$IDER = $da[0];
$IDE = $IDER+1;
$temat = mysql_real_escape_string($temat);
$wiadomosc = mysql_real_escape_string($wiadomosc);
	$d = "INSERT INTO mess (ID,od,do,temat,wyslano,wiad,przecz,rand) VALUES('$IDE','$nadawca','$do','$temat','$wysl','$wiadomosc','$przecz','$pro')";
   $g = mysql_query($d);
if($g)
  {
echo json_encode("true");
  }
  }
?>