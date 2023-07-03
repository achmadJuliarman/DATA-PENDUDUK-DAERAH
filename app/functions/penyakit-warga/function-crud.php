<?php 
require_once __DIR__.'/../main-function.php';
// FUNCTION TAMPIL DATA
function getWargaBerpenyakit(){
	$query = "SELECT *, GROUP_CONCAT(nama_penyakit SEPARATOR ', ') AS penyakit, 
	riwayat_penyakit_warga.created_at AS ditambah, riwayat_penyakit_warga.updated_at AS diubah
	FROM riwayat_penyakit_warga 
	INNER JOIN warga ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga 
	INNER JOIN penyakit on riwayat_penyakit_warga.id_t_penyakit = penyakit.id_penyakit
	GROUP BY (nik_penyakit)";
	return query($query);
}

function getPenyakitByNIK($nik){
	$query = "SELECT *, nama_penyakit as penyakit, 
	riwayat_penyakit_warga.created_at AS ditambah, riwayat_penyakit_warga.updated_at AS diubah
	FROM riwayat_penyakit_warga 
	INNER JOIN warga ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga 
	INNER JOIN penyakit on riwayat_penyakit_warga.id_t_penyakit = penyakit.id_penyakit
	WHERE nik_penyakit = '$nik' GROUP BY (id_penyakit_warga)";
	return query($query);
}
function getPenyakitById($id){
	$query = "SELECT * FROM riwayat_penyakit_warga 
	INNER JOIN warga ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga 
	INNER JOIN penyakit ON riwayat_penyakit_warga.id_t_penyakit = penyakit.id_penyakit 
	WHERE id_penyakit_warga = $id";
	return query($query);
}

function getWargaByFilter($id){
	$query = "SELECT *, GROUP_CONCAT(nama_penyakit SEPARATOR ', ') AS penyakit, 
	riwayat_penyakit_warga.created_at AS ditambah, riwayat_penyakit_warga.updated_at AS diubah
	FROM riwayat_penyakit_warga 
	INNER JOIN warga ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga 
	INNER JOIN penyakit on riwayat_penyakit_warga.id_t_penyakit = penyakit.id_penyakit
	WHERE id_t_penyakit = '$id'
	GROUP BY (nik_penyakit)";

	return query($query);
}
// TAMPIL DATA UNTUK TABEL PENYAKIT, MEMANG JADI AGAK AMBIGU NAMA FUNGSINYA
function getAllPenyakit(){
	$query = "SELECT * FROM penyakit";
	return query($query);
}
function getPenyakitBelumDiderita($nik){
	$query = "SELECT * FROM penyakit WHERE id_penyakit NOT IN (SELECT id_t_penyakit FROM riwayat_penyakit_warga WHERE nik_penyakit = '$nik')";
	return query($query);
}
function getJumlahPenderita($id){
	$query = "SELECT *, COUNT(nik_penyakit) AS jumlah FROM riwayat_penyakit_warga
	INNER JOIN penyakit
	ON riwayat_penyakit_warga.id_t_penyakit = penyakit.id_penyakit
	WHERE id_penyakit = '$id'
	GROUP BY id_penyakit ";

	return query($query);
}
function getListPenyakitById($id){
	$query = "SELECT * FROM penyakit WHERE id_penyakit = '$id' ";
	return query($query);
}
// END FUNCTION TAMPIL DATA

// FUNCTION TAMBAH DATA
function tambahPenyakit($data){
	global $conn;
	$nik = $data['nik'];
	$penyakit = $data['penyakit']; //untuk id_t_penyakit
	$currentDate = date("Y-m-d h:i:sa");
	$query = "INSERT INTO riwayat_penyakit_warga VALUES('','$nik','$penyakit','$currentDate','')";

	return mysqli_query($conn, $query);
}
function tambahListPenyakit($data){
	global $conn;
	$penyakit = $data['penyakit'];
	$query = "INSERT INTO penyakit VALUES('', '$penyakit')";
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
	id_t_penyakit = '$penyakit' WHERE id_penyakit_warga = '$id' ";

	return mysqli_query($conn, $query);

}
function ubahListPenyakit($data){
	global $conn;
	$id = $data['id'];
	$penyakit_lama = $data['penyakit_lama'];
	$penyakit_baru = $data['penyakit_baru'];

	$query = "UPDATE penyakit SET nama_penyakit = '$penyakit_baru' WHERE id_penyakit = '$id' ";

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
	$query = "DELETE FROM riwayat_penyakit_warga WHERE id_penyakit_warga = '$id' ";
	return mysqli_query($conn, $query);
}
// END FUNCTION HAPUS DATA


// FUNCTION CARI PENYAKIT
function cariPenyakit($keyword){
	$query =
	"SELECT *, GROUP_CONCAT(nama_penyakit SEPARATOR ', ') AS penyakit,
	riwayat_penyakit_warga.created_at AS ditambah, riwayat_penyakit_warga.updated_at AS diubah
	FROM riwayat_penyakit_warga 
	INNER JOIN warga ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga 
	INNER JOIN penyakit ON riwayat_penyakit_warga.id_t_penyakit = penyakit.id_penyakit
	WHERE nik_penyakit LIKE '%$keyword%' OR
	nama_penyakit LIKE '%$keyword%' OR
	nama_warga LIKE '%$keyword%'
	GROUP BY (nik_penyakit)";

	return query($query);
}

function cariPenyakitById($id){
	$query = "SELECT * FROM penyakit WHERE id_penyakit = '$id' ";
	return query($query);
}

function cariPenyakitByFilter($keyword, $id){
	$query =
	"SELECT *, GROUP_CONCAT(nama_penyakit SEPARATOR ', ') AS penyakit,
	riwayat_penyakit_warga.created_at AS ditambah, riwayat_penyakit_warga.updated_at AS diubah
	FROM riwayat_penyakit_warga 
	INNER JOIN warga ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga 
	INNER JOIN penyakit ON riwayat_penyakit_warga.id_t_penyakit = penyakit.id_penyakit 
	WHERE nik_penyakit LIKE '%$keyword%' OR
	nama_penyakit LIKE '%$keyword%' OR
	nama_warga LIKE '%$keyword%'
	AND id_t_penyakit = '$id'
	GROUP BY (nik_penyakit)";

	return query($query);
}

function persentasePenyakitByRW($id,$rw){
	$query1 = "SELECT no_rw as rw , id_t_penyakit as id FROM riwayat_penyakit_warga 
	INNER JOIN warga ON riwayat_penyakit_warga.nik_penyakit = warga.nik_warga 
	WHERE no_rw = '$rw' AND id_t_penyakit = '$id' ";

	$query2 = "SELECT * FROM warga WHERE no_rw = '$rw' "; 
	$jumlahWarga = count(query($query2));
	$jumlahPenderita = count(query($query1));

	$persentase = ($jumlahPenderita/$jumlahWarga)*100;

	return $persentase;
}
// END FUNCTION CARI 

 ?>