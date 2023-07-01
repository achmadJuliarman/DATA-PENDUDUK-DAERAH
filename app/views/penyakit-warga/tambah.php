<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/kematian/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>

<?php $warga = getAllWarga(); ?>
<?php //$penyakit = getPenyakitBelumDiderita($warga['nik_warga']); ?>
<div class="container">

	<h1 class="mt-4">Tambah Penyakit Warga</h1>
	<form action="../../functions/penyakit-warga/tambah.php" method="post">
		<div class="input-group mb-3">	
			<label class="input-group-text" for="nik">NIK : </label>
			<select class="form-select" id="nik" name="nik" required id="nik">
				<option value="0" disabled selected> -- Pilih NIK --</option>
				<?php foreach ($warga as $w) : ?>
					<option value="<?= $w['nik_warga'] ?>"><?= $w['nik_warga'] ?> | <?= $w['nama_warga'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="input-group mb-3" id="rw-rt-input">
			<span class="input-group-text" id="basic-addon1">RW/RT : </span>
			<input type="text" class="form-control" placeholder="Pilih NIK Terlebih Dahulu" name="rw" id="rw" required readonly>
		</div>
		<script>
			$("#nik").change(function(){
				var x = $("#nik").val();
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","ajax/rw-rt-ajax.php?no="+x,false);
				xmlhttp.send(null);
				$("#rw-rt-input").html(xmlhttp.responseText);
			});
		</script>
		<div class="input-group mb-3" id="list-penyakit">	
			<label class="input-group-text" for="penyakit">Penyakit : </label>
			<select class="form-select" id="penyakit" name="penyakit" required >
				<option value="0" disabled selected> -- Pilih NIK Terlebih Dahulu--</option>
			</select>
		</div>
		<script>
			$("#nik").change(function(){
				var x = $("#nik").val();
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","ajax/penyakit-ajax.php?no="+x,false);
				xmlhttp.send(null);
				$("#list-penyakit").html(xmlhttp.responseText);
			});
		</script>
		<button type="submit" class="btn btn-primary">TAMBAH</button>
	</form>
</div>
<?php include_once '../layouts/footer.php' ?>