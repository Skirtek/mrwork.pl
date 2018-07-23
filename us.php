<?php
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 $rand = $_POST['co'];
 $miej = $_POST['miej'];
 

if($miej === "odb") {  
$random = trim($rand);
	 $d = "UPDATE `mess` SET `usunodb` = '1' WHERE `rand`='$random'";
$g = mysql_query($d);
if($g) {
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
echo json_encode("usunieto");
}
else {
echo json_encode("false");
}

}
else {
echo json_encode("false");
}
}


if($miej === "nad") {  
$random = trim($rand);
	 $d = "UPDATE `mess` SET `usunnad` = '1' WHERE `rand`='$random'";
$g = mysql_query($d);
if($g) {
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
echo json_encode("usunieto");
}
else {
echo json_encode("false");
}

}
else {
echo json_encode("false");
}

}


?>