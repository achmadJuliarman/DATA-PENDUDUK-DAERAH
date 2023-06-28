<?php 
session_start();
require_once 'function-crud.php'; // functions/warga/function-crud.php

var_dump($_POST);

try {
	ubahWarga($_POST);
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/warga/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['kode_err'] = $e->getCode();
	$_SESSION['ubah'] = false;
	// header('Location: ../../views/warga/');
}

var_dump($_SESSION);

 ?>