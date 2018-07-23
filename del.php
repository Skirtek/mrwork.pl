<?php 
session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $rand = $_POST['id'];
 $ocena = $_POST['ocena'];
 $kto = $_POST['kto'];
  $rate=mysql_query("SELECT * FROM oceny WHERE kto='$kto'");
$rateRow=mysql_fetch_array($rate);
if($ocena == 1) {
$il = $rateRow['1gw'];
$new = $il-1;
$qw = "UPDATE `oceny` SET `1gw` = '$new' WHERE `kto`='$kto'";
$rep = mysql_query($qw);
}
if($ocena == 2) {
$il = $rateRow['2gw'];
$new = $il-1;
$qw = "UPDATE `oceny` SET `2gw` = '$new' WHERE `kto`='$kto'";
$rep = mysql_query($qw);
}
if($ocena == 3) {
$il = $rateRow['3gw'];
$new = $il-1;
$qw = "UPDATE `oceny` SET `3gw` = '$new' WHERE `kto`='$kto'";
$rep = mysql_query($qw);
}
if($ocena == 4) {
$il = $rateRow['4gw'];
$new = $il-1;
$qw = "UPDATE `oceny` SET `4gw` = '$new' WHERE `kto`='$kto'";
$rep = mysql_query($qw);
}
if($ocena == 5) {
$il = $rateRow['5gw'];
$new = $il-1;
$qw = "UPDATE `oceny` SET `5gw` = '$new' WHERE `kto`='$kto'";
$rep = mysql_query($qw);
}
 $sql="DELETE FROM comment WHERE rand='$rand'";
	mysql_query($sql);
	$sq = "SET @count = 0";
	mysql_query($sq);
	$s = "UPDATE `comment` SET `comment`.`ID` = @count:= @count + 1";
	mysql_query($s);

if($s && $rep){ echo json_encode("true"); }
 ?>