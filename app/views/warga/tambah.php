<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/data.php" ?>
<div class="container">
	<h1>Tambah Data Warga</h1>
	<div class="from-wrapper">
		<form action="../../fuctions/warga/tambah.php" method="post">
			<div class="input-group mb-3">
			  <label class="input-group-text" for="inputGroupSelect01">Agama</label>
			  <select class="form-select" id="inputGroupSelect01">
			    <option selected value="Islam">Islam</option>
			    <option value="Kristen">Kristen</option>
			    <option value="Hindu">Hindu</option>
			    <option value="Buddha">Buddha</option>
			    <option value="Katholik">Katholik</option>
			  </select>
			</div>
		</form>
	</div>
	

</div>
<?php include_once '../layouts/footer.php' ?>