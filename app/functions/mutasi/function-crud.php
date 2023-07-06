<?php 
include_once __DIR__.'/../main-function.php';

// FUNCTION TAMPIL DATA
function getAllMutasi(){
	$query = "SELECT * FROM warga_mutasi";

	return query($query);
}

function getMutasiById($id){
	$query = "SELECT * FROM warga_mutasi WHERE id_mutasi = '$id' ";
	return query($query);
}

function getKeluargaNonMutasi(){
	$query = "SELECT * FROM keluarga WHERE no_kk NOT IN (SELECT no_kk_mutasi FROM warga_mutasi)";
	return query($query);
}
// END FUNCTION AMBIL DATA


// FUNCTION TAMBAH DATA
function tambahMutasi($data){
	global $conn;
	$no_kk = htmlspecialchars($data['no_kk']);
	$rw = htmlspecialchars($data['rw']);
	$rt = htmlspecialchars($data['rt']);
	$nik = htmlspecialchars($data['nik']);
	$nama = htmlspecialchars($data['nama']);
	$alamat = htmlspecialchars($data['alamat']);
	$tanggal_mutasi = htmlspecialchars($data['tanggal_mutasi']);
	$currentDate = date("Y-m-d h:i:sa");

	$query = "INSERT INTO warga_mutasi 
	VALUES('', '$rw', '$rt', '$no_kk', '$nik', '$nama', '$alamat', '$tanggal_mutasi', '$currentDate', '')";

	return mysqli_query($conn, $query);
}
// END FUNCTION TAMBAH DATA

// FUNCTION UBAH DATA
function ubahMutasi($data){
	global $conn;
	$id = htmlspecialchars($data['id']);
	$no_kk = htmlspecialchars($data['no_kk']);
	$rw = htmlspecialchars($data['rw']);
	$rt = htmlspecialchars($data['rt']);
	$nik = htmlspecialchars($data['nik']);
	$nama = htmlspecialchars($data['nama']);
	$alamat = htmlspecialchars($data['alamat']);
	$tanggal_mutasi = htmlspecialchars($data['tanggal_mutasi']);
	$currentDate = date("Y-m-d h:i:sa");

	$query = "UPDATE warga_mutasi SET
	rw_kk_mutasi = '$rw',
	rt_kk_mutasi = '$rt',
	no_kk_mutasi = '$no_kk',
	nik_kepala_mutasi = '$nik',
	nama_kepala_mutasi = '$nama',
	alamat_mutasi = '$alamat',
	tanggal_mutasi = '$tanggal_mutasi',
	updated_at = '$currentDate' WHERE id_mutasi =  '$id' ";

	return mysqli_query($conn, $query);
}
// END FUNCTION UBAH DATA

//  FUNCTION HAPUS MUTASI
function hapusMutasi($id){
	global $conn;
	$query = "DELETE FROM warga_mutasi WHERE id_mutasi = '$id' ";
	return mysqli_query($conn, $query);
}
// END FUNCTION HAPUS MUTASI

// FUNCTION CARI WARGA MUTASI
function cariMutasi($keyword){
	$query = "SELECT * FROM warga_mutasi
	WHERE rw_kk_mutasi LIKE '$keyword' OR
	rt_kk_mutasi LIKE '$keyword' OR 
	no_kk_mutasi LIKE '$keyword%' OR 
	nik_kepala_mutasi LIKE '%$keyword%' OR
	nama_kepala_mutasi LIKE '%$keyword%' OR
	alamat_mutasi LIKE '%$keyword%' OR 
	tanggal_mutasi LIKE '%$keyword%' OR
	created_at LIKE '%$keyword%' OR
	updated_at LIKE '%$keyword%' GROUP BY created_at ASC ";

	return query($query);
}
// END FUNCTION CARI WARGA MUTASI
 


?>