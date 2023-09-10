<?php  
    session_start();
    unset($_SESSION['teste']);
	$_SESSION['nome_roteiro'] = $_POST['nome_roteiro'];
    $_SESSION['teste'] .= 'Hotel: '.$_POST['nome_hotel'].' <br> Apto.: '.$_POST['nome_apto'].' <br> Regime: '.$_POST['regime'].'<br>'; 
    $_SESSION['teste'] .= 'Período: '.$_POST['data_roteiro'];

    $_SESSION['qtd_adt'] = $_POST['qtd_adt'];
    $_SESSION['qtd_chd'] = $_POST['qtd_chd'];

    $_SESSION['methodo'] = $_POST['methodo'];  
    $_SESSION['forma'] = $_POST['forma'];  
    $_SESSION['tipo_tarifario'] = intval($_POST['periodo']);  

echo $_POST['periodo'];
    session_write_close();
?> 