<?php 
session_start();
require_once 'function-crud.php';
var_dump($_GET);
// die();

try {
	if ($_GET['hapus'] == 'semua') {
		hapusPenyakitByNIK($_GET['nik']);
		$_SESSION['message'] = 'NO NIK '.$_GET['nik'].' Nama';
		$_SESSION['hapus'] = true;
		$_SESSION['kode_err'] = '';
		header('Location: ../../views/penyakit-warga/');
	}else{
		hapusPenyakitById($_GET['id']);
		$_SESSION['message'] = 'NO NIK '.$_GET['nik'].' Nama';
		$_SESSION['hapus'] = true;
		$_SESSION['kode_err'] = '';
		header('Location: ../../views/penyakit-warga/detail.php?nik='.$_GET["nik"].'&nama='.$_GET['nama']);
	}
	
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['hapus'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	//header('Location: ../../views/penyakit-warga/detail.php?nik='.$_GET["nik"].'&nama='.$_GET['nama']);
}
 ?>