<?php  
	session_start();
	unset($_SESSION['teste']);  
	$_SESSION['teste'] .= date("d/m/Y", strtotime($_POST['data1'])).' a '.date("d/m/Y", strtotime($_POST['data2'])).'<br>';
	$_SESSION['teste'] .= $_POST['pax'];

	echo $_SESSION['teste'];
	echo $_SESSION['tipo_tarifario'];
	session_write_close();
?>