<?php  
	ini_set("display_errors", 0);

	session_start(); 

	$_SESSION['forma_pagamento'] = $_POST['forma'];
	$_SESSION['valores_diarias'] = $_POST['valores_diarias'];
	$_SESSION['noites'] = $_POST['noites'];
 
	session_write_close();
?> 