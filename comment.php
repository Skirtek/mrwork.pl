<?php
session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
    $ocena = $_POST['z'];
	 $komentarz = $_POST['w'];
	 $kto = $_POST['y'];
	 $komu = $_POST['v'];
	 $rand = $_POST['x'];

	 $q = "select MAX(ID) from comment";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
$I = $data[0];
$ID = $I+1;
	$komentarz = strip_tags($komentarz);
	$komentarz = htmlspecialchars($komentarz);
	date_default_timezone_set("Europe/Warsaw");
	$data = date("Y-m-d");
	$rate=mysql_query("SELECT * FROM oceny WHERE kto='$komu'");
$rateRow=mysql_fetch_array($rate);
if($ocena == 1) {
$il = $rateRow['1gw'];
$new = $il+1;
$qw = "UPDATE `oceny` SET `1gw` = '$new' WHERE `kto`='$komu'";
$rep = mysql_query($qw);
}
else if($ocena == 2) {
$il = $rateRow['2gw'];
$new = $il+1;
$qw = "UPDATE `oceny` SET `2gw` = '$new' WHERE `kto`='$komu'";
$rep = mysql_query($qw);
}
else if($ocena == 3) {
$il = $rateRow['3gw'];
$new = $il+1;
$qw = "UPDATE `oceny` SET `3gw` = '$new' WHERE `kto`='$komu'";
$rep = mysql_query($qw);
}
else if($ocena == 4) {
$il = $rateRow['4gw'];
$new = $il+1;
$qw = "UPDATE `oceny` SET `4gw` = '$new' WHERE `kto`='$komu'";
$rep = mysql_query($qw);
}
else if($ocena == 5) {
$il = $rateRow['5gw'];
$new = $il+1;
$qw = "UPDATE `oceny` SET `5gw` = '$new' WHERE `kto`='$komu'";
$rep = mysql_query($qw);
}
mysql_query("SET NAMES utf8");
$komentarz = mysql_real_escape_string($komentarz);
$jeden = "1";
$query = "INSERT INTO comment(ID,komu,kto,tresc,gwiazdki,dodano,rand,nowy) VALUES('$ID','$komu','$kto','$komentarz','$ocena','$data','$rand','$jeden')";
   $res = mysql_query($query);
	  
	


if($res){ echo json_encode("true"); }
    
?>