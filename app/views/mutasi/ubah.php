<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/mutasi/function-crud.php' ?>
<?php include_once '../../functions/rw/function-crud.php' ?>
<?php include_once '../../functions/keluarga/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>
<?php $keluarga_all = getKeluargaNonMutasi(); ?>
<?php $rw_all = getAllRw(); ?>
<?php $_SESSION['no_kk'] = $_GET['no']; ?>
<?php $_SESSION['id'] = $_GET['id']; ?>
<?php  ?>

<?php 
if (!isset($_GET['id']) && !isset($_GET['no'])) {
	header("Location: index.php");
}else{
	// AGAR JIKA ADA YANG ISENG HAPUS QUERY URL DAN REFRESH DATA TIDAK HILANG
	$no_kk = $_SESSION['no_kk'];
	$id = $_SESSION['id'];
	$wm = getMutasiById($id)[0];
	// var_dump($wm);
}

 ?>
<div class="container">
	<h1 class="mt-4">Ubah Data Warga / Keluarga Mutasi</h1>
	<form action="../../functions/mutasi/ubah.php" method="post">
		<input type="hidden" name="id" value="<?= $id ?>">
		<div class="input-group mb-3">	
			<label class="input-group-text" for="no_kk">No KK : </label>
			<select class="form-select" id="no_kk" name="no_kk" required>
				<option value="<?= $no_kk ?>" selected><?= $no_kk ?></option>
				<?php if (!empty($keluarga_all)) : ?>
					<?php foreach ($keluarga_all as $ka) : ?>
				    	<option value="<?= $ka['no_kk'] ?>" >
				    		<?= $ka['no_kk'] ?>		
						</option>
					<?php endforeach; ?>
				<?php else : ?>
					<option value="" disabled selected>Tidak Ada Lgi Keluarga Yang Bisa Dimutasi</option>
			    <?php endif ?>
			  </select>
		</div>

		<div class="input-group mb-3 disabled" id="rw-input">
			<span class="input-group-text" id="basic-addon1">RW : </span>
			<input type="text" class="form-control" name="rw" id="rw" required readonly value="<?= $wm['rw_kk_mutasi'] ?>">
		</div>
		<script>
			$("#no_kk").change(function(){
				var x = $("#no_kk").val();
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","ajax/rw-ajax.php?no="+x,false);
				xmlhttp.send(null);
				$("#rw-input").html(xmlhttp.responseText);
			});
		</script>

		<div class="input-group mb-3" id="rt-input">
			<span class="input-group-text" id="basic-addon1">RT : </span>
			<input type="text" class="form-control" name="rt" id="rt" required readonly value="<?= $wm['rt_kk_mutasi'] ?>">
		</div>
		<script>
			$("#no_kk").change(function(){
				var x = $("#no_kk").val();
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","ajax/rt-ajax.php?no="+x,false);
				xmlhttp.send();
				$("#rt-input").html(xmlhttp.responseText);
			});
		</script>

		<div class="input-group mb-3" id="nik-input">
			<span class="input-group-text" id="basic-addon1">NIK Kepala Keluarga : </span>
			<input type="text" class="form-control" name="nik" id="nik" required readonly value="<?= $wm['nik_kepala_mutasi'] ?>">
		</div>
		<script>
			$("#no_kk").change(function(){
				var x = $("#no_kk").val();
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","ajax/nik-ajax.php?no="+x,false);
				xmlhttp.send(null);
				$("#nik-input").html(xmlhttp.responseText);
			});
		</script>
		<div class="input-group mb-3" id="nama-input">
			<span class="input-group-text" id="basic-addon1">Nama Kepala Keluarga : </span>
			<input type="text" class="form-control" name="nama" id="nama" required readonly value="<?= $wm['nama_kepala_mutasi'] ?>">
		</div>
		<script>
			$("#no_kk").change(function(){
				var x = $("#no_kk").val();
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","ajax/nama-ajax.php?no="+x,false);
				xmlhttp.send(null);
				$("#nama-input").html(xmlhttp.responseText);
			});
		</script>
		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">Alamat Mutasi : </span>
			<input type="text" class="form-control" placeholder="Masukkan Alamat Mutasi Selengkap Mungkin" name="alamat" required value="<?= $wm['alamat_mutasi'] ?>">
		</div>	
		<div class="input-group date mb-3" data-provide="datepicker">
				<span class="input-group-text" id="inputGroup-sizing-default">Tanggal Mutasi</span>
			    <input type="date" class="form-control" placeholder="Tanggal Mutasi" name="tanggal_mutasi" required value="<?= $wm['tanggal_mutasi'] ?>"> 
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
		<button type="submit" class="btn btn-primary">UBAH</button>
	</form>
</div>
<?php include_once '../layouts/footer.php' ?>