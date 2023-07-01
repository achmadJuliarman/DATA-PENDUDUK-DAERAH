<?php require_once "../../../functions/penyakit-warga/function-crud.php" ?>
<?php $penyakit = getPenyakitBelumDiderita($_GET['no']); ?>
<label class="input-group-text" for="penyakit">Penyakit : </label>
<select class="form-select" id="penyakit" name="penyakit" required >
<?php foreach ($penyakit as $p) : ?>
	<option value="<?= $p['id_penyakit'] ?>"> <?= $p['nama_penyakit'] ?></option>
<?php endforeach ?>
</select>