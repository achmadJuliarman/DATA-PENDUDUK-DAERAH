<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/rw/function-crud.php" ?>

<?php if (!isset($_GET['nik'])) {
	header("Location: index.php");
} ?>

<?php $rw_all = getAllRw(); ?>
<?php $warga_ubah = cariWargaByNIK($_GET['nik']); ?>
<div class="container">
	<?php //var_dump($warga_ubah); die(); ?>
	<h1 class="mb-3 mt-2">Ubah Data Warga</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/warga/ubah.php" method="post" class="form-ubah-warga" id="form-ubah">
			<h3>A. Data KTP</h3>
			<div class="form-floating mb-3">
				<input type="number" class="form-control" placeholder="nama" name="nik" required value="<?= $warga_ubah['nik_warga'] ?>" readonly>
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
			   <option value="L" <?= ($warga_ubah['jenis_kelamin'] == 'L') ? 'selected' : '' ?> >Pria</option>
			   <option value="P" <?= ($warga_ubah['jenis_kelamin'] == 'P') ? 'selected' : '' ?> >Wanita</option>
			  </select>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Status Perkawinan</label>
			  <select class="form-select" id="inputGroupSelect01" name="status_perkawinan">
			   <option value="Belum Kawin" <?= ($warga_ubah['status_perkawinan'] == 'Belum Kawin') ? 'selected' : '' ?>>Belum Kawin</option>
			   <option value="Kawin" <?= ($warga_ubah['status_perkawinan'] == 'Kawin') ? 'selected' : '' ?> >Kawin</option>
			  </select>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Golongan Darah</label>
			  <select class="form-select" id="inputGroupSelect01" name="gol_dar">
			   <option value="O" <?= ($warga_ubah['gol_darah'] == 'O') ? 'selected' : '' ?>>O</option>
			   <option value="A" <?= ($warga_ubah['gol_darah'] == 'A') ? 'selected' : '' ?>>A</option>
			   <option value="B" <?= ($warga_ubah['gol_darah'] == 'B') ? 'selected' : '' ?>>B</option>
			   <option value="AB" <?= ($warga_ubah['gol_darah'] == 'AB') ? 'selected' : '' ?>>AB</option>
			  </select>
			</div>
			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Agama</label>
			  <select class="form-select" id="inputGroupSelect01" name="agama">
			    <option value="Islam" <?= ($warga_ubah['agama'] == 'Islam') ? 'selected' : '' ?> >Islam</option>
			    <option value="Katholik" <?= ($warga_ubah['agama'] == 'Katholik') ? 'selected' : '' ?>>Katholik</option>
			    <option value="Kristen" <?= ($warga_ubah['agama'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
			    <option value="Hindu" <?= ($warga_ubah['agama'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
			    <option value="Buddha" <?= ($warga_ubah['agama'] == 'Buddha') ? 'selected' : '' ?>>Buddha</option>
			  </select>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="kewarganegaraan" required value="<?= $warga_ubah['kewarganegaraan'] ?>">
				<label for="floatingInputDisabled">Kewarganegaraan</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="alamat_ktp" required value="<?= $warga_ubah['alamat_ktp'] ?>">
				<label for="floatingInputDisabled">Alamat KTP (Format : JL, RT/RW, KEC, KEL, NO Rumah)</label>
			</div>


			<h3>B. Data Lainnya</h3>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" placeholder="nama" name="alamat_tinggal" required value="<?= $warga_ubah['alamat_tinggal'] ?>">
				<label for="floatingInputDisabled">Alamat Tinggal (Format : JL, KEC, KEL, NO Rumah)</label>
			</div>

			<div class="input-group mb-3">	
				<label class="input-group-text" for="rw">RW</label>
				<select class="form-select" id="rw" name="rw">
					<option value="0" disabled selected> -- Pilih RW --</option>
				    <?php foreach ($rw_all as $rw) : ?>
				    	<option value="<?= $rw['no_rw'] ?>" <?= ($warga_ubah['no_rw'] == $rw['no_rw']) ? 'selected' : '' ?> ><?= $rw['no_rw'] ?></option>
					<?php endforeach; ?>
				  </select>
				</div>
				
			<div class="input-group mb-3">	
				<label class="input-group-text" for="rt">RT</label>
				<select class="form-select" id="rt" name="rt">
				 	<option value="<?= $warga_ubah['no_rt'] ?>" selected readonly><?= $warga_ubah['no_rt'] ?></option>
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
			   <option value="Tetap" <?= ($warga_ubah['status_warga'] == 'Tetap') ? 'selected' : '' ?> >Tetap</option>
			   <option value="Kontrak" <?= ($warga_ubah['status_warga'] == 'Tetap') ? 'selected' : '' ?> >Kontrak</option>
			  </select>
			</div>

			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Status Kehidupan</label>
			  <select class="form-select" id="inputGroupSelect01" name="status_kehidupan">
			   <option value="Hidup" <?= ($warga_ubah['status_kehidupan'] == 'Hidup') ? 'selected' : '' ?>>Hidup</option>
			   <option value="Meninggal" <?= ($warga_ubah['status_kehidupan'] == 'Kematian') ? 'selected' : '' ?>>Meninggal</option>
			  </select>
			</div>

			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Kontak</span>
			  <input type="number" class="form-control" placeholder="Masukkan nomor kontak" name="kontak" required value="<?= $warga_ubah['kontak'] ?>">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Pekerjaan</span>
			  <input type="text" class="form-control" placeholder="Masukkan pekerjaan" name="pekerjaan" required value="<?= $warga_ubah['pekerjaan'] ?>">
			</div>

			<div class="input-group mb-3">	
			  <label class="input-group-text" for="inputGroupSelect01">Pendidikan Terakhir</label>
			  <select class="form-select" id="inputGroupSelect01" name="pendidikan_terakhir">
			   <option value="SD" <?= ($warga_ubah['pendidikan_terakhir'] == 'SD') ? 'selected' : '' ?> >SD</option>
			   <option value="SMP" <?= ($warga_ubah['pendidikan_terakhir'] == 'SMP') ? 'selected' : '' ?>>SMP</option>
			   <option value="SMA" <?= ($warga_ubah['pendidikan_terakhir'] == 'SMA') ? 'selected' : '' ?>>SMA</option>
			   <option value="D1" <?= ($warga_ubah['pendidikan_terakhir'] == 'D1') ? 'selected' : '' ?>>D1</option>
			   <option value="D2" <?= ($warga_ubah['pendidikan_terakhir'] == 'D2') ? 'selected' : '' ?>>D2</option>
			   <option value="D3" <?= ($warga_ubah['pendidikan_terakhir'] == 'D3') ? 'selected' : '' ?>>D3</option>
			   <option value="D4" <?= ($warga_ubah['pendidikan_terakhir'] == 'D4') ? 'selected' : '' ?>>D4</option>
			   <option value="S1" <?= ($warga_ubah['pendidikan_terakhir'] == 'S1') ? 'selected' : '' ?>>S1</option>
			   <option value="S2" <?= ($warga_ubah['pendidikan_terakhir'] == 'S2') ? 'selected' : '' ?>>S2</option>
			   <option value="S3" <?= ($warga_ubah['pendidikan_terakhir'] == 'D3') ? 'selected' : '' ?>>S3</option>
			  </select>
			</div>

			
			<button type="submit" class="btn btn-primary">UBAH</button>
		</form>
	</div>
	

</div>
<?php include_once '../layouts/footer.php' ?>