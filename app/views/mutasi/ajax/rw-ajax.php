<?php require_once "../../../functions/keluarga/function-crud.php" ?>

<?php if (isset($_GET['no'])) : ?>
	<?php $kk = getAnggotaKeluargaByNo($_GET['no'])[0]; ?>
	<span class="input-group-text" id="basic-addon1">RW : </span>
	<input type="text" class="form-control" name="rw" id="rw" required readonly value="<?= $kk['no_rw_kk'] ?>">
<?php endif; ?>