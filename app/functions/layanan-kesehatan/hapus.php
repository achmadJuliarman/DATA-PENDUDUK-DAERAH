<?php 
session_start();
require_once 'function-crud.php';
// var_dump($_GET);
// die();

try {
	hapusKesehatan($_GET['id']);
	$_SESSION['message'] = 'Nama Layanan Kesehatan : '.$_GET['nama'];
	$_SESSION['hapus'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/layanan-kesehatan/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['hapus'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/layanan-kesehatan/');
}
 ?>