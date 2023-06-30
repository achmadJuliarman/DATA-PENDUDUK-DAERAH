<?php 
session_start();
require_once 'function-crud.php';
var_dump($_GET);
// die();

try {
	hapusMutasi($_GET['id']);
	$_SESSION['message'] = 'NO KK Mutasi '.$_GET['no'];
	$_SESSION['hapus'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/mutasi/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['hapus'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	// header('Location: ../../views/mutasi/');
}
 ?>