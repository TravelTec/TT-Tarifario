<?php  
	session_start();
	unset($_SESSION['teste']);  
	if ($_POST['tipo'] == 1) {
		$_SESSION['teste'] .= date("d/m/Y", strtotime($_POST['data1'])).'<br>';
	}else{
		$_SESSION['teste'] .= date("d/m/Y", strtotime($_POST['data1'])).' a '.date("d/m/Y", strtotime($_POST['data2'])).'<br>';
	} 
	$_SESSION['teste'] .= 'Qtd. pax: '.$_POST['pax'].'<br>';
	$_SESSION['teste'] .= 'Classe: '.$_POST['classe'];

	echo $_SESSION['teste'];
	echo $_SESSION['tipo_tarifario'];
	session_write_close();
?>