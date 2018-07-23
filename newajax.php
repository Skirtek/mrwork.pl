<?php
  require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
$url = $_POST['url'];
$pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
	$salt = '&8nP36vg!Xy@Keb';
	$passw = hash('sha512',$pass);
	$password = md5($salt.$passw);
	mysql_query("SET NAMES utf8");
	$sql = ("UPDATE users SET userPass='$password' WHERE mailhash='$url'");
	$res = mysql_query($sql);
	$success = "good";
echo json_encode($success);
 ?>