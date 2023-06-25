<?php 
$conn = mysqli_connect("localhost", "root", '', "data_penduduk");

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


$tanggalnow = date('Y-m-d');
$tanggalwaktunow = date('Y-m-d h:m:s');
// echo $tanggalwaktunow;