<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/penyakit-warga/function-crud.php' ?>
<?php if (!isset($_GET['id'])) {
	header("Location: list-penyakit.php");
} 
?>

<?php $data_ubah = getListPenyakitById($_GET['id']); ?>

<div class="container">
	<h1 class="mt-4">Tambah Penyakit Warga</h1>
	<form action="../../functions/penyakit-warga/ubah-list.php" method="post">
		<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
		<div class="input-group mb-3" id="penyakit">
			<span class="input-group-text" id="basic-addon1">Nama Penyakit Sebelumnya : </span>
			<input type="text" class="form-control" placeholder="Masukkan Nama Penyakit" name="penyakit_lama" readonly value="<?= $data_ubah[0]['nama_penyakit'] ?>">
		</div>
		Diubah Menjadi : 
		<div class="input-group mb-3" id="penyakit">
			<span class="input-group-text" id="basic-addon1">Nama Penyakit Baru : </span>
			<input type="text" class="form-control" placeholder="Masukkan Nama Penyakit" name="penyakit_baru" required >
		</div>
		<button type="submit" class="btn btn-primary">UBAH</button>
	</form>
</div>
<?php include_once '../layouts/footer.php' ?>
