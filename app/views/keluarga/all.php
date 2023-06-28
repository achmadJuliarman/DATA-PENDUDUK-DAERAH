<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/keluarga/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>
<?php include_once '../../functions/alert.php' ?>
<div class="container">
<h1 class="my-4">Data Keluarga</h1>
<?php $keluarga = getAllKeluarga(); ?>

<?php include_once '../layouts/menu.php' ?>
<?php include_once '../layouts/form-cari.php' ?>

<!-- FORM CARI HANDLER -->
<?php 
if (isset($_GET['cari'])) {
  if ($_GET['keyword'] != '') {
    $keluarga = cariKeluarga($_GET['keyword']);
  } 
}
 ?>

<?php 
// ALERT TAMBAH
if (isset($_SESSION['tambah'])) {
  // var_dump($_SESSION);
  // die();
  if($_SESSION['kode_err'] === '')
  {
    alertSuccess('tambah', 'Keluarga');
  }else{
    alertSuccess('tambah', 'Keluarga', 'Terjadi Kesalahan Ketika Mengtambah Data');
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
    alertSuccess('ubah '.$_SESSION['message'], 'Keluarga');
  }else{
    alertFailed('ubah', 'Keluarga', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
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
    alertSuccess('hapus '.$_SESSION['message'], 'Keluarga');
  }else{
    alertFailed('hapus', 'Keluarga', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
  }
  unset($_SESSION['hapus']);
  unset($_SESSION['message']);
  unset($_SESSION['kode_err']);
}



 ?>
<table class="table table-hover table-bordered mt-2 " >
  <thead>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">NO KK</th>
      <th scope="col">NIK Kepala Keluarga</th>
      <th scope="col">Kepala Keluarga</th>
      <!-- <th scope="col">Status</th> -->
      <th scope="col">Alamat KK</th>
      <th scope="col">RT / RW</th>
      <th scope="col">Tanggal Tambah</th>
      <th scope="col">Tanggal Edit</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  	<?php $no = 1; ?>
  	<?php foreach ($keluarga as $k) : ?>		
  	<tr>
  		<td><?= $no++ ?></td>
  		<td><?= $k['no_kk'] ?></td>
  		
      <?php if (empty($k['nik_kepala_kk'])) : ?>
          <td colspan="2"> 
            <div class="badge bg-primary text-wrap mb-3"> Ketua Keluarga Belum Ditambahkan Untuk KK ini</div>
          </td>
      <?php else : ?>
      <?php $kepala = cariWargaByNIK($k['nik_kepala_kk']); ?>
          <td><?= $k['nik_kepala_kk'] ?></td>
          <td><?= $kepala['nama_warga'] ?></td>
      <?php endif ?>

  		<td><?= $k['alamat_kk'] ?></td>
  		<td><?= $k['no_rt_kk'] ?> / <?= $k['no_rw_kk'] ?></td>
  		<td><?= $k['created_at'] ?></td>
  		<td>
  		<?php if ($k['updated_at'] == '0000-00-00 00:00:00'): ?>
  			<div class="badge bg-primary text-wrap mb-3"> Belum Pernah Ada Perubahan </div>
  		<?php else : ?>					
  			<?= $k['updated_at'] ?>	
  		<?php endif ?>	
  		</td>
  		<td>
  			<div class="dropdown">
    		  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    		    aksi
    		  </button>
    		  <ul class="dropdown-menu dropdown-menu-dark">
    		    <li><a class="dropdown-item" href="detail.php?no=<?= $k['no_kk'] ?> ">Lihat detail Keluarga Ini</a></li>
            <li><a class="dropdown-item" href="ubah.php?no=<?= $k['no_kk'] ?> ">Ubah Data Keluarga Ini</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../functions/keluarga/hapus.php?no=<?= $k['no_kk'] ?> ">Hapus Data Keluarga Ini</a></li>
    		  </ul>
    		</div>
  		</td>
  	</tr>
  	<?php endforeach ?>
  </tbody>

</div>


<?php include_once '../layouts/footer.php' ?>