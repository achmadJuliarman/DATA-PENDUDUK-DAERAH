<?php 
require_once __DIR__."/../main-function.php";


// QUERY TAMPIL DATA
$query_warga_all = "SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia FROM warga ORDER BY created_at DESC";

$query_warga_hidup = 
"SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia FROM warga WHERE status_kehidupan = 'Hidup' ORDER BY created_at DESC";

$query_warga_mati = 
"SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia FROM warga WHERE status_kehidupan = 'Meninggal' ORDER BY created_at DESC";

$query_warga_lansia = "SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia FROM warga WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 ORDER BY created_at DESC";

$query_jumlah_lansia ="SELECT COUNT(TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE())) as jumlah FROM warga WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 ORDER BY created_at DESC";

$query_jumlah_remaja ="SELECT COUNT(TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE())) as jumlah FROM warga WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 18 ORDER BY created_at DESC";

$query_jumlah_dewasa ="SELECT COUNT(TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE())) as jumlah FROM warga WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 18 ORDER BY created_at DESC";

// query jumlah kelamin
$query_jumlah_pria ="SELECT COUNT(jenis_kelamin) as jumlah FROM warga WHERE jenis_kelamin = 'L' ORDER BY created_at DESC";
$query_jumlah_wanita ="SELECT COUNT(jenis_kelamin) as jumlah FROM warga WHERE jenis_kelamin = 'P' ORDER BY created_at DESC";

$warga_all = query($query_warga_all);
$warga_hidup = query($query_warga_hidup);
$warga_mati = query($query_warga_mati);
$jumlah_lansia = query($query_jumlah_lansia);
$jumlah_remaja = query($query_jumlah_remaja);
$jumlah_dewasa = query($query_jumlah_dewasa);
$jumlah_pria = query($query_jumlah_pria);
$jumlah_wanita = query($query_jumlah_wanita);
// var_dump($warga);
?>	


