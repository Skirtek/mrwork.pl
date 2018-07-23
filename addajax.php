<?php
session_start();
  if ($_POST['a'] == 'good') {
    $_SESSION['b'] = $_POST['b'];
	 $_SESSION['c'] = $_POST['c'];
	  $_SESSION['d'] = $_POST['d'];
	   $_SESSION['e'] = $_POST['e'];
	    $_SESSION['f'] = $_POST['f'];
		 $_SESSION['g'] = $_POST['g'];
		 $_SESSION['h'] = $_POST['h'];
		 $_SESSION['i'] = $_POST['i'];
		 $_SESSION['j'] = $_POST['j'];
    echo json_encode("true");
} else {
    echo json_encode("false");
}
?>