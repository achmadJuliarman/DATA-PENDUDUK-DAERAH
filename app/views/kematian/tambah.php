<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/kematian/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>

<?php $warga = getWargaHidup(); ?>
<div class="container">

	<h1 class="mt-4">Tambah Data Kematian</h1>
	<form action="../../functions/kematian/tambah.php" method="post">
		<div class="input-group mb-3">	
			<label class="input-group-text" for="nik">No KK : </label>
			<select class="form-select" id="nik" name="nik" required id="nik">
				<option value="0" disabled selected> -- Pilih NIK --</option>
				<?php if (!empty($warga)) : ?>
					<?php foreach ($warga as $w) : ?>
				    	<option value="<?= $w['nik_warga'] ?>"><?= $w['nik_warga'] ?> | <?= $w['nama_warga'] ?></option>
					<?php endforeach; ?>
				<?php else : ?>
					<option value="" disabled selected>Tidak Ada Lagi Keluarga Hidup</option>
			    <?php endif ?>
			</select>
		</div>
		<div class="input-group mb-3" id="rw-input">
			<span class="input-group-text" id="basic-addon1">RW : </span>
			<input type="text" class="form-control" placeholder="Pilih NIK Terlebih Dahulu" name="rw" id="rw" required readonly>
		</div>
		<script>
			$("#nik").change(function(){
				var x = $("#nik").val();
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","ajax/rw-ajax.php?no="+x,false);
				xmlhttp.send(null);
				$("#rw-input").html(xmlhttp.responseText);
			});
		</script>

		<div class="input-group mb-3" id="rt-input">
			<span class="input-group-text" id="basic-addon1">RT : </span>
			<input type="text" class="form-control" placeholder="Pilih NIK Terlebih Dahulu" name="rt" id="rt" required readonly>
		</div>
		<script>
			$("#nik").change(function(){
				var x = $("#nik").val();
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","ajax/rt-ajax.php?no="+x,false);
				xmlhttp.send(null);
				$("#rt-input").html(xmlhttp.responseText);
			});
		</script>
		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">Usia : </span>
			<input type="number" class="form-control" placeholder="Masukkan Usia Saat Meninggal" name="usia" id="usia" required>
		</div>
		<div class="form-floating mb-3">
		  <textarea class="form-control" placeholder="Masukkan Deskripsi Kematian" id="deskripsi" style="height: 100px" name="deskripsi"></textarea>
		  <label for="floatingTextarea2">Deskripsi</label>
		</div>
		<div class="input-group date mb-3" data-provide="time-picker">
				<span class="input-group-text" id="inputGroup-sizing-default">Tanggal Kematian</span>
			    <input type="date" class="form-control" placeholder="Tanggal Kematian" name="tanggal" required> 
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
		<button type="submit" class="btn btn-primary">TAMBAH</button>
	</form>
</div>
<?php include_once '../layouts/footer.php' ?>