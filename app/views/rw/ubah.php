<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/rw/function-crud.php" ?>

<div class="container">
<h1 class="mb-3 mt-2">Tambah Data RW</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/rw/ubah.php" method="post" class="form-tambah-warga" id="form-tambah">
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">No RW</span>
			  <input type="number" class="form-control" placeholder="Masukkan RW" name="rw" required value="<?= $_GET['rw'] ?>" readonly>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">NIK Ketua RW</span>
			  <input type="number" class="form-control" name="nik" required value="<?= $_GET['nik'] ?>">
			</div>
			<button type="submit" class="btn btn-primary">UBAH</button>
		</form>
	</div>
</div>

	
</div>
<?php include_once '../layouts/footer.php' ?>