<?php 
session_start();
 header('Content-Type: application/json; charset=utf-8');
$string = $_POST['v'];
$json_url = "https://api-v3.mojepanstwo.pl/dane/krs_podmioty.json?conditions[krs_podmioty.krs]=".$string;
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);
$var = print_r($data, true);
$pieces = explode("[krs_podmioty.nazwa_skrocona] => ", $var);
$varr = $pieces[1];
$piece = explode("[krs_podmioty.liczba_oddzialow", $varr);
$varrr = $piece[0];
$varrrr = str_replace('"', "", $varrr);
$varrrrr = str_replace("'", "", $varrrr);

if (empty($varrrrr)) {
echo json_encode("false");
}
else {
echo json_encode($varrrrr);
}

?> 