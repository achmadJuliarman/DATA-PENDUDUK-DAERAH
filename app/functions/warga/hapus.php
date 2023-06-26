<?php 
require_once 'function-crud.php';
session_start();
try {
	hapusWarga($_GET['nik']);
	$_SESSION['message'] = 'NIK : '.$_GET['nik'];
	$_SESSION['hapus'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/warga/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['kode_err'] = $e->getCode();
	$_SESSION['hapus'] = false;
	header('Location: ../../views/warga/');
}
 ?>