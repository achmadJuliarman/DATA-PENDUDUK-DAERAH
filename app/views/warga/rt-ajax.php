<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>

<?php 

if (isset($_GET['rw'])) {
	$rt = getRtInRw($_GET['rw']);
	foreach ($rt as $r) : ?>
		<option value="<?= $r["no_rt"] ?>"><?= $r["no_rt"] ?></option>
	<?php endforeach; ?>
<?php } ?>