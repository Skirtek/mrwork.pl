<?php
session_start();
    $type = $_POST['aaa'];
	 $desc = $_POST['bbb'];
	 $user = $_POST['c'];
	 $zg = $_POST['d'];
	 $add = $_POST['add'];
	 if (strpos($type, '1') !== false) {
    $type = "Podszywanie się pod kogoś innego";
}
else if (strpos($type, '2') !== false) {
    $type = "Użytkownik mnie obraża";
}
else if (strpos($type, '3') !== false) {
    $type = "Nieprzyzwoita nazwa";
}
else if (strpos($type, '4') !== false) {
    $type = "Nieprzyzwoity język";
}
else if (strpos($type, '5') !== false) {
    $type = "Spam";
}
else if (strpos($type, '6') !== false) {
    $type = "Oszustwo";
}
else if (strpos($type, '7') !== false) {
    $type = "Inny";
}
	  date_default_timezone_set("Europe/Warsaw");
	$data = date("Y-m-d,G:i:s");
	$desc = strip_tags($desc);
	$desc = htmlspecialchars($desc);
	
	$to = "admin@mrwork.pl";
$subject = "Zgłoszenie użytkownika";
$txt = "Zgłaszający : ".$user.PHP_EOL."Data: ".$data.PHP_EOL."Zgłoszony: ".$zg.PHP_EOL."Powód: ".$type.PHP_EOL."Wiadomość: ".$desc.PHP_EOL."Cytat z wiadomości która jest podstawą zgłoszenia: ".$add." ";
$headers = "From: admin@mrwork.pl" . "\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8";
$mail = mail($to,$subject,$txt,$headers);

if($mail){ echo json_encode("true"); }
    
?>