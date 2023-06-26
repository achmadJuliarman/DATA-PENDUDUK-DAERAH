<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/head-bar.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/alert.php" ?>

<?php 
if (isset($_SESSION['login'])) {
		

} 
?>
<!-- myCard -->
<div class="container">
	<?php 
		if (isset($_SESSION['berhasil'])) {
			alertSuccessLogin($_SESSION['level']);
			unset($_SESSION['berhasil']);
		}
	 ?>
</div>
<!-- end myCard -->
<?php include_once '../layouts/footer.php' ?>