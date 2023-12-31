<?php 
require_once __DIR__."/../main-function.php";

// FUNCTION TAMPIL DATA RW
function getAllRw(){
	global $conn;
	$query = "SELECT * FROM rw";
	return query($query);
}
// END FUNCTION TAMPIL

// FUNCTION TAMBAH DATA RW
function tambahRw($data){
	global $conn;
	$rw = htmlspecialchars($data['rw']);
	$nik = htmlspecialchars($data['nik']);
	$currentDate = date("Y-m-d h:i:sa");
	$query = "INSERT INTO rw 
	values('$rw', '$nik', '$currentDate', '')";

	return mysqli_query($conn, $query);
}
// END FUNCTION TAMBAH DATA RW


// FUNCTION UBAH DATA RW
function ubahRw($data){
	global $conn;
	$rw_lama = htmlspecialchars($data['rw-lama']);
	$nik = htmlspecialchars($data['nik']);
	$rw_baru = htmlspecialchars($data['rw']);
	$currentDate = date("Y-m-d h:i:sa");

	$query = "UPDATE rw 
	set nik_ketua_rw = '$nik', 
	updated_at = '$currentDate',
	no_rw = '$rw_baru' 
	WHERE no_rw = '$rw_lama' ";

	return mysqli_query($conn, $query);
}
// END FUNCTION UBAH DATA RW


// FUNCTION HAPUS DATA RW
function hapusRw($rw){
	global $conn;

	$query = "DELETE FROM rw WHERE no_rw = '$rw' ";

	return mysqli_query($conn, $query);
}
// END FUNCTION HAPUS DATA RW


// FUNCTION CARI DATA RW
function cariRw($keyword){

	$query = "SELECT * FROM rw 
			  INNER JOIN warga
			  ON rw.nik_ketua_rw = warga.nik_warga 
			  WHERE rw.no_rw = '$keyword' OR nik_ketua_rw = '$keyword' 
			  OR warga.nama_warga LIKE '$keyword%' ";

	return query($query);
}

function cariKetuaNIK($nik){
	$query = "SELECT * FROM rw WHERE nik_ketua_rw = '$nik' ";

	return query($query);
}

function cariRwTerdaftar(){
	$rw = getAllRw();
	$exist = array();
	for ($i=0; $i < count($rw); $i++) { 
		$exist = array_column($rw, 'no_rw');
		// var_dump($exist);
	}
	return $exist;
}

// END FUNCTION CARI DATA RW
?>