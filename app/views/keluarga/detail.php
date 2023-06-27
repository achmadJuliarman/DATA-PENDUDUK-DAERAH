<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/keluarga/function-crud.php' ?>
<div class="container">

<?php if (!isset($_GET['no'])) {
	header("Location: index.php");
} ?>
<h3 class="my-3">Anggota Keluarga Dari Nomor Kartu Keluarga <b><?= $_GET['no'] ?></b></h3>	
<?php $anggota = getAnggotaKeluargaByNo($_GET['no']) ?>

<table class="table table-hover table-bordered mt-4 " >
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
  	<?php foreach ($anggota as $a) : ?>		
  	<tr>
  		<td><?= $no++ ?></td>
  		<td><?= $a['no_kk'] ?></td>
  		<td><?= $a['nik_kk'] ?></td>
  		<td><?= $a['status_kk'] ?></td>
  		<td><?= $a['alamat_kk'] ?></td>
  		<td><?= $a['no_rt_kk'] ?> / <?= $a['no_rw_kk'] ?></td>
  		<td><?= $a['id_user_adder'] ?></td>
  		<td>
  		<?php if ($a['updated_at'] == '0000-00-00 00:00:00'): ?>
  			<div class="badge bg-primary text-wrap mb-3"> - </div>
  		<?php else : ?>					
  			<?= $a['id_user_updater'] ?>
  		<?php endif ?>
  		</td>
  		<td><?= $a['created_at'] ?></td>
  		<td>
  		<?php if ($a['updated_at'] == '0000-00-00 00:00:00'): ?>
  			<div class="badge bg-primary text-wrap mb-3"> Belum Pernah Ada Perubahan </div>
  		<?php else : ?>					
  			<?= $a['updated_at'] ?>	
  		<?php endif ?>	
  		</td>
  		<td>
  			<div class="dropdown">
    		  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    		    aksi
    		  </button>
    		  <ul class="dropdown-menu dropdown-menu-dark">
    		    <li><a class="dropdown-item" href="../../functions/keluarga/hapus.php?no=<?= $a['no_kk'] ?> ">Hapus Dari Keluarga Ini</a></li>
    		  </ul>
    		</div>
  		</td>
  	</tr>
  	<?php endforeach ?>
  </tbody>

</div>
<div class="tambah-anggota">
	<a href="tambah-anggota-keluarga.php?no_kk=<?= $anggota[0]['no_kk']; ?>" class="btn btn-primary d-flex align-center jusitfy-content-center w-25">
		<ion-icon name="add-circle-sharp" size="large" class="mx-2"></ion-icon> Tambah Anggota Keluarga
	</a> 
</div>

<?php include_once '../layouts/footer.php' ?>