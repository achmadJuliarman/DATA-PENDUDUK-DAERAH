<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>

<?php 

if (isset($_GET['rw'])) {
	$rt = getRtInRw($_GET['rw']);

?>
	<?php if (empty($rt)) : ?>
		<option value="0" disabled selected>Belum Ada Data RT di RW ini</option>
	<?php else : ?>	

	<?php foreach ($rt as $r) : ?>
		<option value="<?= $r["no_rt"] ?>"><?= $r["no_rt"] ?></option>
	<?php endforeach; ?>

	<?php endif ?>
<?php } ?>