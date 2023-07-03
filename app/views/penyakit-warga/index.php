<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/alert.php' ?>
<?php include_once '../../functions/penyakit-warga/function-crud.php' ?>
<div class="container">
	<h1 class="mt-4">Data Riwayat Penyakit Warga</h1>

<?php include_once '../layouts/menu.php' ?>	
<?php include_once '../layouts/form-cari.php' ?>	
<?php $penyakit_warga = getWargaBerpenyakit(); ?>
<?php 
if (isset($_GET['cari'])) {
	if (isset($_GET['keyword']) != '') {
		$penyakit_warga = cariPenyakit($_GET['keyword']);
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
    alertSuccess('tambah', 'Penyakit');
  }else{
    alertSuccess('tambah', 'Penyakit', 'Terjadi Kesalahan Ketika Menambah Data');
  }
  unset($_SESSION['tambah']);
  unset($_SESSION['kode_err']);
}


// ALERT HAPUS
if (isset($_SESSION['hapus'])) {
  // var_dump($_SESSION);
  // die();
  if($_SESSION['kode_err'] === '')
  {
    alertSuccess('hapus '.$_SESSION['message'], 'Penyakit');
  }else{
    alertFailed('hapus', 'Penyakit', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
  }
  unset($_SESSION['hapus']);
  unset($_SESSION['message']);
  unset($_SESSION['kode_err']);
}

?>

<?php $penyakit_all = getAllPenyakit(); ?>
<div class="list-penyakit d-flex">
	<div class="dropdown">
		<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			Filter
		</button>

		<ul class="dropdown-menu dropdown-menu-dark">
			<li><a class="dropdown-item active" href="index.php">All</a></li>
			<li><hr class="dropdown-divider"></li>
			<?php foreach ($penyakit_all as $pa): ?>
				<li>
					<a class = "dropdown-item" href="filter.php?id=<?= $pa['id_penyakit'] ?>"><?= $pa['nama_penyakit'] ?></a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
	<div class="crud-penyakit mx-3">
		<a href="list-penyakit.php" class="btn btn-primary">
			<i data-feather="eye" class="mx-1"></i>Lihat List Penyakit
		</a>
	</div>
</div>
<!-- TABLE DATA -->
<table class="table table-hover table-bordered mt-2">
	<thead>
	    <tr class="table-dark">
	      <th scope="col">#</th>
	      <th scope="col">RW/RT</th>
	      <th scope="col">NIK Warga</th>
	      <th scope="col">Nama Warga</th>
	      <th scope="col">Penyakit Diderita</th>
	      <th scope="col">Waktu Dibuat</th>
	      <th scope="col">Waktu Terakhir Diubah</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
 	<tbody>
 		<?php $no=1 ?>
 		<?php foreach ($penyakit_warga as $pw) : ?>
 		<tr>
 			<td><?= $no++; ?></td>
 			<td><?= $pw['no_rw'] ?>/<?= $pw['no_rt'] ?></td>
 			<td><?= $pw['nik_penyakit'] ?></td>
 			<td><?= $pw['nama_warga'] ?></td>
 			<td>
 				<?php if (strlen($pw['penyakit']) >= 20): ?>
 					<?= substr($pw['penyakit'], 0, 20 ) ?> ...</td>
 				<?php else : ?>
 					<?= $pw['penyakit'] ?>
 				<?php endif ?>
 			<td><?= $pw['created_at'] ?></td>
 			<td>
 			<?php if ($pw['ditambah'] == '0000-00-00 00:00:00'): ?>
  				<div class="badge bg-primary text-wrap mb-3"> Belum Pernah Ada Perubahan </div>
  			<?php else : ?>
  				<?= $pw['diubah'] ?>		
  			<?php endif; ?>
 						
 			</td>
 			<td>
 			<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			    aksi
			  </button>
			  <ul class="dropdown-menu dropdown-menu-dark">
			    <li>
			    	<a class="dropdown-item" href="detail.php?nik=<?= $pw['nik_penyakit'] ?>&nama=<?= $pw['nama_warga'] ?>">
			    		Lihat Detail
			    	</a>
				</li>
			    <li><hr class="dropdown-divider"></li>
			    <li><a class="dropdown-item" 
			    	href="../../functions/penyakit-warga/hapus.php?id=<?= $pw['id_penyakit_warga'] ?>&hapus=semua&nama=<?= $pw['nama_warga'] ?>
			    	&nik=<?= $pw['nik_penyakit'] ?>"  
			    	onClick="return confirm('Yakin Hapus Data Penyakit Warga  NIK : <?= $pw['nik_penyakit'] ?> Penyakit : <?= $pw['penyakit'] ?>')">Hapus</a>
			    </li>
			  </ul>
			</div>
 			</td>
 		</tr>
 		<?php endforeach ?>
 	</tbody>
</table>
<!-- END TABLE -->
</div>



<?php include_once '../layouts/footer.php' ?>