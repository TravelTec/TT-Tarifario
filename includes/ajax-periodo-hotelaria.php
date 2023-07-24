<?php  
	session_start();
	unset($_SESSION['teste']);  
	$_SESSION['teste'] .= '';

	echo $_SESSION['teste'];
	echo $_SESSION['tipo_tarifario'];
	session_write_close();
?>