<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/keluarga/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>
<?php include_once '../../functions/rw/function-crud.php' ?>
<?php include_once '../../functions/rt/function-crud.php' ?>

<?php $keluarga = getAllKeluarga(); ?>
<?php $warga_all = getAllWarga(); ?>
<?php $rw_all = getAllRw(); ?>

<div class="container">
	<h1 class="my-3">Tambah Keluarga</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/keluarga/tambah.php" method="post" class="form-tambah-keluarga" id="form-tambah">
			<input type="hidden" name="id" value="<?= $_SESSION['id-user'] ?>">
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">No KK : </span>
			  <input type="text" class="form-control" placeholder="Masukkan No KK" name="no_kk" required>
			</div>
			<div class="input-group mb-3">	
				<label class="input-group-text" for="nik">NIK Kepala Keluarga</label>
				<select class="form-select" id="nik" name="nik" required>
					<option value="0" disabled selected> -- Pilih NIK --</option>
					<?php foreach ($warga_all as $w) : ?>
						<option value="<?= $w['nik_warga'] ?>"> <?= $w['nik_warga'] ?> | <?= $w['nama_warga'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Alamat : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Alamat KK" name="alamat" required>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Kecamatan : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Alamat Tempat Layanan" name="kecamatan" required>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Kelurahan : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Alamat Tempat Layanan" name="kelurahan" required>
			</div>
			<div class="input-group mb-3">	
				<label class="input-group-text" for="rw">RW</label>
				<select class="form-select" id="rw" name="rw">
					<option value="0" disabled selected> -- Pilih RW --</option>
				    <?php foreach ($rw_all as $rw) : ?>
				    	<option value="<?= $rw['no_rw'] ?>"><?= $rw['no_rw'] ?></option>
					<?php endforeach; ?>
				  </select>
			</div>
				
			<div class="input-group mb-3">	
				<label class="input-group-text" for="rt">RT</label>
				<select class="form-select" id="rt" name="rt">
				 	<option value="0" disabled selected>Pilih RW Terlebih Dahulu</option>
				</select>
				<script>
					$("#rw").change(function(){
						var x = $("#rw").val();
						xmlhttp = new XMLHttpRequest();
						xmlhttp.open("GET","../warga/rt-ajax.php?rw="+x,false);
						xmlhttp.send(null);
						$("#rt").html(xmlhttp.responseText);
					});
				</script>
			</div>

			<button type="submit" class="btn btn-primary">TAMBAH</button>
		</form>
	</div>
</div>
<?php include_once '../layouts/footer.php' ?>