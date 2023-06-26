<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/rw/function-crud.php" ?>
<!-- cek $_get -->
<?php 
if (!isset($_GET['rw'])) {
	header("Location: index.php");
}
// end cek
 ?>

<?php $warga = getAllWarga(); ?>
<?php $rw_exist = cariRwTerdaftar(); ?>
<?php $rw = cariKetuaNIK($_GET['nik']);?>
<div class="container">
<h1 class="mb-3 mt-2">Tambah Data RW</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/rw/ubah.php" method="post" class="form-tambah-warga" id="form-tambah">
			<input type="hidden" name="rw-lama" value="<?= $_GET['rw'] ?>">
			<div class="input-group mb-3">	
				<label class="input-group-text" for="rw">No RW</label>
				<select class="form-select" id="rw" name="rw" required>
					<option value="<?= $_GET['rw'] ?>" selected> <?= $_GET['rw'] ?> </option>
					<?php for ($i=1; $i <= 50;$i++ ): ?>
						<?php if (!in_array($i, $rw_exist)): ?>
							<option value="<?= $i ?>"><?= $i ?></option>	
						<?php endif ?>
					<?php endfor; ?>	
				</select>
			</div>
			<div class="input-group mb-3">	
				<label class="input-group-text" for="NIK">NIK Ketua RW</label>
				<select class="form-select" id="nik" name="nik" required>
					<option value="0" disabled selected> -- Masukkan NIK Ketua RW --</option>
					<?php foreach ($warga as $w): ?>
						<option value="<?= $w['nik_warga'] ?>" <?= $w['nik_warga'] == $rw[0]['nik_ketua_rw'] ? 'selected' : '' ?>>
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