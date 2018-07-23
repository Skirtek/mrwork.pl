<?php
 session_start();
 include_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $ktore = $_POST['send'];
 
if($ktore) {
$findme   = ',';
$pos = strpos($ktore, $findme);
if ($pos === false) {
 $ktore = trim($ktore);
$jop = ("UPDATE mess SET przecz=1 WHERE rand='$ktore'");
$jo = mysql_query($jop);
if($jo){
echo json_encode("true");
}
else {
echo json_encode("false");
}
} else {
    $exp = (explode(",",$ktore));
	$wynik = count($exp);
	for($x=0;$x<= $wynik; $x++) {
	$inser = $exp[$x];
	$jop = ("UPDATE mess SET przecz=1 WHERE rand='$inser'");
	$jo = mysql_query($jop);
	}
	echo json_encode("true");
}
}
else {
echo json_encode("false");
}
?>