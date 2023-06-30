<?php require_once "../../functions/warga/function-crud.php" ?>

<?php if (isset($_GET['no'])) : ?>
	<?php $w = cariWargaByNIK($_GET['no']); ?>
	<span class="input-group-text" id="basic-addon1">RW/RT : </span>
	<input type="text" class="form-control" name="rt" id="rt" required readonly value="<?= $w['no_rw'] ?>/<?= $w['no_rt'] ?>">
<?php endif; ?>