<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/keluarga/function-crud.php' ?>
<?php include_once '../../functions/rw/function-crud.php' ?>
<?php if (!isset($_GET['no_kk'])) {
	header("Location: index.php");
} ?>
<div class="container">
	<?= $_GET['no_kk'] ?>

</div>
<?php include_once '../layouts/footer.php' ?>