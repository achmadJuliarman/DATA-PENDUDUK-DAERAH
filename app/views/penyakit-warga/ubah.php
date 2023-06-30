<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/penyakit-warga/function-crud.php' ?>
<div class="container">
	
<?php 
if (!isset($_GET['id'])) {
 	header("Location: index.php");
}

 ?>

<?php $p = getPenyakitById($_GET['id'])[0]; ?>


	<h1 class="mt-4">Ubah Penyakit Warga</h1>
	<form action="../../functions/penyakit-warga/ubah.php" method="post">
		<input type="hidden" name="id-penyakit" value="<?= $_GET['id'] ?>">
		<input type="hidden" name="nama" value="<?= $p['nama_warga'] ?>">
		<div class="input-group mb-3">	
			<label class="input-group-text" for="nik">No KK : </label>
			<select class="form-select" id="nik" name="nik" required id="nik">
				<option value="<?= $p['nik_penyakit'] ?>" selected readonly>
					<?= $p['nik_penyakit'] ?> | <?= $p['nama_warga'] ?>
				</option>
			</select>
		</div>
		<div class="input-group mb-3" id="rw-rt-input">
			<span class="input-group-text" id="basic-addon1">RW/RT : </span>
			<input type="text" class="form-control" placeholder="" name="rw" id="rw" required readonly value="<?= $p['no_rw'] ?>/<?= $p['no_rt'] ?>">
		</div>
		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">Penyakit : </span>
			<input type="text" class="form-control" placeholder="" name="penyakit" id="penyakit" required value="<?= $p['nama_penyakit'] ?>">
		</div>
		<button type="submit" class="btn btn-primary">UBAH</button>
	</form>
</div>
<?php include_once '../layouts/footer.php' ?>