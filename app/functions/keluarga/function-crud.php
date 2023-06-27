<?php 
require_once __DIR__.'/../main-function.php';

// FUNCTION TAMPIL DATA KELUARGA
function getAllKeluarga(){
	$query = "SELECT * FROM keluarga GROUP BY no_kk ASC";
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
	$query = "SELECT * FROM keluarga WHERE 
	no_kk LIKE '$keyword%' OR 
	nik_kk LIKE '$keyword%' OR 
	status_kk LIKE '%$keyword%' OR 
	alamat_kk LIKE '%$keyword%' OR 
	no_rt_kk LIKE '$keyword%' AND no_rw_kk = '$rw' ";

	return query($query);
}
// END FUNCTION CARI DATA




 ?>