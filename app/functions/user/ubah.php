<?php 
session_start();
require_once 'function-crud.php';

// var_dump($_POST);
// die();
try {
	ubahUser($_POST);
	$_SESSION['message'] = 'Username '.$_POST['username'];
	$_SESSION['ubah'] = true;
	$_SESSION['kode_err'] = '';
	if (isset($_GET['page'])) {
		header("Location: ../../views/user/index.php");
	}else{
		header("Location: ../../views/user/profil.php");
	}
} catch (Exception $e) {
	echo $e->getCode();
	echo $e->getMessage();
	$_SESSION['ubah'] = false;
	$_SESSION['kode_err'] =  $e->getCode();
	echo "<script>history.back()<script>";
}



 ?>
