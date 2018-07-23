<?php
  $userAnswer = $_POST['name']; 
  $salt = '&8nP36vg!Xy@Keb';
  $passw = hash('sha512',$userAnswer);
  $password = md5($salt.$passw);
  echo json_encode($password);  // pass array in json_encode  
?>