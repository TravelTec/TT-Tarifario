<?php  
	session_start();
	unset($_SESSION['teste']);  
	$_SESSION['teste'] .= date("d/m/Y", strtotime($_POST['data1'])).' a '.date("d/m/Y", strtotime($_POST['data2'])).'<br>';  
	$_SESSION['teste'] .= $_POST['quartos'].' '.($_POST['quartos'] > 1 ? 'quartos' : 'quarto').', '.$_POST['pax'].' '.($_POST['pax'] > 1 ? 'pessoas' : 'pessoa'); 

	echo $_SESSION['teste'];
	echo $_SESSION['tipo_tarifario'];
	session_write_close();
?>