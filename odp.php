<?php 
session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $rand = $_POST['p'];
 $tresc = $_POST['o'];
 $tresc = strip_tags($tresc);
$tresc = htmlspecialchars($tresc);
 $data = date("Y-m-d");
 mysql_query("SET NAMES utf8");
   $qw = "UPDATE `comment` SET `odpowiedz` = '$tresc', `kiedy` = '$data' WHERE `rand`='$rand'";
$rep = mysql_query($qw);

if($rep){ echo json_encode("true"); }
 ?>