<?php  
    session_start();
    unset($_SESSION['teste']);
    $_SESSION['teste'] .= 'Hotel: '.$_POST['nome_hotel'].' <br> Apto.: '.$_POST['nome_apto'].' <br> Regime: '.$_POST['regime'].'<br>'; 
    $_SESSION['teste'] .= 'Período: '.$_POST['datas_periodo'];

    $_SESSION['qtd_adt'] = $_POST['qtd_adt'];
    $_SESSION['qtd_chd'] = $_POST['qtd_chd'];

    $_SESSION['methodo'] = $_POST['methodo'];  
    $_SESSION['forma'] = $_POST['forma'];  
    $_SESSION['tipo_tarifario'] = $_POST['periodo'];  
    session_write_close();
?> 