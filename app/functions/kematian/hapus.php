<?php 
session_start();
require_once 'function-crud.php';
var_dump($_GET);
// die();

try {
	hapusKematian($_GET['id'], $_GET['nik']);
	$_SESSION['message'] = 'NIK : '.$_GET['nik'];
	$_SESSION['hapus'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/kematian/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['hapus'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	// header('Location: ../../views/mutasi/');
}
 ?>