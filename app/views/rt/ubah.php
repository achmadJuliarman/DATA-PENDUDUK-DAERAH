<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/rw/function-crud.php" ?>

<!-- CEK $_GET -->
<?php 
if (!isset($_GET['rw']) && !isset($_GET['rt'])) {
	header("Location: index.php");
}
 ?>

<?php $warga = getAllWarga(); ?>
<?php $ketua_rt = cariKetuaRt($_GET['nik']);?>
<?php $rt_terdaftar = cariRtTerdaftar($_GET['rw']); //var_dump($rt_terdaftar); die(); ?>
<?php //var_dump($rt); die(); ?>
<div class="container">
<h1 class="mb-3 mt-2">Ubah Data <b>RT <?= $_GET['rt'] ?></b> Di <b>RW <?= $_GET['rw'] ?> </b></h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/rt/ubah.php" method="post" class="form-tambah-warga" id="form-tambah">
			<input type="hidden" name="rt-lama" value="<?= $_GET['rt'] ?>">
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">No RW</span>
			  <input type="number" class="form-control" placeholder="Masukkan RW" name="rw" required value="<?= $_GET['rw'] ?>" readonly>
			</div>
			<div class="input-group mb-3">	
				<label class="input-group-text" for="rt">RT Ketua RW</label>
				<select class="form-select" id="rt" name="rt" required>
					<option value="0" disabled selected> -- Masukkan RT Ketua RW --</option>
					<?php for ($i=1; $i<=50; $i++): ?>
						<?php if (!in_array($i, $rt_terdaftar)): ?>
							<option value="<?= $i ?>"><?= $i ?></option>
						<?php else : ?>
							<option value="<?= $i ?>" selected><?= $i ?></option>
						<?php endif; ?>
					<?php endfor; ?>
				</select>
			</div>			
			<div class="input-group mb-3">	
				<label class="input-group-text" for="NIK">NIK Ketua RW</label>
				<select class="form-select" id="nik" name="nik" required>
					<option value="0" disabled selected> -- Masukkan NIK Ketua RW --</option>
					<?php foreach ($warga as $w): ?>
						<option value="<?= $w['nik_warga'] ?>" <?= $w['nik_warga'] == $ketua_rt[0]['nik_ketua_rt'] ? 'selected' : '' ?>>
							<?= $w['nik_warga']; ?> | <?= $w['nama_warga'] ?> 
						</option>
					<?php endforeach ?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">UBAH</button>
		</form>
	</div>
</div>

	
</div>
<?php include_once '../layouts/footer.php' ?>