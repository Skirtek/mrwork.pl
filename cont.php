<?php
session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
    $tresc = $_POST['z'];
	 $email = $_POST['w'];
	 $name = $_POST['y'];

	$tresc = strip_tags($tresc);
	$tresc = htmlspecialchars($tresc);
	
	$name = strip_tags($name);
	$name = htmlspecialchars($name);
	
	$email = strip_tags($email);
	$email = htmlspecialchars($email);
	
	$to = "kontakt@mrwork.pl";
$subject = "Wiadomość od użytkownika";
$txt = "Temat: ".$name.PHP_EOL."Email: ".$email.PHP_EOL."Wiadomość: ".$tresc."";
$headers = "From: kontakt@mrwork.pl" . "\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8";

$m = mail($to,$subject,$txt,$headers);
if($m)
  {
echo json_encode("true");
  }
    
?>