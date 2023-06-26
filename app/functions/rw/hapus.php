<?php 
session_start();
require_once 'function-crud.php';
// var_dump($_GET);
// die();

try {
	hapusRw($_GET['rw']);
	$_SESSION['message'] = 'No RW '.$_GET['rw'];
	$_SESSION['hapus'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/rw/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['hapus'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/rw/');
}
 ?>