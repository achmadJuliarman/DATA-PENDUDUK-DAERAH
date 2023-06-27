<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/keluarga/function-crud.php' ?>
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
<table class="table table-hover table-bordered mt-2 " >
  <thead>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">NO KK</th>
      <th scope="col">NIK</th>
      <th scope="col">Status</th>
      <th scope="col">Alamat KK</th>
      <th scope="col">RT / RW</th>
      <th scope="col">Ditambah Oleh</th>
      <th scope="col">Diedit Oleh</th>
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
  		<td><?= $k['nik_kk'] ?></td>
  		<td><?= $k['status_kk'] ?></td>
  		<td><?= $k['alamat_kk'] ?></td>
  		<td><?= $k['no_rt_kk'] ?> / <?= $k['no_rw_kk'] ?></td>
  		<td><?= $k['id_user_adder'] ?></td>
  		<td>
  		<?php if ($k['updated_at'] == '0000-00-00 00:00:00'): ?>
  			<div class="badge bg-primary text-wrap mb-3"> - </div>
  		<?php else : ?>					
  			<?= $k['id_user_updater'] ?>
  		<?php endif ?>
  		</td>
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

</div>


<?php include_once '../layouts/footer.php' ?>