<?php
 session_start();
 include_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $ktore = $_POST['array'];
 
if($ktore) {
$wynik = count($ktore);
for($x = 0; $x<$wynik;$x++){
$string = $ktore[$x];
$pieces = explode(" ", $string);
$miejsce = $pieces[1];
$random = $pieces[0];
if($miejsce === "odb") {
$jop = ("UPDATE mess SET usunodb=1 WHERE rand='$random'");
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

}
else {
echo json_encode("false");
break;
}
}
else {
echo json_encode("false");
break;
}
}
else if($miejsce === "nad"){
$jop = ("UPDATE mess SET usunnad=1 WHERE rand='$random'");
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

}
else {
echo json_encode("false");
break;
}
}
}
}
echo json_encode("true");
}
else {
echo json_encode("false");
}
?>