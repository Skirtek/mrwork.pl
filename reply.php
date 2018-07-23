<?php
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $text = $_POST['text'];
 $replyfor = $_POST['rand'];
 $one = "true";
 $two = "true";
 $nadawca = $_POST['nad']; 
 $do = $_POST['doom']; 
$wysl = date("d.m.Y,H:i:s");
$rand = substr(md5(microtime()),rand(0,26),10);

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
if($one === "false" &&  $two === "false"){
echo json_encode("ja");
}
else if($one === "false" && $two === "true") {
 echo json_encode("ja");
}
else if($two === "false" && $one === "true") {

 echo json_encode("mnie");
 
}

else if ($one === "true" && $two === "true") {
mysql_query("SET NAMES utf8");
$e = "select MAX(ID) from reply";
$re = mysql_query($e);
$da = mysql_fetch_array($re);
$IDER = $da[0];
$IDE = $IDER+1;
$text = mysql_real_escape_string($text);
$d = "INSERT INTO reply (ID,text,wyslano,replyfor,rand,kto,do) VALUES('$IDE','$text','$wysl','$replyfor','$rand','$nadawca','$do')";
   $g = mysql_query($d);
if($g)
  {
  $f = ("UPDATE mess SET przecz='0' WHERE rand='$replyfor'");
	$h = mysql_query($f);
	 $r = ("UPDATE mess SET przecznad='0' WHERE rand='$replyfor'");
	$a = mysql_query($r);
  if($a) { echo json_encode("true"); }
  else { echo json_encode("false"); }

  }
  else {
  echo json_encode("false");
  }
}
 



?>