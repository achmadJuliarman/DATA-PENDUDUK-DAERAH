<?php require_once "../../../functions/keluarga/function-crud.php" ?>
<?php require_once "../../../functions/warga/function-crud.php" ?>

<?php if (isset($_GET['no'])) : ?>
	<?php $kk = getAnggotaKeluargaByNo($_GET['no'])[0]; ?>
	<?php $kepala = getKepalaKeluarga($kk['nik_kepala_kk'])[0]; ?>
	<span class="input-group-text" id="basic-addon1">Nama Kepala Keluarga : </span>
	<input type="text" class="form-control" name="nama" id="nama" required readonly value="<?= $kepala['nama_warga'] ?>">
<?php endif; ?>