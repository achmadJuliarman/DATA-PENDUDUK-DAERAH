<?php 
session_start();
require_once 'function-crud.php';
var_dump($_POST);
// die();
try {
	ubahKeluarga($_POST);
	if ($_POST['nik-baru'] != $_POST['nik-lama']) {
		$_SESSION['message'] = 'Kepala Keluarga Menjadi : '.$_POST['nik'];
	}else{
		$_SESSION['message'] = 'Menjadi No KK : '.$_POST['kk-baru'];
	}
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/keluarga/all.php');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['ubah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	// header('Location: ../../views/keluarga/all.php');
}
 ?>