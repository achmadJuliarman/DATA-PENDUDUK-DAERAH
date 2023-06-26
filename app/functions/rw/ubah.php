<?php 
session_start();
require_once 'function-crud.php';
var_dump($_POST);

try {
	ubahRw($_POST);
	$_SESSION['message'] = 'No RW '.$_POST['rw'];
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/rw/');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['ubah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	header('Location: ../../views/rw/');
}
 ?>