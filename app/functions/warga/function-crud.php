<?php 
require_once __DIR__."/../main-function.php";

//================== FUNGSI UNTUK TAMPIL DATA WARGA
function getAllWarga(){
	global $conn;
	$query = "SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia FROM warga ORDER BY created_at DESC";

	return query($query);
}
function getAllWargaPaginated($mulaiDari, $jumlahTampil){
	global $conn;
	$query = "SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia FROM warga ORDER BY created_at DESC LIMIT $mulaiDari, $jumlahTampil";

	return query($query);
}

function getJumlahLansia(){
	global $conn;
	$query = "SELECT COUNT(nik_warga) as jumlah FROM warga WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 ORDER BY created_at DESC";

	return query($query)[0]['jumlah'];
}

function getJumlahDewasa(){
	global $conn;
	$query = "SELECT COUNT(nik_warga) as jumlah FROM warga WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 18 ORDER BY created_at DESC";

	return query($query)[0]['jumlah'];
}

function getJumlahRemaja(){
	global $conn;
	$query = "SELECT COUNT(nik_warga) as jumlah FROM warga WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 18 ORDER BY created_at DESC";

	return query($query)[0]['jumlah'];
}

function getJumlahPria(){
	global $conn;
	$query = "SELECT COUNT(nik_warga) as jumlah FROM warga WHERE jenis_kelamin = 'L' ORDER BY created_at DESC";

	return query($query)[0]['jumlah'];
}

function getJumlahWanita(){
	global $conn;
	$query = "SELECT COUNT(nik_warga) as jumlah FROM warga WHERE jenis_kelamin = 'P' ORDER BY created_at DESC";

	return query($query)[0]['jumlah'];
}

function getWargaByKK($no_kk){
	$query = "SELECT * FROM warga WHERE no_kk = '$no_kk' ";
	return query($query);
}

function getKepalaKeluarga($nik){
	$query = "SELECT * FROM warga WHERE nik_warga = '$nik' ";
	return query($query);
}

function getWargaByRw($rw){
	$query = "SELECT * FROM warga WHERE no_rw = '$rw' ";
	return query($query);
}
//==================== END FUNGSI UNTUK TAMPIL DATA

//=-================== START FUNGSI CARI WARGA
function cariWargaByNIK($keyword){
	$query = "SELECT * FROM warga WHERE nik_warga = $keyword";
	return query($query)[0];
}
function cariWargaByNIK_join($nik){
	$query = "SELECT * FROM warga INNER JOIN keluarga ON warga.no_kk = keluarga.no_kk WHERE warga.nik_warga = '$nik' ";
	return query($query)[0];
}
//==================== END FUNGSI CARI WARGA

//==================== FUNGSI TAMBAH DATA WARGA
function tambahWarga($data){
	global $conn;
	$id = htmlspecialchars($data['id-adder']);
	$nik = htmlspecialchars($data['nik']);
	$no_kk = htmlspecialchars($_POST['no_kk']);
	$status_kk = htmlspecialchars($_POST['status_kk']);
	$nama = htmlspecialchars($data['nama']);
	$tempat_lahir = htmlspecialchars($data['tempat_lahir']);
	$tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
	$alamat_ktp = htmlspecialchars($data['alamat_ktp']);
	$alamat_tinggal = htmlspecialchars($data['alamat_tinggal']);
	$rt = htmlspecialchars($data['rt']);
	$rw = htmlspecialchars($data['rw']);
	$agama = htmlspecialchars($data['agama']);
	$pendidikan_terakhir = htmlspecialchars($data['pendidikan_terakhir']);
	$pekerjaan = htmlspecialchars($data['pekerjaan']);
	$jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
	$status_perkawinan = htmlspecialchars($data['status_perkawinan']);
	$status_warga = htmlspecialchars($data['status_warga']);
	$status_kehidupan = htmlspecialchars($data['status_kehidupan']);
	$kewarganegaraan = htmlspecialchars($data['kewarganegaraan']);
	$gol_dar = htmlspecialchars($data['gol_dar']);
	$kontak = htmlspecialchars($data['kontak']);
	$currentDate = date("Y-m-d h:i:sa");

	$query = "INSERT INTO warga 
	VALUES('$nik', '$no_kk', '$status_kk', '$nama', '$tempat_lahir', '$tanggal_lahir', 
	'$alamat_ktp', '$alamat_tinggal', '$rt', '$rw', '$agama', 
	'$pendidikan_terakhir', '$pekerjaan', '$jenis_kelamin', '$status_perkawinan', '$status_warga', 
	'$status_kehidupan', '$kewarganegaraan', '$gol_dar', '$kontak' , 
	'$id', '', '$currentDate', '')";

	return mysqli_query($conn, $query);
}
//==================== END FUNGSI TAMBAH DATA WARGA
function ubahWarga($data){
	global $conn;
	$id = htmlspecialchars($data['id-updater']);
	$nik = htmlspecialchars($data['nik']);
	$no_kk = htmlspecialchars($_POST['no_kk']);
	$status_kk = htmlspecialchars($_POST['status_kk']);
	$nama = htmlspecialchars($data['nama']);
	$tempat_lahir = htmlspecialchars($data['tempat_lahir']);
	$tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
	$alamat_ktp = htmlspecialchars($data['alamat_ktp']);
	$alamat_tinggal = htmlspecialchars($data['alamat_tinggal']);
	$rt = htmlspecialchars($data['rt']);
	$rw = htmlspecialchars($data['rw']);
	$agama = htmlspecialchars($data['agama']);
	$pendidikan_terakhir = htmlspecialchars($data['pendidikan_terakhir']);
	$pekerjaan = htmlspecialchars($data['pekerjaan']);
	$jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
	$status_perkawinan = htmlspecialchars($data['status_perkawinan']);
	$status_warga = htmlspecialchars($data['status_warga']);
	$status_kehidupan = htmlspecialchars($data['status_kehidupan']);
	$kewarganegaraan = htmlspecialchars($data['kewarganegaraan']);
	$gol_dar = htmlspecialchars($data['gol_dar']);
	$kontak = htmlspecialchars($data['kontak']);
	$currentDate = date("Y-m-d h:i:sa");

	$query = "UPDATE warga
	SET nik_warga = '$nik', nama_warga = '$nama', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', 
	alamat_ktp = '$alamat_ktp', alamat_tinggal = '$alamat_tinggal', no_rt = '$rt', no_rw = '$rw', agama = '$agama',  
	pendidikan_terakhir = '$pendidikan_terakhir', pekerjaan = '$pekerjaan', jenis_kelamin = '$jenis_kelamin',
	status_perkawinan = '$status_perkawinan', status_warga = '$status_warga', status_kehidupan = '$status_kehidupan',
	kewarganegaraan = '$kewarganegaraan', gol_darah = '$gol_dar', kontak = '$kontak', updated_at = '$currentDate',
	id_updater = '$id', status_kk = '$status_kk', no_kk = '$no_kk' 
	WHERE nik_warga = '$nik' ";
 
	return mysqli_query($conn, $query);
}

// FUNCTION HAPUS DATA WARGA
function hapusWarga($nik)
{
	global $conn;
	$query = "DELETE FROM warga WHERE nik_warga = '$nik' ";

	return mysqli_query($conn, $query);

}

// FUNGSI CARI DATA WARGA

function cariWargaNIK($nik){
	$query = "SELECT * FROM warga WHERE nik_warga = '$nik' ";
	return query($query);
}

function cariWargaPaginated($keyword, $mulaiDari, $jumlahTampil){
	$query = "SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia FROM warga WHERE 
	nik_warga LIKE '$keyword%' OR 
	no_kk LIKE '$keyword%' OR 
	status_kk LIKE '$keyword%' OR 
	nama_warga LIKE '$keyword%' OR
	tempat_lahir LIKE '$keyword%' OR
	tanggal_lahir LIKE '$keyword%' OR
	alamat_ktp LIKE '$keyword%' OR
	alamat_tinggal LIKE '$keyword%' OR
	no_rt = '$keyword' OR
	no_rw = '$keyword' OR
	agama LIKE '$keyword%' OR
	pendidikan_terakhir LIKE '$keyword' OR
	pekerjaan LIKE '$keyword%' OR
	jenis_kelamin LIKE '$keyword' OR
	status_perkawinan LIKE '$keyword%' OR
	status_warga LIKE '$keyword%' OR
	status_kehidupan LIKE '$keyword%' OR
	kewarganegaraan LIKE '$keyword%' OR
	gol_darah LIKE '$keyword' OR
	kontak LIKE '$keyword' LIMIT $mulaiDari, $jumlahTampil";

	return query($query);
}


?>	


