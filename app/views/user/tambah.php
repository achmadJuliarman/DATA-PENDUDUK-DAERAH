<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/user/function-crud.php' ?>
<?php include_once '../../functions/alert.php' ?>
<div class="container">
	<h1 class="my-3"></h1>
	<h1 class="my-3">Tambah User</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/user/tambah.php" method="post" class="form-tambah-warga" id="form-tambah">
			<div class="input-group mb-3">	
				<label class="input-group-text" for="level">Level</label>
				<select class="form-select" id="level" name="level" required>
					<option value="RT">RT</option>	
					<option value="RW">RW</option>	
					<option value="Admin">Admin</option>	
				  </select>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Jabatan : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Jabatan" name="jabatan" required>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Nama Lengkap : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama" required>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Username : </span>
			  <input type="text" class="form-control" placeholder="Masukkan username" name="username" required>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Password : </span>
			  <input type="text" class="form-control" placeholder="Masukkan password" name="password" required>
			</div>
			
			<button type="submit" class="btn btn-primary">TAMBAH</button>
		</form>
	</div>

</div>
<?php include_once '../layouts/footer.php' ?>