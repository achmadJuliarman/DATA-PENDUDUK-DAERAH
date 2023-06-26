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
	$rw = $data['rw'];
	$nik = $data['nik'];
	$currentDate = date("Y-m-d h:i:sa");
	$query = "INSERT INTO rw 
	values('$rw', '$nik', '$currentDate', '')";

	return mysqli_query($conn, $query);
}
// END FUNCTION TAMBAH DATA RW


// FUNCTION UBAH DATA RW
function ubahRw($data){
	global $conn;
	$nik = $data['nik'];
	$rw = $data['rw'];
	$currentDate = date("Y-m-d h:i:sa");

	$query = "UPDATE rw set nik_ketua_rw = '$nik', updated_at = '$currentDate' WHERE no_rw = '$rw' ";

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

?>