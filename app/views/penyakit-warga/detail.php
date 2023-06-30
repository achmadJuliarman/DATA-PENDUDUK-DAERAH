<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/alert.php' ?>
<?php include_once '../../functions/penyakit-warga/function-crud.php' ?>
<div class="container">
	
<?php 
if (!isset($_GET['nik']) && !isset($_GET['nama'])) {
	header("Location: index.php");
}
 ?>
<?php 
// ALERT UBAH
if (isset($_SESSION['ubah'])) {
  // var_dump($_SESSION);
  // die();
  if($_SESSION['kode_err'] === '')
  {
    alertSuccess('ubah '.$_SESSION['message'], 'Penyakit');
  }else{
    alertFailed('ubah', 'Penyakit', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
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
    alertSuccess('hapus '.$_SESSION['message'], 'Penyakit');
  }else{
    alertFailed('hapus', 'Penyakit', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
  }
  unset($_SESSION['hapus']);
  unset($_SESSION['message']);
  unset($_SESSION['kode_err']);
}

 ?>

<?php $penyakit_warga = getPenyakitByNIK($_GET['nik']); ?>

	<h1 class="mt-4">Detail Penyakit Dari Warga</h1> 
	<h2 class="mt-4">NIK : 
		<div class="badge bg-info text-wrap sm-2">
			<h5><?= $_GET['nik'] ?></h5>
		</div>
	</h2>
	<h2>Nama :
		<div class="badge bg-info text-wrap">
			<h5><?= $_GET['nama'] ?></h5>
		</div>
	</h2>


<!-- TABLE DATA -->
<table class="table table-hover table-bordered mt-4">
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
			    	<a class="dropdown-item" href="ubah.php?id=<?= $pw['id_penyakit'] ?>">
			    		ubah
			    	</a>
				</li>
			    <li><hr class="dropdown-divider"></li>
			    <li><a class="dropdown-item" 
			    	href="../../functions/penyakit-warga/hapus.php?id=<?= $pw['id_penyakit'] ?>&hapus=satu&nama=<?= $pw['nama_warga'] ?>&nik=<?= $pw['nik_penyakit'] ?>" 
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