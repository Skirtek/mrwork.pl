<?php
header('Content-type: text/plain; charset=utf-8');
   require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';	
   $username = $_POST['username'];
   $pass = $_POST['password'];
     $salt = '&8nP36vg!Xy@Keb';
  $passw = hash('sha512',$pass);
  $password = md5($salt.$passw);
  mysql_query("SET NAMES utf8");
   $result = mysql_query("SELECT * FROM users where userName='$username' and userPass='$password'");
   $row = mysql_fetch_array($result);
   $data = $row['userName'];

   if($data){
      echo json_encode($data);
   }
   else {
   $abc = "User not found";
   echo json_encode($abc);
 }
?>
