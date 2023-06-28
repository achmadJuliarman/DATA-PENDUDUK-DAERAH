<?php 
require_once __DIR__.'/../main-function.php';

// FUNCTION TAMPIL DATA KELUARGA
function getAllKeluarga(){
	$query = "SELECT * FROM keluarga";
	return query($query);
}

function getJumlahKeluarga(){
	$query = "SELECT * FROM keluarga GROUP BY no_kk";
	return count(query($query));
}

function getJumlahKeluargaInRw($rw){
	$query = "SELECT * FROM keluarga WHERE no_rw_kk = '$rw' GROUP BY no_kk";
	return count(query($query));
}


function getKeluargaInRw($rw){
	$query = "SELECT * FROM keluarga WHERE no_rw_kk = '$rw' ";
	return query($query);
}

function getAnggotaKeluargaByNo($no){
	$query = "SELECT * FROM keluarga WHERE no_kk = '$no' ";
	return query($query);
}
// END FUNCTION TAMPIL DATA



// FUNCTION TAMBAH DATA
function tambahKeluarga($data){
	global $conn;
	$id = $data['id-adder'];
	$no_kk = $data['no_kk'];
	$nik = $data['nik'];
	$alamat = $data['alamat'];
	$kecamatan = $data['kecamatan'];
	$kelurahan = $data['kelurahan'];
	$rw = $data['rw'];
	$rt = $data['rt'];
	$currentDate = date("Y-m-d h:i:sa");

	$query = "INSERT INTO keluarga 
	VALUES('$no_kk', '$nik', '$alamat', '$kecamatan', '$kelurahan', '$rw', '$rt', '$id', '', '$currentDate', '' ) ";
	mysqli_query($conn, $query);

	$query2 = "UPDATE warga 
	SET status_kk = 'Kepala Keluarga',
	no_kk = '$no_kk'
	WHERE nik_warga = '$nik' ";
	return mysqli_query($conn, $query2);
}

// END FUNCTION TAMBAH DATA


// FUNCTION UBAH DATA
function ubahKeluarga($data){
	global $conn;
	$id = $data['id-updater'];
	$no_kk_lama = $data['kk-lama'];
	$nik_lama = $data['nik-lama'];
	$no_kk = $data['kk-baru'];
	$nik = $data['nik-baru'];
	$alamat = $data['alamat'];
	$kecamatan = $data['kecamatan'];
	$kelurahan = $data['kelurahan'];
	$rw = $data['rw'];
	$rt = $data['rt'];
	$currentDate = date("Y-m-d h:i:sa");

	if ($nik_lama != $nik) {
		$query1 = "UPDATE warga SET status_kk = 'Anak' WHERE nik_warga = $nik_lama";
		$query3 = "UPDATE warga SET status_kk = 'Kepala Keluarga', no_kk = '$no_kk' WHERE nik_warga = '$nik' ";
		mysqli_query($conn, $query3);
		mysqli_query($conn, $query1);
	}
	$query2 = "UPDATE keluarga 
	SET no_kk = '$no_kk',
	nik_kepala_kk = '$nik',
	alamat_kk = '$alamat',
	kecamatan_kk = '$kecamatan',
	kelurahan_kk = '$kelurahan',
	no_rw_kk = '$rw',
	no_rt_kk = '$rt',
	id_updater = '$id',
	updated_at = '$currentDate'
	WHERE no_kk = '$no_kk_lama' ";

	return mysqli_query($conn, $query2);

}
// END FUNCTION UBAH DATA

// FUNCTION HAPUS DATA
function hapusKeluarga($no_kk){
	global $conn;
	$query = "DELETE FROM keluarga WHERE no_kk = '$no_kk' ";

	return mysqli_query($conn,$query);
}
// END FUNCTION


// FUNCTION CARI DATA
function cariKeluarga($keyword){
	$query = "SELECT * FROM keluarga WHERE 
	no_kk LIKE '$keyword%' OR 
	nik_kk LIKE '$keyword%' OR 
	status_kk LIKE '%$keyword%' OR 
	alamat_kk LIKE '%$keyword%' OR 
	no_rt_kk LIKE '$keyword%' OR 
	no_rw_kk LIKE '$keyword%' ";

	return query($query);
}

function cariKeluargaInRw($keyword, $rw){
	$query = "SELECT * FROM keluarga 
	INNER JOIN warga
	ON keluarga.no_kk = warga.no_kk
	WHERE 
	keluarga.no_kk LIKE '$keyword%' OR
	keluarga.nik_kepala_kk LIKE '$keyword%' OR
	no_rt_kk LIKE '$keyword%' OR
	no_rw_kk LIKE '$keyword%' OR
	alamat_kk LIKE '$keyword%' OR
	status_kk LIKE '$keyword%' OR
	nama_warga LIKE '$keyword%'
	AND no_rw_kk = '$rw' GROUP BY keluarga.no_kk ";

	return query($query);
}
// END FUNCTION CARI DATA




 ?>