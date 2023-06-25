<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>

<?php if (!isset($_GET['nik'])) {
	header("Location: index.php");
} ?>
<?php $warga_ubah = cariWargaByNIK($_GET['nik']); ?>
<div class="container">
	<?php //var_dump($warga_ubah); die(); ?>
	<h1 class="mb-3 mt-2">Ubah Data Warga</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/warga/tambah.php" method="post" class="form-tambah-warga" id="form-tambah">
			<h3>A. Data KTP</h3>
			<div class="form-floating mb-3">
				<input type="number" class="form-control" placeholder="nama" name="nik" required disabled value="<?= $warga_ubah['nik_warga'] ?>">
				<label for="floatingInputDisabled">NIK</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="nama" required value="<?= $warga_ubah['nama_warga'] ?>">
				<label for="floatingInputDisabled">Nama</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="tempat_lahir" required value="<?= $warga_ubah['tempat_lahir'] ?>">
				<label for="floatingInputDisabled">Tempat Lahir</label>
			</div>
			<div class="input-group date mb-3" data-provide="datepicker">
				<span class="input-group-text" id="inputGroup-sizing-default">Tanggal Lahir</span>
			    <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?= $warga_ubah['tanggal_lahir'] ?>"> 
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
			  <select class="form-select" id="inputGroupSelect01" name="jenis_kelamin">
			   <option value="L">Pria</option>
			   <option value="P">Wanita</option>
			  </select>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Status Perkawinan</label>
			  <select class="form-select" id="inputGroupSelect01" name="status_perkawinan">
			   <option selected value="Belum Kawin">Belum Kawin</option>
			   <option value="Kawin">Kawin</option>
			  </select>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Golongan Darah</label>
			  <select class="form-select" id="inputGroupSelect01" name="gol_dar">
			   <option selected value="O">O</option>
			   <option value="A">A</option>
			   <option value="B">B</option>
			   <option value="AB">AB</option>
			  </select>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Agama</label>
			  <select class="form-select" id="inputGroupSelect01" name="agama">
			    <option selected value="Islam">Islam</option>
			    <option value="Katholik">Katholik</option>
			    <option value="Kristen">Kristen</option>
			    <option value="Hindu">Hindu</option>
			    <option value="Buddha">Buddha</option>
			  </select>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="kewarganegaraan" required>
				<label for="floatingInputDisabled">Kewarganegaraan</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="alamat_ktp" required>
				<label for="floatingInputDisabled">Alamat KTP (Format : JL, RT/RW, KEC, KEL, NO Rumah)</label>
			</div>


			<h3>B. Data Lainnya</h3>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="alamat_tinggal" required>
				<label for="floatingInputDisabled">Alamat Tinggal (Format : JL, KEC, KEL, NO Rumah)</label>
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
						xmlhttp.open("GET","rt-ajax.php?rw="+x,false);
						xmlhttp.send(null);
						$("#rt").html(xmlhttp.responseText);
					});
				</script>
			</div>
			
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Status Warga</label>
			  <select class="form-select" id="inputGroupSelect01" name="status_warga">
			   <option selected value="Tetap">Tetap</option>
			   <option value="Kontrak">Kontrak</option>
			  </select>
			</div>

			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Status Kehidupan</label>
			  <select class="form-select" id="inputGroupSelect01" name="status_kehidupan">
			   <option selected value="Hidup">Hidup</option>
			   <option value="Meninggal">Meninggal</option>
			  </select>
			</div>

			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Kontak</span>
			  <input type="number" class="form-control" placeholder="Masukkan nomor kontak" name="kontak">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Pekerjaan</span>
			  <input type="text" class="form-control" placeholder="Masukkan pekerjaan" name="pekerjaan">
			</div>

			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Pendidikan Terakhir</label>
			  <select class="form-select" id="inputGroupSelect01" name="pendidikan_terakhir">
			   <option value="SD">SD</option>
			   <option value="SMP">SMP</option>
			   <option selected value="SMA">SMA</option>
			   <option value="D1">D1</option>
			   <option value="D2">D2</option>
			   <option value="D3">D3</option>
			   <option value="D4">D4</option>
			   <option value="S1">S1</option>
			   <option value="S2">S2</option>
			   <option value="S3">S3</option>
			  </select>
			</div>

			
			<button type="submit" class="btn btn-primary">TAMBAH</button>
		</form>
	</div>
	

</div>
<?php include_once '../layouts/footer.php' ?>