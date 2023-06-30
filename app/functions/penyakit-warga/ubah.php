<?php 
session_start();
require_once 'function-crud.php';
var_dump($_POST);
// die();

try {
	ubahPenyakit($_POST);
	$_SESSION['message'] = 'NIK : '.$_POST['nik'].' Penyakit : '.$_POST['penyakit'];
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/penyakit-warga/detail.php?nik='.$_POST["nik"].'&nama='.$_POST["nama"]);
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['ubah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/penyakit-warga/detail.php?nik='.$_POST["nik"].'&nama='.$_POST["nama"]);
}
 ?>