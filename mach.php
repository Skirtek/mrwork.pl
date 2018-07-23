<?php
	require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
  $userAnswer = $_POST['nam']; 
	$query = "SELECT userEmail FROM users WHERE userEmail='$userAnswer'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = "tak";
   }
   else {
   $error = "nie";
   }
  echo json_encode($error);  // pass array in json_encode  
?>