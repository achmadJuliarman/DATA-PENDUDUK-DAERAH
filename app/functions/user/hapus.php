<?php 
session_start();
require_once 'function-crud.php';
// var_dump($_GET);
// die();

try {
	hapusUser($_GET['id']);
	$_SESSION['message'] = 'Nama '.$_GET['nama'];
	$_SESSION['hapus'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/user/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['hapus'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/user/');
}
 ?>