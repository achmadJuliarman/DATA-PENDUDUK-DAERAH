<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/keluarga/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>
<?php include_once '../../functions/rw/function-crud.php' ?>
<div class="container">

<?php 


if (!isset($_GET['rw'])) {
	header("Location: index.php");
} 

?>



<?php
 	$rw = $_GET['rw'];
  $_SESSION['keluarga-rw'] = $_GET['rw'];
  $rw = $_SESSION['keluarga-rw'];
	$keluarga = getKeluargaInRw($rw); 
?>

<!-- FORM CARI HANDLER -->
<?php 
if (isset($_GET['cari'])) {
  if ($_GET['keyword'] != '') {
    $keluarga = cariKeluargaInRw($_GET['keyword'], $rw);
  } 
}


 ?>

<h1 class="my-4">Data Keluarga Dari RW <?= $_GET['rw'] ?></h1>



<!-- FORM CARI KHUSUS PAGE INI TIDAK MEMAKAI TEMPLATE YANG ADA DI FOLDER LAYOUTS -->
<form action="" method="get" style="width: 100%;" class=" d-flex justify-content-end">
	<div class="input-group mb-3" style="width: 40%;">
	  	<input type="text" class="form-control" placeholder="Masukkan Keywoard" aria-describedby="button-addon2" name="keyword">
	  	<input type="hidden" name="rw" value="<?= $_GET['rw'] ?>">
	  	<button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari">Cari</button>
	</div>
</form>
<!-- END FORM CARI -->


<table class="table table-hover table-bordered mt-2 " >
  <thead>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">NO KK</th>
      <th scope="col">NIK Kepala Keluarga</th>
      <th scope="col">Kepala Keluarga</th>
      <th scope="col">Status</th>
      <th scope="col">Alamat KK</th>
      <th scope="col">RT / RW</th>
      <th scope="col">Tanggal Tambah</th>
      <th scope="col">Tanggal Edit</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <?php if ($keluarga) : ?>
    
<tbody>
    <?php $no = 1; ?>
    <?php foreach ($keluarga as $k) : ?>    
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $k['no_kk'] ?></td>
      <td><?= $k['nik_kepala_kk'] ?></td>
      <?php $kepala = cariWargaByNIK($k['nik_kepala_kk']); ?>
      <td><?= $kepala['nama_warga'] ?></td>
      <td><?= $kepala['status_kk'] ?></td>
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
          </ul>
        </div>
      </td>
    </tr>
    <?php endforeach ?>
</tbody>

  <?php else : ?>
    <h1>Data Keluarga Tidak Ditemukan</h1>
  <?php endif ?>



</div>




<?php include_once '../layouts/footer.php' ?>