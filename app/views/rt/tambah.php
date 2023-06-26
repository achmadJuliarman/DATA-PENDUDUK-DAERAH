<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/rw/function-crud.php" ?>
<div class="container">
<?php 
	$rt_all = getRtInRw($_GET['rw']); 
	$rt = array();
	for($i=0; $i < count($rt_all); $i++) {
		$rt = array_column($rt_all, 'no_rt'); // agar tidak [][]
	}

	$warga = getAllWarga();
	// var_dump($rt);

if (isset($_GET['rw'])) {
	$rw = $_GET['rw'];
	$_SESSION['query-rw'] = $_GET['rw'];
}else if(isset($_SESSION['query-rw'])){
	$rw = $_SESSION['query-rw'];
}else{
	$rw = 1;
}

 ?>
<h1 class="mb-3 mt-2">Tambah Data RT Di <b>RW <?= $rw ?></b></h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/rt/tambah.php" method="post" class="form-tambah-warga" id="form-tambah">
			<div class="input-group mb-3">	
				<label class="input-group-text" for="rt">RT</label>
				<select class="form-select" id="rt" name="rt" required>
					<option value="0" disabled selected> -- Masukkan No RT --</option>
					<?php for ($i=1; $i <= 50 ; $i++) : ?>
						<?php if (!in_array($i, $rt)): ?>	
					    	<option value="<?= $i ?>" > <?= $i ?> </option>
						<?php endif ?>
	  				<?php endfor; ?>
				  </select>
			</div>
			<input type="hidden" value="<?= $rw ?>" name="rw">
			<div class="input-group mb-3">	
				<label class="input-group-text" for="NIK">NIK Ketua RT</label>
				<select class="form-select" id="nik" name="nik" required>
					<option value="0" disabled selected> -- Masukkan NIK Ketua RW --</option>
					<?php foreach ($warga as $w): ?>
						<option value="<?= $w['nik_warga'] ?>"><?= $w['nik_warga']; ?> | <?= $w['nama_warga'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">TAMBAH</button>
		</form>
	</div>
</div>

	
</div>
<?php include_once '../layouts/footer.php' ?>