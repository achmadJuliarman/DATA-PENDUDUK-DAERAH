<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/layanan-kesehatan/function-crud.php' ?>
<?php include_once '../../functions/rw/function-crud.php' ?>

<!-- CEK $_GET['id_layanan'] -->
<?php 
if (!isset($_GET['id'])) {
	header("Location: index.php");
}

$lk = cariKesehatanId($_GET['id'])[0];

// var_dump($lk);
// die();

 ?>

<?php 

	$rw_all = getAllRw(); 
?>


<div class="container">
	<h1 class="my-3">Ubah Layanan Kesehatan</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/layanan-kesehatan/ubah.php" method="post" class="form-ubah-warga" id="form-ubah">
			<input type="hidden" name="id_l" value="<?= $lk['id_layanan'] ?>">
			<div class="input-group mb-3">	
				<label class="input-group-text" for="rw">RW</label>
				<select class="form-select" id="rw" name="rw" required>
					<option value="<?= $lk['no_rw'] ?>"> <?= $lk['no_rw'] ?> </option>
					<?php foreach ($rw_all as $rw): ?>
						<?php if ($lk['no_rw'] != $rw['no_rw']): ?>
							<option value="<?= $rw['no_rw'] ?>" > <?= $rw['no_rw'] ?> </option>	
						<?php endif ?>
					<?php endforeach ?>
				  </select>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Nama Layanan : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Nama Layanan" name="nama_l" required value="<?= $lk['nama_layanan'] ?>">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Kontak : </span>
			  <input type="number" class="form-control" placeholder="Masukkan nomor kontak" name="kontak" required value="<?= $lk['kontak'] ?>">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Alamat : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Alamat Tempat Layanan" name="alamat" required value="<?= $lk['alamat_tempat'] ?>">
			</div>
			<div class="input-group mb-3">	
				<label class="input-group-text" for="jenis_l">Jenis Layanan</label>
				<select class="form-select" id="jenis_l" name="jenis_l" required>
					<option value="Praktek" <?=  ($lk['jenis_layanan'] == 'Praktek') ? 'selected' : '' ?> > Praktek </option>
					<option value="Bidan" <?=  ($lk['jenis_layanan'] == 'Bidan') ? 'selected' : '' ?> > Bidan </option>
					<option value="Klinik" <?=  ($lk['jenis_layanan'] == 'Klinik') ? 'selected' : '' ?> > Klinik </option>
					<option value="Rumah Sakit" <?=  ($lk['jenis_layanan'] == 'Rumah Sakit') ? 'selected' : '' ?> > Rumah Sakit </option>
					<option value="Apotek" <?=  ($lk['jenis_layanan'] == 'Apotek') ? 'selected' : '' ?> > Apotek </option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">UBAH</button>
		</form>
	</div>
</div>
<?php include_once '../layouts/footer.php' ?>