<?php 
session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $kogo = $_POST['eh'];
 $kto = $_POST['kto'];
 $uz=mysql_query("SELECT * FROM blocked WHERE kto='$kto'");
$uzRow=mysql_fetch_array($uz);
$old = $uzRow['kogo'];
$stare = ",".$kogo;
$staree = $kogo.",";
 if (strpos($old, $stare) !== false) { $new = str_replace($stare,"",$old); }
 else if (strpos($old, $staree) !== false) { $new = str_replace($staree,"",$old); }
 else {$new = str_replace($kogo,"",$old); }

 $qw1 = "UPDATE `blocked` SET `kogo` = '$new' WHERE `kto`='$kto'";
$rep = mysql_query($qw1);

if($rep){ echo json_encode("true"); }
 ?>