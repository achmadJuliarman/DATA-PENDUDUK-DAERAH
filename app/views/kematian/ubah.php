<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/kematian/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>
<?php 
if (!isset($_GET['id'])) {
	header("Location: index.php");
}
 ?>
<?php $warga = getWargaHidup(); ?>
<?php $warga_mati = getKematianById($_GET['id'])[0]; ?>
<?php //var_dump($warga_mati); ?>
<div class="container">

	<h1 class="mt-4">Ubah Data Kematian</h1>
	<form action="../../functions/kematian/ubah.php" method="post">
		<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
		<div class="input-group mb-3">	
			<label class="input-group-text" for="nik">No KK : </label>
			<select class="form-select" id="nik" name="nik" required id="nik">
				<option value="0" disabled selected> -- Pilih NIK --</option>
				<?php if (!empty($warga)) : ?>
					<option value="<?= $warga_mati['nik_kematian'] ?>" selected><?= $warga_mati['nik_kematian'] ?> | <?= $warga_mati['nama_warga'] ?></option>
					<?php foreach ($warga as $w) : ?>
				    	<option value="<?= $w['nik_warga'] ?>">
				    		<?= $w['nik_warga'] ?> | <?= $w['nama_warga'] ?>	
				    	</option>
					<?php endforeach; ?>
				<?php else : ?>
					<option value="" disabled selected>Tidak Ada Lagi Keluarga Hidup</option>
			    <?php endif ?>
			</select>
		</div>
		<div class="input-group mb-3" id="rw-input">
			<span class="input-group-text" id="basic-addon1">RW : </span>
			<input type="text" class="form-control" placeholder="Pilih NIK Terlebih Dahulu" name="rw" id="rw" required readonly 
			value="<?= $warga_mati['rw_kematian'] ?>">
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
			<input type="text" class="form-control" placeholder="Pilih NIK Terlebih Dahulu" name="rt" id="rt" required readonly
			value="<?= $warga_mati['rw_kematian'] ?>">
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
			<input type="number" class="form-control" placeholder="Masukkan Usia Saat Meninggal" name="usia" id="usia" required 
			value="<?= $warga_mati['usia_kematian']?>">
		</div>
		<div class="form-floating mb-3">
		  <textarea class="form-control" placeholder="Masukkan Deskripsi Kematian" id="deskripsi" style="height: 100px" 
		  name="deskripsi"><?= $warga_mati['deskripsi_kematian'] ?></textarea>
		  <label for="floatingTextarea2">Deskripsi</label>
		</div>
		<div class="input-group date mb-3" data-provide="time-picker">
				<span class="input-group-text" id="inputGroup-sizing-default">Tanggal Kematian</span>
			    <input type="date" class="form-control" placeholder="Tanggal Kematian" name="tanggal" required value="<?= $warga_mati['tanggal_kematian']?>"> 
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
		<button type="submit" class="btn btn-primary">UBAH</button>
	</form>
</div>
<?php include_once '../layouts/footer.php' ?>