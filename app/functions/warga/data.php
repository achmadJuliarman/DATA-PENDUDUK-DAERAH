<?php 
require_once __DIR__."/../main-function.php";

$query_all_warga = "SELECT * FROM warga";

$result = mysqli_query($conn, $query_all_warga);
$warga = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$warga[] = $row;
	}
// var_dump($warga);
?>

