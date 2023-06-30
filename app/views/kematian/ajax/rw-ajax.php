<?php require_once "../../../functions/warga/function-crud.php" ?>

<?php if (isset($_GET['no'])) : ?>
	<?php $w = cariWargaByNIK($_GET['no']); ?>
	<span class="input-group-text" id="basic-addon1">RT : </span>
	<input type="text" class="form-control" name="rw" id="rw" required readonly value="<?= $w['no_rt'] ?>">
<?php endif; ?>