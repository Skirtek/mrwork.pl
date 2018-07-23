<?php
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $rand = $_POST['pinc'];
 $miej = $_POST['miejsce'];
 $x = $_POST['x'];
 

if($miej === "odb") {  
if ($x === "1") {
$random = trim($rand);
	 $d = "UPDATE `mess` SET `ulubodb` = '0' WHERE `rand`='$random'";
$g = mysql_query($d);
if($g) {
echo json_encode("usun");
}
else {
echo json_encode("false");
}
}
else {
$random = trim($rand);
	 $d = "UPDATE `mess` SET `ulubodb` = '1' WHERE `rand`='$random'";
$g = mysql_query($d);
if($g) {
echo json_encode("dodano");
}
else {
echo json_encode("false");
}
}
}


if($miej === "nad") {  
if ($x === "1") {
$random = trim($rand);
	 $d = "UPDATE `mess` SET `ulubnad` = '0' WHERE `rand`='$random'";
$g = mysql_query($d);
if($g) {
echo json_encode("usun");
}
else {
echo json_encode("false");
}
}
else {
$random = trim($rand);
	 $d = "UPDATE `mess` SET `ulubnad` = '1' WHERE `rand`='$random'";
$g = mysql_query($d);
if($g) {
echo json_encode("dodano");
}
else {
echo json_encode("false");
}
}
}


?>