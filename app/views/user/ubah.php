<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/user/function-crud.php' ?>
<?php include_once '../../functions/alert.php' ?>
<?php 
if (!isset($_GET['id'])) {
	header("Location: index.php");
}

 ?>
<?php $user = getUserById($_GET['id']); ?>
<div class="container">
	<h1 class="my-3"></h1>
	<h1 class="my-3">Ubah User</h1>
	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/user/ubah.php?page=index " method="post" class="form-tambah-warga" id="form-tambah">
			<input type="hidden" name="id" value="<?= $user[0]['id_user'] ?>">
			<div class="input-group mb-3">	
				<label class="input-group-text" for="level">Level</label>
				<select class="form-select" id="level" name="level" required>
					<option value="RT" <?= $user[0]['level_user'] == 'RT' ? 'selected' : '' ?> >RT</option>	
					<option value="RW" <?= $user[0]['level_user'] == 'RW' ? 'selected' : '' ?> >RW</option>	
					<option value="Admin" <?= $user[0]['level_user'] == 'Admin' ? 'selected' : '' ?>>Admin</option>	
				  </select>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Jabatan : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Jabatan" name="jabatan" required  value="<?= $user[0]['jabatan'] ?>">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Nama Lengkap : </span>
			  <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama" required  value="<?= $user[0]['nama_lengkap'] ?>">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Username : </span>
			  <input type="text" class="form-control" placeholder="Masukkan username" name="username" required  value="<?= $user[0]['username'] ?>">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Password : </span>
			  <input type="text" class="form-control" placeholder="Masukkan password" name="password" required  value="<?= $user[0]['password'] ?>">
			</div>
			
			<button type="submit" class="btn btn-primary">UBAH</button>
		</form>
	</div>

</div>
<?php include_once '../layouts/footer.php' ?>