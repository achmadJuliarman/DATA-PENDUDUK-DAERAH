<?php 
require_once __DIR__.'/../main-function.php';


// FUNCTION TAMPIL DATA KESEHATAN
function getAllKesehatan(){
	$query = "SELECT * FROM layanan_kesehatan";
	return query($query);
}
function getKesehatanInRw($rw){
	$query = "SELECT * FROM layanan_kesehatan WHERE no_rw = '$rw'";
	return query($query);
}
// END TAMPIL FUNCTION KESEHATAN

// FUNCTION TAMBAH DATA LAYANAN KESEHATAN
function tambahKesehatan($data){
	global $conn;
	$nama_l = htmlspecialchars($data['nama_l']);
	$jenis_l = htmlspecialchars($data['jenis_l']);
	$rw = htmlspecialchars($data['rw']);
	$kontak = htmlspecialchars($data['kontak']);
	$alamat = htmlspecialchars($data['alamat']);
	$currentDate = date("Y-m-d h:i:sa");

	$query = "INSERT INTO layanan_kesehatan
	VALUES('','$nama_l', '$jenis_l', '$rw', '$kontak', '$alamat', '$currentDate', '')";

	return mysqli_query($conn, $query);

}
// END FUNCTION TAMBAH

// FUNCTION UBAH
function ubahKesehatan($data){
	global $conn;
	$id_l = htmlspecialchars($data['id_l']);
	$nama_l = htmlspecialchars($data['nama_l']);
	$jenis_l = htmlspecialchars($data['jenis_l']);
	$rw = htmlspecialchars($data['rw']);
	$kontak = htmlspecialchars($data['kontak']);
	$alamat = htmlspecialchars($data['alamat']);
	$currentDate = date("Y-m-d h:i:sa");

	$query = "UPDATE layanan_kesehatan SET nama_layanan = '$nama_l',
	jenis_layanan = '$jenis_l', no_rw = '$rw', kontak = '$kontak', alamat_tempat ='$alamat', updated_at = '$currentDate' 
	WHERE id_layanan = '$id_l' ";

	return mysqli_query($conn, $query);
}
// END FUNCTION UBAH

// FUNCTION HAPUS
function hapusKesehatan($id){
	global $conn;
	$query = "DELETE FROM layanan_kesehatan WHERE id_layanan = '$id' ";

	return mysqli_query($conn, $query);
}
// END FUNCTION HAPUS


// FUNCTION CARI LK
function cariKesehatan($keyword){
	global $conn;
	$query = "SELECT * FROM layanan_kesehatan 
	WHERE nama_layanan LIKE '%$keyword%' OR
	jenis_layanan LIKE '$keyword%' OR 
	no_rw LIKE '$keyword' OR 
	kontak LIKE '$keyword%' OR 
	alamat_tempat LIKE '$keyword%' ";

	return query($query);
}

function cariKesehatanId($id){
	$query = "SELECT * FROM layanan_kesehatan WHERE id_layanan = '$id' ";

	return query($query);
}

// END FUNCTION CARI

 ?>