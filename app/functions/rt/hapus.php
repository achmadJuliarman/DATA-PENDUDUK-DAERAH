<?php 
session_start();
require_once 'function-crud.php';
// var_dump($_GET);
// die();

try {
	hapusRt($_GET['rt']);
	$_SESSION['message'] = 'No RT '.$_GET['rt'];
	$_SESSION['hapus'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/rt/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['hapus'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/rt/');
}
 ?>