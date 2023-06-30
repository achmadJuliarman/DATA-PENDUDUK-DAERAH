<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/alert.php' ?>
<?php include_once '../../functions/kematian/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>

<div class="container">


<?php $warga_mati = getAllKematian(); ?>
<?php 
if (isset($_GET['cari'])) {
	if (isset($_GET['keyword']) != '') {  
		$warga_mati = cariKematian($_GET['keyword']);
		// $query_url = $_SERVER['QUERY_STRING'];	
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
    alertSuccess('tambah', 'Kematian');
  }else{
    alertSuccess('tambah', 'Kematian', 'Terjadi Kesalahan Ketika Menambah Data');
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
    alertSuccess('ubah '.$_SESSION['message'], 'Kematian');
  }else{
    alertFailed('ubah', 'Kematian', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
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
    alertSuccess('hapus '.$_SESSION['message'], 'Kematian');
  }else{
    alertFailed('hapus', 'Kematian', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
  }
  unset($_SESSION['hapus']);
  unset($_SESSION['message']);
  unset($_SESSION['kode_err']);
}

?>

<h1 class="mt-4">Data Kematian Seluruh warga</h1>
<?php include_once '../layouts/menu.php' ?>
<?php include_once '../layouts/form-cari.php' ?>
<table class="table table-hover table-bordered mt-2">
  <thead>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">RW/RT</th>
      <th scope="col">NIK Warga Meninggal</th>
      <th scope="col">Nama Warga Meninggal</th>
      <th scope="col">Tanggal Meninggal</th>
      <th scope="col">Usia Meninggal</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Ditambah Tanggal</th>
      <th scope="col">Diubah Tanggal</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>

  <tbody>
  	<?php if (!empty($warga_mati)): ?>

  	<?php $no = 1; ?>
  	<?php foreach ($warga_mati as $w) { ?>
    <tr>
      <th scope="row"><?= $no++; ?></th>
      <td><?= $w['rw_kematian']  ?> / <?= $w['rt_kematian'] ?></td>
      <td><?= $w['nik_kematian']  ?></td>
      <td><?= $w['nama_warga']  ?></td>
      <td><?= $w['tanggal_kematian']  ?></td>
      <td><?= $w['usia_kematian']  ?></td>
      <td><?= $w['deskripsi_kematian']  ?></td>
      <td><?= $w['ditambah']  ?></td>
      <td>
      <?php if ($w['diubah'] == '0000-00-00 00:00:00'): ?>
  			<div class="badge bg-primary text-wrap mb-3"> Belum Pernah Ada Perubahan </div>
  	  <?php else : ?>
  			<?= $w['diubah']  ?>		
  	  <?php endif; ?>
  	  </td>
      <td>
      	<div class="dropdown">
		  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		    aksi
		  </button>
		  <ul class="dropdown-menu dropdown-menu-dark">
		  	<li><a class="dropdown-item" href="ubah.php?id=<?= $w['id_kematian'] ?>">Ubah</a></li>
		  	<li><hr class="dropdown-divider"></li>
		  	<li><a class="dropdown-item" 
		  		href="../../functions/kematian/hapus.php?id=<?= $w['id_kematian'] ?>&nik=<?= $w['nik_kematian'] ?>">
			  	Hapus</a>
			</li>
		  </ul>
		</div>
      </td>
    </tr>
    <?php } ?>


  	<?php else : ?>
  		<h1>Data Tidak Ditemukan</h1>
  	<?php endif ?>
</table>


</div>
<!-- END CONTAINER -->
<?php include_once '../layouts/footer.php' ?>