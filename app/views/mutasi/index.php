<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/mutasi/function-crud.php' ?>
<?php include_once '../../functions/alert.php' ?>
<?php $warga_mutasi = getAllMutasi(); ?>
<?php 
if (isset($_GET['cari'])) {
	if (isset($_GET['keyword']) != '') {
		$warga_mutasi = cariMutasi($_GET['keyword']);
		$query_url = $_SERVER['QUERY_STRING'];	
	}
}
 ?>

<div class="container">	

<!-- ALERT -->
<?php 
// ALERT TAMBAH
if (isset($_SESSION['tambah'])) {
  // var_dump($_SESSION);
  // die();
  if($_SESSION['kode_err'] === '')
  {
    alertSuccess('tambah', 'Mutasi');
  }else{
    alertSuccess('tambah', 'Mutasi', 'Terjadi Kesalahan Ketika Menambah Data');
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
    alertSuccess('ubah '.$_SESSION['message'], 'Mutasi');
  }else{
    alertFailed('ubah', 'Mutasi', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
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
    alertSuccess('hapus '.$_SESSION['message'], 'Mutasi');
  }else{
    alertFailed('hapus', 'Mutasi', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
  }
  unset($_SESSION['hapus']);
  unset($_SESSION['message']);
  unset($_SESSION['kode_err']);
}

?>



<h1 class="mt-3">Data Warga Mutasi</h1>

<?php include_once '../layouts/menu.php' ?>
<?php include_once '../layouts/form-cari.php' ?>

<!-- TABLE DATA WARGA MUTASI -->
<table class="table table-hover table-bordered mt-2">
  <thead>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">RW / RT</th>
      <th scope="col">No KK</th>
      <th scope="col">NIK Kepala Keluarga</th>
      <th scope="col">Nama Kepala Keluarga</th>
      <th scope="col">Alamat Mutasi</th>
      <th scope="col">Tanggal Mutasi</th>
      <th scope="col">Tanggal Ditambah</th>
      <th scope="col">Tanggal Diupdate</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  	<?php if (!empty($warga_mutasi)): ?>
  		
  	<?php $no = 1; ?>
  	<?php foreach ($warga_mutasi as $wm) : ?>  		
  	<tr>
  		<td><?= $no++ ?></td>
  		<td><?= $wm['rw_kk_mutasi'] ?> / <?= $wm['rt_kk_mutasi']  ?></td>
  		<td><?= $wm['no_kk_mutasi']  ?></td>
  		<td><?= $wm['nik_kepala_mutasi'] ?></td>
  		<td><?= $wm['nama_kepala_mutasi']  ?></td>
  		<td><?= $wm['tanggal_mutasi']  ?></td>
  		<td><?= $wm['alamat_mutasi']  ?></td>
  		<td><?= $wm['created_at']  ?></td>
  		<td>
  			<?php if ($wm['updated_at'] == '0000-00-00 00:00:00'): ?>
  				<div class="badge bg-primary text-wrap mb-3"> Belum Pernah Ada Perubahan </div>
  			<?php else : ?>
  				<?= $wm['updated_at']  ?>		
  			<?php endif; ?>
  		</td>
  		<td>
  			<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			    aksi
			  </button>
			  <ul class="dropdown-menu dropdown-menu-dark">
			    <li>
			    	<a class="dropdown-item" href="../keluarga/detail.php?no=<?= $wm['no_kk_mutasi'] ?>">
			    		Lihat Detail Keluarga Ini
			    	</a>
				</li>
				<li>
			    	<a class="dropdown-item" href="ubah.php?no=<?= $wm['no_kk_mutasi'] ?>&id=<?= $wm['id_mutasi'] ?>">
			    		ubah
			    	</a>
				</li>
				<li><hr class="dropdown-divider"></li>
				<li>
			    	<a class="dropdown-item" href="../../functions/mutasi/hapus.php?id=<?= $wm['id_mutasi'] ?>&no=<?= $wm['no_kk_mutasi']  ?>">
			    		hapus
			    	</a>
				</li>
			   
			  </ul>
			</div>
  		</td>
  	</tr>
  	<?php endforeach ?>

  	<?php else : ?>
  		<h1>Data Warga Mutasi Tidak Ditemukan / Tidak Ada Data Warga Mutasi</h1>
  	<?php endif ?>

  </tbody>
</table>

</div>	
<?php include_once '../layouts/footer.php' ?>