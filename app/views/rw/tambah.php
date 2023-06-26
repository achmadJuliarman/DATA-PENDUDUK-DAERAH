<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/rw/function-crud.php" ?>

<div class="container">
	<?php $rw_all = getAllRw(); ?>
	<?php 
	// harus dibeginikan dulu coy, biar tidak array didalam array
	$rw = array();
	for($i=0; $i < count($rw_all); $i++) {
		$rw = array_column($rw_all, 'no_rw');
	}



 ?>

	<h1 class="mb-3 mt-2">Tambah Data RW</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/rw/tambah.php" method="post" class="form-tambah-warga" id="form-tambah">
			<div class="input-group mb-3">	
				<label class="input-group-text" for="rw">RW</label>
				<select class="form-select" id="rw" name="rw" required>
					<option value="0" disabled selected> -- Masukkan No RW --</option>
					<?php for ($i=1; $i <= 50 ; $i++) : ?>
						<?php if (!in_array($i, $rw)): ?>	
					    	<option value="<?= $i ?>" > <?= $i ?> </option>
						<?php endif ?>
					<?php endfor; ?>
				  </select>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">NIK Ketua RW</span>
			  <input type="number" class="form-control" placeholder="Masukkan NIK" name="nik" required>
			</div>
			<button type="submit" class="btn btn-primary">TAMBAH</button>
		</form>
	</div>
</div>


<?php include_once '../layouts/footer.php' ?>