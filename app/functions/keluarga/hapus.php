<?php 
require_once 'function-crud.php';
session_start();
try {
	hapusKeluarga($_GET['no']);
	$_SESSION['message'] = 'NO KK : '.$_GET['no'];
	$_SESSION['hapus'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/keluarga/all.php');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['kode_err'] = $e->getCode();
	$_SESSION['hapus'] = false;
	header('Location: ../../views/keluarga/all.php');
}
 ?>