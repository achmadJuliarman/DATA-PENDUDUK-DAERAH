<?php 
require_once __DIR__.'/../main-function.php';

function getAllKesehatan(){
	$query = "SELECT * FROM layanan_kesehatan";
	return query($query);
}
function getKesehatanInRw($rw){
	$query = "SELECT * FROM layanan_kesehatan WHERE no_rw = '$rw'";
	return query($query);
}

 ?>