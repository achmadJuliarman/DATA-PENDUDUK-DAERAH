<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/user/function-crud.php' ?>
<?php include_once '../../functions/alert.php' ?>
<div class="container">

<?php // $users = getAllUser(); ?>

<?php 
$jumlahUser = count(getAllUser());

$jumlahDataPerhalaman = 10;

$jumlahHalaman = ceil($jumlahUser / $jumlahDataPerhalaman);

$halamanAktif = ( isset($_GET['page']) ? $halamanAktif = $_GET['page'] : $halamanAktif = 1);

$mulaiDari = ($halamanAktif * $jumlahDataPerhalaman) - $jumlahDataPerhalaman;

$users = getAllUserPaginated($mulaiDari, $jumlahDataPerhalaman);

if (isset($_GET['cari'])) {
	if ($_GET['keyword'] != '') {
		$users = cariUserPaginated($_GET['keyword'], $mulaiDari, $jumlahDataPerhalaman);
	}
}
 ?>


<!-- ALERT -->
<?php 
// ALERT TAMBAH
if (isset($_SESSION['tambah'])) {
	// var_dump($_SESSION);
	// die();
	if($_SESSION['kode_err'] === '')
	{
		alertSuccess('tambah', 'User');
	}else{
		alertSuccess('tambah', 'User', 'Terjadi Kesalahan Ketika Menambah Data');
	}
	unset($_SESSION['tambah']);
	unset($_SESSION['kode_err']);
}

// ALERT UBAH
if (isset($_SESSION['ubah'])) {
	// var_dump($_SESSION);
	// die();
	if($_SESSION['kode_err'] === '')
	{
		alertSuccess('ubah '.$_SESSION['message'], 'User');
	}else{
		alertFailed('ubah', 'User', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
	}
	unset($_SESSION['ubah']);
	unset($_SESSION['message']);
	unset($_SESSION['kode_err']);
}

// ALERT HAPUS
if (isset($_SESSION['hapus'])) {
	// var_dump($_SESSION);
	// die();
	if($_SESSION['kode_err'] === '')
	{
		alertSuccess('hapus '.$_SESSION['message'], 'User');
	}else{
		alertFailed('hapus', 'User', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
	}
	unset($_SESSION['hapus']);
	unset($_SESSION['message']);
	unset($_SESSION['kode_err']);
}









 ?>
	<h1 class="my-4">Data Seluruh User</h1>
	<?php if ($_SESSION['level'] == 'Admin'): ?>	
		<?php include_once '../layouts/menu.php' ?>
	<?php endif ?>
	<?php include_once '../layouts/form-cari.php' ?>
<table class="table table-hover table-bordered mt-2 " >
  <thead>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">Level</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Username</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Dibuat Tanggal</th>
      <th scope="col">Diedit Tanggal</th>
      <?php if ($_SESSION['level'] == 'Admin'): ?>
      	<th scope="col">AKSI</th>
      <?php endif ?>
    </tr>
  </thead>

  <tbody>
  	<?php $no =1; ?>
  	<?php foreach ($users as $user): ?>

  	<tr>
  		<td><?= $no++; ?></td>
  		<td><?= $user['level_user'] ?></td>
  		<td><?= $user['jabatan'] ?></td>
  		<td><?= $user['username'] ?></td>
  		<td><?= $user['nama_lengkap'] ?></td>
  		<td><?= $user['created_at'] ?></td>
  		<td>
  			<?php if ($user['updated_at'] == '0000-00-00 00:00:00'): ?>
  				<div class="badge bg-primary text-wrap mb-3">User Belum Pernah Melakukan Perubahan</div>
  			<?php else : ?>
  				<?= $user['updated_at'] ?>
  			<?php endif; ?>	
  		</td>

  		<?php if ($_SESSION['level'] == 'Admin') : ?>
  		<td align="center">
      	<div class="dropdown">
    		  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    		    aksi
    		  </button>
    		  <ul class="dropdown-menu dropdown-menu-dark">
    		    <li><a class="dropdown-item" href="ubah.php?id=<?= $user['id_user'] ?> ">Ubah</a></li>
    		    <li><hr class="dropdown-divider"></li>
    		    <li><a class="dropdown-item" href="../../functions/user/hapus.php?id=<?= $user['id_user'] ?>&nama=<?= $user['nama_lengkap'] ?>" 
    		    	onClick="return confirm('Yakin Hapus User Dengan nama : <?= $user['nama_lengkap'] ?> <?= $user['jabatan'] ?>')">Hapus</a>
    		    </li>
    		  </ul>
    		</div>
        </td>

  		<?php endif; ?>
  	</tr>


  	<?php endforeach ?>
  </tbody>
</table>

<!-- NAVIGATION PAGE -->

<nav aria-label="Page navigation example">
  <ul class="pagination">
  	<?php if (($halamanAktif-1) != 0) : ?>
    	<li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif-1 ?>">Previous</a></li>
	<?php endif; ?>

    <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
    	<li class="page-item">
    		<?php if ($halamanAktif == $i) : ?>
    			<a class="page-link active" href="?page=<?= $i ?>"><?= $i ?></a>
    		<?php else : ?>
    			<a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
    		<?php endif; ?>
    	</li>
    <?php endfor; ?>

    <?php if (($halamanAktif+1) <= $jumlahHalaman) : ?>
    	<li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif+1 ?>">Next</a></li>
	<?php endif; ?>
  </ul>
</nav>

</div>


<?php include_once '../layouts/footer.php' ?>