<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/alert.php' ?>
<?php include_once '../../functions/penyakit-warga/function-crud.php' ?>
<div class="container">
	
<?php $penyakit = getAllPenyakit(); ?>


<?php 

// ALERT TAMBAH
if (isset($_SESSION['tambah'])) {
  // var_dump($_SESSION);
  // die();
  if($_SESSION['kode_err'] === '')
  {
    alertSuccess('tambah', 'List Penyakit');
  }else{
    alertSuccess('tambah', 'List Penyakit', 'Terjadi Kesalahan Ketika Menambah Data');
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
    alertSuccess('ubah '.$_SESSION['message'], 'Penyakit');
  }else{
    alertFailed('ubah', 'List Penyakit', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
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
    alertFailed('hapus', 'List Penyakit', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
  }
  unset($_SESSION['hapus']);
  unset($_SESSION['message']);
  unset($_SESSION['kode_err']);
}

 ?>


<h1 class="my-3">List Penyakit</h1>
<a href="tambah-list-penyakit.php" class="btn btn-primary">
	<i data-feather="plus" class="mx-1"></i>Tambah List Penyakit
</a>
<!-- TABLE DATA -->
<table class="table table-hover table-bordered mt-4">
	<thead>
	    <tr class="table-dark">
	      <th scope="col">#</th>
	      <th scope="col">Nama Penyakit</th>
	      <th scope="col">Jumlah Penderita Sekelurahan</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
 	<tbody>
 		<?php $no=1 ?>
 		<?php foreach ($penyakit as $p) : ?>
 		<tr>
 			<td><?= $no++; ?></td>
 			<td><?= $p['nama_penyakit'] ?></td>
 			<td align="center">
 				<?php $jumlah = getJumlahPenderita($p['id_penyakit']); ?>
 				<?php if (empty($jumlah)) : ?>
 					0 Warga
 				<?php else : ?>
 					<?= $jumlah[0]['jumlah'] ?> Warga
 				<?php endif; ?>
 			</td>
 			<td>
 			<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			    aksi
			  </button>
			  <ul class="dropdown-menu dropdown-menu-dark">
			    <li>
			    	<a class="dropdown-item" href="ubah-list.php?id=<?= $p['id_penyakit']; ?>">
			    		ubah
			    	</a>
				</li>
			  <li><hr class="dropdown-divider"></li>
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