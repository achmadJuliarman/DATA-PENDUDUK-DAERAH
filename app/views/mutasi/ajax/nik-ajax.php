<?php require_once "../../../functions/keluarga/function-crud.php" ?>

<?php if (isset($_GET['no'])) : ?>
	<?php $kk = getAnggotaKeluargaByNo($_GET['no'])[0]; ?>
	<span class="input-group-text" id="basic-addon1">RT : </span>
	<input type="text" class="form-control" name="nik" id="nik" required readonly value="<?= $kk['nik_kepala_kk'] ?>">
<?php endif; ?>