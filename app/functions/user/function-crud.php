<?php 
require_once __DIR__."/../main-function.php";

// FUNCTION TAMPIL DATA
function getAllUser(){
	$query = "SELECT * FROM users";
	return query($query);
}

function getAllUserPaginated($mulaiDari, $jumlahTampil){
	$query = "SELECT * FROM users ORDER BY created_at  ASC LIMIT $mulaiDari, $jumlahTampil";
	return query($query);
}

function getUserById($id){
	$query = "SELECT * FROM users WHERE id_user = '$id' ";

	return query($query); 
}
//END FUNCTION AMBIL DATA


// FUNCTION TAMBAH DATA USER
function tambahUser($data){
	global $conn;
	$level = htmlspecialchars($data['level']);
	$jabatan = htmlspecialchars($data['jabatan']);
	$username = htmlspecialchars($data['username']);
	$nama = htmlspecialchars($data['nama']);
	$password = $data['password'];
	$currentDate = date("Y-m-d h:i:sa");

	$query = "INSERT INTO users 
	VALUES('', '$level', '$jabatan', '$nama', '$username',  '$password', '$currentDate', '')";

	return mysqli_query($conn, $query);
}
// END FUNCTION TAMBAH DATA USER


// FUNCTION UBAH DATA USER
function ubahUser($data){
	global $conn;
	$currentDate = date("Y-m-d h:i:sa");
	$level = htmlspecialchars($data['level']);
	$username = htmlspecialchars($data['username']);
	$nama = htmlspecialchars($data['nama']);
	$password = htmlspecialchars($data['password']);
	$id = htmlspecialchars($data['id']);

	$query = "UPDATE users SET
	nama_lengkap = '$nama',
	username = '$username',
	password = '$password',
	level_user = '$level',
	updated_at = '$currentDate' 
	WHERE id_user = '$id' ";

	return mysqli_query($conn, $query);
}

// END FUNTION UBAH DATA USER



// FUNTION HAPUS DATA USER
function hapusUser($id){
	global $conn;
	$query = "DELETE FROM users WHERE id_user = '$id'";

	return mysqli_query($conn, $query);
}
// END FUNCTION HAPUS DATA USER


// FUNCTION CARI DATA USER
function cariUserPaginated($keyword, $mulaiDari, $jumlahTampil){
	$query = "SELECT * FROM users WHERE 
	level_user LIKE '$keyword' OR
	jabatan LIKE '$keyword%' OR 
	username LIKE '$keyword%' OR 
	nama_lengkap LIKE '%$keyword%' 
	ORDER BY created_at ASC LIMIT $mulaiDari, $jumlahTampil";

	return query($query);
}
// END FUNTCION CARI DATA USER







