<?php 
session_start();
require_once 'function-crud.php';
var_dump($_POST);
// die();

try {
	ubahKematian($_POST);
	$_SESSION['message'] = 'NIK : '.$_POST['nik'];
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/kematian/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['ubah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	// header('Location: ../../views/kematian/');
}
 ?>