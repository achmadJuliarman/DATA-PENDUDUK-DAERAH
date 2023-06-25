<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<div class="container">
	<h1 class="mb-3 mt-2">Tambah Data Warga</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/warga/tambah.php" method="post" class="form-tambah-warga">
			<h3>A. Data KTP</h3>
			<div class="form-floating mb-3">
				<input type="number" class="form-control" placeholder="nama" name="nik" required>
				<label for="floatingInputDisabled">NIK</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="nama" required>
				<label for="floatingInputDisabled">Nama</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="tempat_lahir" required>
				<label for="floatingInputDisabled">Tempat Lahir</label>
			</div>
			<div class="input-group date mb-3" data-provide="datepicker">
				<span class="input-group-text" id="inputGroup-sizing-default">Tanggal Lahir</span>
			    <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir"> 
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
			  <select class="form-select" id="inputGroupSelect01" name="jenis_kelamin">
			   <option selected value="L">Pria</option>
			   <option selected value="P">Wanita</option>
			  </select>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Status Perkawinan</label>
			  <select class="form-select" id="inputGroupSelect01" name="status_perkawinan">
			   <option selected value="Belum Kawin">Belum Kawin</option>
			   <option selected value="Kawin">Kawin</option>
			  </select>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Golongan Darah</label>
			  <select class="form-select" id="inputGroupSelect01" name="gol_dar">
			   <option selected value="O">O</option>
			   <option selected value="A">A</option>
			   <option selected value="B">B</option>
			   <option selected value="AB">AB</option>
			  </select>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Agama</label>
			  <select class="form-select" id="inputGroupSelect01" name="agama">
			    <option selected value="Islam">Islam</option>
			    <option selected value="Islam">Katholik</option>
			    <option selected value="Islam">Kristen</option>
			    <option selected value="Islam">Hindu</option>
			    <option selected value="Islam">Buddha</option>
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
			  <label class="input-group-text" for="inputGroupSelect01">RT</label>
			  <select class="form-select" id="inputGroupSelect01" name="rt">
			    <option selected value="05">05</option>
			  </select>
			</div>

			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">RW</label>
			  <select class="form-select" id="inputGroupSelect01" name="rw">
			    <option selected value="05">05</option>
			  </select>
			</div>

			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Status Warga</label>
			  <select class="form-select" id="inputGroupSelect01" name="status_warga">
			   <option selected value="Tetap">Tetap</option>
			   <option selected value="Kontrak">Kontrak</option>
			  </select>
			</div>

			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Status Kehidupan</label>
			  <select class="form-select" id="inputGroupSelect01" name="status_kehidupan">
			   <option selected value="Hidup">Hidup</option>
			   <option selected value="Meninggal">Meninggal</option>
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
			   <option selected value="SD">SD</option>
			   <option selected value="SMP">SMP</option>
			   <option selected value="SMA">SMA</option>
			   <option selected value="D1">D1</option>
			   <option selected value="D2">D2</option>
			   <option selected value="D3">D3</option>
			   <option selected value="D4">D4</option>
			   <option selected value="S1">S1</option>
			   <option selected value="S2">S2</option>
			   <option selected value="S3">S3</option>
			  </select>
			</div>

			
			<button type="submit" class="btn btn-primary">TAMBAH</button>
		</form>
	</div>
	

</div>
<script>
	// $('.datepicker').datepicker();
	// // $(document).off('.datepicker.data-api');
	// $('.datepicker').datepicker({
	//     format: 'mm/dd/yyyy',
	//     startDate: '-3d'
	// });
</script>
<?php include_once '../layouts/footer.php' ?>