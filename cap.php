<?php
 session_start();
 $user = $_POST['cap'];
 $odp = $_SESSION['answer'];
 
if($user == $odp) {
echo json_encode("true");
}
else {
echo json_encode("false");
}
?>