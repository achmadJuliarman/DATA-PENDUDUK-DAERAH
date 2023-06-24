<?php 
$conn = mysqli_connect("localhost", "root", '', "data_penduduk");

$tanggalnow = date('Y-m-d');
$tanggalwaktunow = date('Y-m-d h:m:s');
echo $tanggalwaktunow;