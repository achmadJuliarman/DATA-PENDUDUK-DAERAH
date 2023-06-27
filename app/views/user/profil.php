<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/user/function-crud.php' ?>
<?php include_once '../../functions/alert.php' ?>

<?php $user = getUserById($_SESSION['id-user'])[0];?>
<div class="container">

<!-- ALERT -->
<?php 
if (isset($_SESSION['ubah'])) {
	// var_dump($_SESSION);
	// die();
	if($_SESSION['kode_err'] === '')
	{
		alertSuccess('ubah '.$_SESSION['message'], 'Profil');
	}else{
		alertFailed('ubah', 'Profil', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
	}
	unset($_SESSION['ubah']);
	unset($_SESSION['message']);
	unset($_SESSION['kode_err']);
}


 ?>
	<div class="badge bg-primary text-wrap mb-3 mt-4">
		<h1>Profil Saya </h1>
	</div>

	<div class="from-wrapper overflow-auto overflow-x-hidden" style="height: 80%; width: 100%;">
		<form action="../../functions/user/ubah.php" method="post" class="form-ubah-profil" id="form-ubah">
			<input type="hidden" name="id" value="<?= $user['id_user'] ?>">
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Level</span>
			  <input type="text" class="form-control" placeholder="Masukkan nama" name="level" readonly value="<?= $user['level_user'] ?>">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Nama Lengkap</span>
			  <input type="text" class="form-control" placeholder="Masukkan nama" name="nama" value="<?= $user['nama_lengkap'] ?>">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Username</span>
			  <input type="text" class="form-control" placeholder="Masukkan nomor username" name="username" value="<?= $user['username'] ?>">
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Password</span>
			  <input type="password" class="form-control" placeholder="Masukkan password" name="password" value="<?= $user['password'] ?>" id="pass">
			</div>
			<input type="checkbox" onclick="showPass()"> Show Password <br><br>
			<!-- <div class="input-group my-3">
			  <span class="input-group-text" id="basic-addon1">Konfirmasi Password</span>
			  <input type="password" class="form-control" placeholder="Konfirmasi Password Baru" name="konfirmasi_pass" id="conf-pass">
			</div>
			<input type="checkbox" onclick="showConfPass()" > Show Konfirmasi Password <br><br> -->
			<button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Yakin Ubah Data Profil Mu?')">UBAH</button>
		</form>
	</div>
</div>
<script>
function showPass() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 

function showConfPass() {
	var x = document.getElementById("conf-pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php include_once '../layouts/footer.php' ?>