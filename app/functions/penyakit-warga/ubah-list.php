<?php 
session_start();
require_once 'function-crud.php';
var_dump($_POST);
// die();

try {
	ubahListPenyakit($_POST);
	$_SESSION['message'] = 'Penyakit : '.$_POST['penyakit_baru'].'<br> Nama Penyakit Sebelumnya: '.$_POST['penyakit_lama'];
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/penyakit-warga/list-penyakit.php');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['ubah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/penyakit-warga/list-penyakit.php');

}
 ?>