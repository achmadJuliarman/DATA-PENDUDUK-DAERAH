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
function getWargaHidup(){
	global $conn;
	$query = "SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia FROM warga WHERE status_kehidupan = 'Hidup' ORDER BY created_at DESC";

	return query($query);
}

function getWargaMati(){
	global $conn;
	$query = "SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia FROM warga WHERE status_kehidupan = 'Meninggal' ORDER BY created_at DESC";

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
//==================== END FUNGSI UNTUK TAMPIL DATA

//=-================== START FUNGSI CARI WARGA
function cariWargaByNIK($keyword){
	$query = "SELECT * FROM warga WHERE nik_warga = $keyword";
	return query($query)[0];
}
//==================== END FUNGSI CARI WARGA

//==================== FUNGSI TAMBAH DATA WARGA
function tambahWarga($data){
	global $conn;
	$nik = $data['nik'];
	$nama = $data['nama'];
	$tempat_lahir = $data['tempat_lahir'];
	$tanggal_lahir = $data['tanggal_lahir'];
	$alamat_ktp = $data['alamat_ktp'];
	$alamat_tinggal = $data['alamat_tinggal'];
	$rt = $data['rt'];
	$rw = $data['rw'];
	$agama = $data['agama'];
	$pendidikan_terakhir = $data['pendidikan_terakhir'];
	$pekerjaan = $data['pekerjaan'];
	$jenis_kelamin = $data['jenis_kelamin'];
	$status_perkawinan = $data['status_perkawinan'];
	$status_warga = $data['status_warga'];
	$status_kehidupan = $data['status_kehidupan'];
	$kewarganegaraan = $data['kewarganegaraan'];
	$gol_dar = $data['gol_dar'];
	$kontak = $data['kontak'];
	$currentDate = date("Y-m-d h:i:sa");

	$query = "INSERT INTO warga 
	VALUES('$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', 
	'$alamat_ktp', '$alamat_tinggal', '$rt', '$rw', '$agama', 
	'$pendidikan_terakhir', '$pekerjaan', '$jenis_kelamin', '$status_perkawinan', '$status_warga', 
	'$status_kehidupan', '$kewarganegaraan', '$gol_dar', '$kontak' , '$currentDate', '')";

	return mysqli_query($conn, $query);
}
//==================== END FUNGSI TAMBAH DATA WARGA
function ubahWarga($data){
	global $conn;
	$nik = $data['nik'];
	$nama = $data['nama'];
	$tempat_lahir = $data['tempat_lahir'];
	$tanggal_lahir = $data['tanggal_lahir'];
	$alamat_ktp = $data['alamat_ktp'];
	$alamat_tinggal = $data['alamat_tinggal'];
	$rt = $data['rt'];
	$rw = $data['rw'];
	$agama = $data['agama'];
	$pendidikan_terakhir = $data['pendidikan_terakhir'];
	$pekerjaan = $data['pekerjaan'];
	$jenis_kelamin = $data['jenis_kelamin'];
	$status_perkawinan = $data['status_perkawinan'];
	$status_warga = $data['status_warga'];
	$status_kehidupan = $data['status_kehidupan'];
	$kewarganegaraan = $data['kewarganegaraan'];
	$gol_dar = $data['gol_dar'];
	$kontak = $data['kontak'];
	$currentDate = date("Y-m-d h:i:sa");

	$query = "UPDATE warga
	SET nik_warga = '$nik', nama_warga = '$nama', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', 
	alamat_ktp = '$alamat_ktp', alamat_tinggal = '$alamat_tinggal', no_rt = '$rt', no_rw = '$rw', agama = '$agama',  
	pendidikan_terakhir = '$pendidikan_terakhir', pekerjaan = '$pekerjaan', jenis_kelamin = '$jenis_kelamin',
	status_perkawinan = '$status_perkawinan', status_warga = '$status_warga', status_kehidupan = '$status_kehidupan',
	kewarganegaraan = '$kewarganegaraan', gol_darah = '$gol_dar', kontak = '$kontak', updated_at = '$currentDate' 
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

?>	


