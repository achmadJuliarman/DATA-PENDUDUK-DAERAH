<?php 
session_start();
require_once 'function-crud.php';
var_dump($_POST);
// die();

try {
	ubahMutasi($_POST);
	$_SESSION['message'] = 'NO KK : '.$_POST['no_kk'];
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/mutasi/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['ubah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/mutasi/');
}
 ?>