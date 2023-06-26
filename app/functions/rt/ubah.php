<?php 
session_start();
require_once 'function-crud.php';
var_dump($_POST);

try {
	ubahRt($_POST);
	$_SESSION['message'] = 'No RT '.$_POST['rt'];
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/rt/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['ubah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/rt/');
}
 ?>