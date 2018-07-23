<?php
 session_start();
 include_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $ktore = $_POST['usun'];
 $miejsce = $_POST['miej'];
 
if($ktore) {
if($miejsce === "odb") {
$findme   = ',';
$pos = strpos($ktore, $findme);
if ($pos === false) {
 $ktore = trim($ktore);
$jop = ("UPDATE mess SET usunodb=1 WHERE rand='$ktore'");
$jo = mysql_query($jop);
if($jo){
			$sql = "SELECT * FROM mess WHERE usunodb=1 and usunnad=1";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$for = $row['rand'];
$ppp="DELETE FROM reply WHERE replyfor='$for'";
mysql_query($ppp);
$pp = "SET @count = 0";
mysql_query($pp);
$p = "UPDATE `reply` SET `reply`.`ID` = @count:= @count + 1";
mysql_query($p);
			}
$yyy="DELETE FROM mess WHERE usunodb=1 and usunnad=1";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `mess` SET `mess`.`ID` = @count:= @count + 1";
mysql_query($y);
if($y){
echo json_encode("true");
}
else {
echo json_encode("false");
}
}
else {
echo json_encode("false");
}
} else {
    $exp = (explode(",",$ktore));
	$wynik = count($exp);
	for($x=0;$x<= $wynik; $x++) {
	$inser = $exp[$x];
	$jop = ("UPDATE mess SET usunodb=1 WHERE rand='$inser'");
	$jo = mysql_query($jop);
	}
				$sql = "SELECT * FROM mess WHERE usunodb=1 and usunnad=1";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$for = $row['rand'];
$ppp="DELETE FROM reply WHERE replyfor='$for'";
mysql_query($ppp);
$pp = "SET @count = 0";
mysql_query($pp);
$p = "UPDATE `reply` SET `reply`.`ID` = @count:= @count + 1";
mysql_query($p);
			}
	$yyy="DELETE FROM mess WHERE usunodb=1 and usunnad=1";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `mess` SET `mess`.`ID` = @count:= @count + 1";
mysql_query($y);
if($y){
echo json_encode("true");
}
else {
echo json_encode("false");
}
}
}
else if($miejsce === "nad"){
$findme   = ',';
$pos = strpos($ktore, $findme);
if ($pos === false) {
 $ktore = trim($ktore);
$jop = ("UPDATE mess SET usunnad=1 WHERE rand='$ktore'");
$jo = mysql_query($jop);
if($jo){
			$sql = "SELECT * FROM mess WHERE usunodb=1 and usunnad=1";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$for = $row['rand'];
$ppp="DELETE FROM reply WHERE replyfor='$for'";
mysql_query($ppp);
$pp = "SET @count = 0";
mysql_query($pp);
$p = "UPDATE `reply` SET `reply`.`ID` = @count:= @count + 1";
mysql_query($p);
			}
$yyy="DELETE FROM mess WHERE usunodb=1 and usunnad=1";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `mess` SET `mess`.`ID` = @count:= @count + 1";
mysql_query($y);
if($y){
echo json_encode("true");
}
else {
echo json_encode("false");
}
}
else {
echo json_encode("false");
}
} else {
    $exp = (explode(",",$ktore));
	$wynik = count($exp);
	for($x=0;$x<= $wynik; $x++) {
	$inser = $exp[$x];
	$jop = ("UPDATE mess SET usunnad=1 WHERE rand='$inser'");
	$jo = mysql_query($jop);
	}
				$sql = "SELECT * FROM mess WHERE usunodb=1 and usunnad=1";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$for = $row['rand'];
$ppp="DELETE FROM reply WHERE replyfor='$for'";
mysql_query($ppp);
$pp = "SET @count = 0";
mysql_query($pp);
$p = "UPDATE `reply` SET `reply`.`ID` = @count:= @count + 1";
mysql_query($p);
			}
	$yyy="DELETE FROM mess WHERE usunodb=1 and usunnad=1";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `mess` SET `mess`.`ID` = @count:= @count + 1";
mysql_query($y);
if($y){
echo json_encode("true");
}
else {
echo json_encode("false");
}
}
}
}
else {
echo json_encode("false");
}
?>