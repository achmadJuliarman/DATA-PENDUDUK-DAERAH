<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/layanan-kesehatan/function-crud.php' ?>
<?php include_once '../../functions/rw/function-crud.php' ?>

<?php $rw_all = getAllRw(); ?>


<div class="container">
	<h1 class="my-3">Tambah Layanan Kesehatan</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/layanan-kesehatan/tambah.php" method="post" class="form-tambah-warga" id="form-tambah">
			<div class="input-group mb-3">	
				<label class="input-group-text" for="rw">RW</label>
				<select class="form-select" id="rw" name="rw" required>
					<?php foreach ($rw_all as $rw): ?>
					<option value="<?= $rw['no_rw'] ?>" > <?= $rw['no_rw'] ?> </option>	
					<?php endforeach ?>
				  </select>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Nama Layanan : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Nama Layanan" name="nama_l" required>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Kontak : </span>
			  <input type="number" class="form-control" placeholder="Masukkan nomor kontak" name="kontak" required>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Alamat : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Alamat Tempat Layanan" name="alamat" required>
			</div>
			<div class="input-group mb-3">	
				<label class="input-group-text" for="jenis_l">Jenis Layanan</label>
				<select class="form-select" id="jenis_l" name="jenis_l" required>
					<option value="0" disabled selected> -- Pilih Jenis Layanan --</option>
					<option value="Praktek"> Praktek </option>
					<option value="Bidan"> Bidan </option>
					<option value="Klinik"> Klinik </option>
					<option value="Rumah Sakit"> Rumah Sakit </option>
					<option value="Apotek"> Apotek </option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">TAMBAH</button>
		</form>
	</div>
</div>
<?php include_once '../layouts/footer.php' ?>