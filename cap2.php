<?php
 session_start();
 $user = $_POST['cap2'];
 $odp = $_SESSION['answer2'];
 
if($user == $odp) {
echo json_encode("true");
}
else {
echo json_encode("false");
}
?>