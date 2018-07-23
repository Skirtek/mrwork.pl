<?php
session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
    $kto = $_POST['kto'];
	 $kogo = $_POST['kogo'];
  $query = "SELECT kto FROM blocked WHERE kto='$kto'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
   $r=mysql_query("SELECT * FROM blocked WHERE kto='$kto'");
$rRow=mysql_fetch_array($r);
$bylo = $rRow['kogo'];
if(empty($bylo)){
$kog = $kogo;
	$d = "UPDATE `blocked` SET `kogo` = '$kog' WHERE `kto`='$kto'";
$g = mysql_query($d);
}
else {
$kog = $bylo.",".$kogo;
	$d = "UPDATE `blocked` SET `kogo` = '$kog' WHERE `kto`='$kto'";
$g = mysql_query($d);
}
   }
	else {
$e = "select MAX(ID) from blocked";
$re = mysql_query($e);
$da = mysql_fetch_array($re);
$IDER = $da[0];
$IDE = $IDER+1;
	$d = "INSERT INTO blocked (ID,kto,kogo) VALUES('$IDE','$kto','$kogo')";
   $g = mysql_query($d);
	}

if($g)
  {
echo json_encode("true");
  }
  else {
  
  }
    
?>