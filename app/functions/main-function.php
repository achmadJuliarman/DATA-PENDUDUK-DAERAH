<?php 
$conn = mysqli_connect("localhost", "root", '', "data_penduduk");
date_default_timezone_set('Asia/Jakarta');
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
		while( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
	return $rows;
}

// ini tidak terpakai
$tanggalNow = date('Y-m-d');
$currentDateTime = date('Y-m-d h:m:s');

// echo $tanggalwaktunow;