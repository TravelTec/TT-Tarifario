<?php  
	session_start();
	unset($_SESSION['teste']);  
	$_SESSION['teste'] .= 'Retirar em: '.$_POST['local'].'<br>';  
	if ($_POST['devolucao'] == 1) {
		$_SESSION['teste'] .= 'Devolver em: '.$_POST['local_devolver'].'<br>';  
	}
	$_SESSION['teste'] .= date("d/m/Y", strtotime($_POST['data1'])).' às '.date("H:i", strtotime($_POST['data1'])).' a '.date("d/m/Y", strtotime($_POST['data2'])).' às '.date("H:i", strtotime($_POST['data1']));

	echo $_SESSION['teste'];
	echo $_SESSION['tipo_tarifario'];
	session_write_close();
?>