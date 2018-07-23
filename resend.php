<?php
 session_start();
 $email = $_SESSION['email'];
 $linkacz = $_SESSION['linkacz'];
 $name = $_SESSION['name'];

 $to = $email;
$subject = "Potwierdzenie rejestracji w serwisie mrwork.pl";
$txt = "Aby aktywować swoje konto w serwisie mrwork.pl kliknij poniższy link: ".$linkacz.PHP_EOL."Dane:".PHP_EOL."Użytkownik: ".$name.PHP_EOL."Email: ".$email.PHP_EOL."Hasło: Podane podczas rejestracji".PHP_EOL."Pozdrawiamy! Zespół mrwork.pl";
$headers = 'From: admin@mrwork.pl' . "\r\n" .
    'Content-Type: text/html; charset=UTF-8' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers.="Content-Type: text/plain; charset=UTF-8";
$m = mail($to,$subject,$txt,$headers);
if($m) {
unset($_SESSION['email']);
unset($_SESSION['linkacz']);
unset($_SESSION['name']);
echo json_encode("true");
}
else {
echo json_encode("false");
}
?>