<?php 
session_start();
require_once 'function-crud.php';

// $nik = $_POST['nik'];
// $nama = $_POST['nama'];
// $tempat_lahir = $_POST['tempat_lahir'];
// $tanggal_lahir = $_POST['tanggal_lahir'];
// $alamat_ktp = $_POST['alamat_ktp'];
// $alamat_tinggal = $_POST['alamat_tinggal'];
// $rt = $_POST['rt'];
// $rw = $_POST['rw'];
// $agama = $_POST['agama'];
// $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
// $pekerjaan = $_POST['pekerjaan'];
// $jenis_kelamin = $_POST['jenis_kelamin'];
// $status_perkawinan = $_POST['status_perkawinan'];
// $status_warga = $_POST['status_warga'];
// $status_kehidupan = $_POST['status_kehidupan'];
// $kewarganegaraan = $_POST['kewarganegaraan'];
// $gol_dar = $_POST['gol_dar'];
// $kontak = $_POST['kontak'];



try {
	var_dump($_POST);
	tambahWarga($_POST);
	$_SESSION['tambah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/warga/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	var_dump($_POST);
	$_SESSION['tambah'] = true;
	$_SESSION['kode_err'] = $e->getCode();
	header('Location: ../../views/warga/');
}
 ?>