<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/penyakit-warga/function-crud.php' ?>
<div class="container">
	<h1 class="mt-4">Tambah Penyakit Warga</h1>
	<form action="../../functions/penyakit-warga/tambah-list.php" method="post">
		<div class="input-group mb-3" id="penyakit">
			<span class="input-group-text" id="basic-addon1">Nama Penyakit : </span>
			<input type="text" class="form-control" placeholder="Masukkan Nama Penyakit" name="penyakit" id="penyakit" required>
		</div>
		<button type="submit" class="btn btn-primary">TAMBAH</button>
	</form>
</div>
<?php include_once '../layouts/footer.php' ?>
