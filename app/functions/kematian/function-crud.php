<?php 
require_once __DIR__.'/../main-function.php';
// FUNCTION TAMPIL DATA
function getAllKematian(){
	$query = "SELECT *, kematian.created_at as ditambah, kematian.updated_at as diubah 
	FROM kematian INNER JOIN warga 
	ON kematian.nik_kematian = warga.nik_warga";
	return query($query);
}

function getKematianByNIK($nik){
	$query = "SELECT * FROM kematian WHERE nik_kematian = '$nik' ";
	return query($query);
}
function getKematianById($id){
	$query = "SELECT * FROM kematian
	INNER JOIN warga
	ON kematian.nik_kematian = warga.nik_warga 
	WHERE id_kematian = '$id' ";
	return query($query);
}

function getWargaMati(){
	$query = "SELECT * FROM warga WHERE nik_warga IN (SELECT nik_kematian FROM kematian)";
	return query($query);
}

function getWargaHidup(){
	$query = "SELECT * FROM warga WHERE nik_warga NOT IN (SELECT nik_kematian FROM kematian)";
	return query($query);
}
// END FUNCTION TAMPIL DATA


// FUNCTION TAMBAH DATA
function tambahKematian($data){
	global $conn;
	$nik = htmlspecialchars($data['nik']);
	$rw = htmlspecialchars($data['rw']);
	$rt = htmlspecialchars($data['rt']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$usia = htmlspecialchars($data['usia']);
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$currentDate = date("Y-m-d h:i:sa");
	$query2 = "UPDATE warga SET status_kehidupan = 'Meninggal' WHERE nik_warga = '$nik' ";
	mysqli_query($conn, $query2);
	$query = "INSERT INTO kematian 
	VALUES('', '$rw', '$rt','$nik', '$tanggal', '$usia', '$deskripsi', '$currentDate' ,'')";

	return mysqli_query($conn, $query);
}
// END FUNCTION TAMBAH DATA


// FUNCTION UBAH DATA
function ubahKematian($data){
	global $conn;
	$id = htmlspecialchars($data['id']);
	$nik = htmlspecialchars($data['nik']);
	$rw = htmlspecialchars($data['rw']);
	$rt = htmlspecialchars($data['rt']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$usia = htmlspecialchars($data['usia']);
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$currentDate = date("Y-m-d h:i:sa");

	$query = "UPDATE kematian SET
	nik_kematian = '$nik',
	rw_kematian = '$rw',
	rt_kematian = '$rt',
	tanggal_kematian = '$tanggal',
	usia_kematian = '$usia',
	deskripsi_kematian = '$deskripsi',
	updated_at = '$currentDate'
	WHERE id_kematian = '$id' ";

	return mysqli_query($conn, $query);
}
// END FUNCTION UBAH DATA

// FUNCTION HAPUS DATA
function hapusKematian($id, $nik){
	global $conn;
	$query1 = "DELETE FROM kematian WHERE id_kematian = '$id' ";
	$query2 = "UPDATE warga SET status_kehidupan = 'Hidup' WHERE nik_warga = '$nik' ";
	mysqli_query($conn, $query2);
	return mysqli_query($conn, $query1);
}
// END FUNCTION HAPUS DATA

// FUNCTION CARI DATA
function cariKematian($keyword){
	$query = "SELECT *, kematian.created_at as ditambah, kematian.updated_at as diubah
	FROM kematian
	INNER JOIN warga 
	ON kematian.nik_kematian = warga.nik_warga 
	WHERE 
	nik_kematian LIKE '%$keyword%' OR 
	nama_warga LIKE '%$keyword%' OR 
	rw_kematian LIKE '$keyword' OR 
	rt_kematian LIKE '$keyword' OR 
	tanggal_kematian LIKE '%$keyword%' OR 
	usia_kematian LIKE '%$keyword%' OR 
	deskripsi_kematian LIKE '%$keyword%' ";

	return query($query);
}
// END FUNCTION CARI DATA
 ?>