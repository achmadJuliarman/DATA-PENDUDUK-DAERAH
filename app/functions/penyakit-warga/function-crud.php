<?php 
require_once __DIR__.'/../main-function.php';
// FUNCTION TAMPIL DATA
function getWargaBerpenyakit(){
	$query = "SELECT *, GROUP_CONCAT(nama_penyakit SEPARATOR ', ') AS penyakit, 
	riwayat_penyakit_warga.created_at AS ditambah, riwayat_penyakit_warga.updated_at AS diubah
	FROM riwayat_penyakit_warga INNER JOIN warga 
	ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga GROUP BY (nik_penyakit)";
	return query($query);
}

function getPenyakitByNIK($nik){
	$query = "SELECT *, nama_penyakit as penyakit, 
	riwayat_penyakit_warga.created_at AS ditambah, riwayat_penyakit_warga.updated_at AS diubah
	FROM riwayat_penyakit_warga INNER JOIN warga 
	ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga WHERE nik_penyakit = '$nik' GROUP BY (id_penyakit)";
	return query($query);
}
function getPenyakitById($id){
	$query = "SELECT * FROM riwayat_penyakit_warga INNER JOIN warga ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga WHERE id_penyakit = $id";
	return query($query);
}
// END FUNCTION TAMPIL DATA

// FUNCTION TAMBAH DATA
function tambahPenyakit($data){
	global $conn;
	$nik = $data['nik'];
	$penyakit = $data['penyakit'];
	$currentDate = date("Y-m-d h:i:sa");
	$query = "INSERT INTO riwayat_penyakit_warga VALUES('','$nik','$penyakit','$currentDate','')";

	return mysqli_query($conn, $query);
}
// END FUNCTION TAMBAH DATA

// FUNCTION UBAH DATA
function ubahPenyakit($data){
	global $conn;
	$id = $data['id-penyakit'];
	$nik = $data['nik'];
	$penyakit = $data['penyakit'];
	$currentDate = date("Y-m-d h:i:sa");

	$query = "UPDATE riwayat_penyakit_warga SET
	nama_penyakit= '$penyakit' WHERE id_penyakit = '$id' ";

	return mysqli_query($conn, $query);

}
// END FUNCTION UBAH DATA

// FUNCTION HAPUS DATA
function hapusPenyakitByNIK($nik){
	global $conn;
	$query = "DELETE FROM riwayat_penyakit_warga WHERE nik_penyakit = '$nik' ";
	return mysqli_query($conn,$query);
}
function hapusPenyakitById($id){
	global $conn;
	$query = "DELETE FROM riwayat_penyakit_warga WHERE id_penyakit = '$id' ";
	return mysqli_query($conn, $query);
}
// END FUNCTION HAPUS DATA
// FUNCTION CARI PENYAKIT
function cariPenyakit($keyword){
	$query =
	"SELECT *, GROUP_CONCAT(nama_penyakit SEPARATOR ', ') AS penyakit,
	riwayat_penyakit_warga.created_at AS ditambah, riwayat_penyakit_warga.updated_at AS diubah
	FROM riwayat_penyakit_warga INNER JOIN warga 
	ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga 
	WHERE nik_penyakit LIKE '%$keyword%' OR
	nama_penyakit LIKE '%$keyword%' OR
	nama_warga LIKE '%$keyword%'
	GROUP BY (nik_penyakit)";

	return query($query);
}
// END FUNCTION CARI 

 ?>