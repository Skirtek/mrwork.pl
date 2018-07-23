<?php
session_start();
  if ($_POST['aa'] == 'good') {
    $_SESSION['bb'] = $_POST['bb'];
	 $_SESSION['cc'] = $_POST['cc'];
	  $_SESSION['dd'] = $_POST['dd'];
	   $_SESSION['ee'] = $_POST['ee'];
	    $_SESSION['ff'] = $_POST['ff'];
		 $_SESSION['gg'] = $_POST['gg'];
		 $_SESSION['hh'] = $_POST['hh'];
    echo json_encode("true");
} else {
    echo json_encode("false");
}
?>