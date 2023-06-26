<?php 
require_once __DIR__."/../main-function.php";

// FUNCTION TAMPIL DATA RT
function getAllRt(){
	$query = "SELECT * FROM rt";
	return query($query);
}
function getRtInRw($rw){
	$query = "SELECT * FROM rt WHERE no_rw = '$rw'";
	return query($query);
}

// END FUNCTION TAMPIL DATA RT


// FUNCTION TAMBAH DATA RT
function tambahRt($data){
	global $conn;
	$no_rt = $data['rt'];
	$no_rw = $data['rw'];
	$nik = $data['nik'];
	$currentDate = date("Y-m-d h:i:sa");

	$query = "INSERT INTO rt 
	values('', '$no_rt', '$no_rw', '$nik', '$currentDate', '')";

	return mysqli_query($conn, $query);
}
// END FUNCTION TAMBAH DATA RT


// FUNCTION UBAH DATA RT
function ubahRt($data){
	global $conn;
	$no_rt = $data['rt'];
	$no_rw = $data['rw'];
	$nik = $data['nik'];
	$currentDate = date("Y-m-d h:i:sa");
	
	$query = "UPDATE rt 
	SET no_rw = '$no_rw', nik_ketua_rt = '$nik', updated_at = '$currentDate'
	WHERE no_rt = '$no_rt' ";

	return mysqli_query($conn, $query);
}
// END FUNCTION UBAH DATA RT


// FUNCTION HAPUS DATA RT (TIDAK BOLEH ADA HAPUS DATA RT)
function hapusRt($no){
	global $conn;
	$query = "DELETE FROM rt WHERE no_rt = '$no' WHERE no_rt = '$no' ";

	return mysqli_query($conn, $query); 
}
// END FUNCTION HAPUS DATA RT



// FUNCTION CARI DATA RT
function cariRt($keyword){
	$query = 
	"SELECT * FROM rt 
	INNER JOIN rw
	ON rt.no_rt = rw.no_rw
	INNER JOIN warga
	ON rt.nik_ketua_rt = warga.nik_warga
	WHERE rt.no_rw LIKE '$keyword' OR rt.no_rt LIKE '$keyword' OR
	rt.nik_ketua_rt LIKE '$keyword%' OR nama_warga LIKE '$keyword%' ";

	return query($query);
}

function cariKetuaRt($nik){
	$query = 
	"SELECT * FROM rt WHERE nik_ketua_rt = '$nik' ";

	return query($query);
}
// END FUNCTION DATA RT 
?>
