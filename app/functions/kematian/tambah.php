<?php 
session_start();
require_once 'function-crud.php';

var_dump($_POST);
// die();
try {
	tambahKematian($_POST);
	$_SESSION['tambah'] = true;
	$_SESSION['kode_err'] = '';
	header('Location: ../../views/kematian/index.php');
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['tambah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	// header('Location: ../../views/kematian/index.php');

}