<?php 
session_start();
require_once 'function-crud.php';
var_dump($_POST);

try {
	ubahKesehatan($_POST);
	$_SESSION['message'] = 'Menjadi : '.$_POST['nama_l'];
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/layanan-kesehatan/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['ubah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/layanan-kesehatan/');
}
 ?>