<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/layanan-kesehatan/function-crud.php' ?>
<?php include_once '../../functions/alert.php' ?>
<?php $lk = getAllKesehatan(); ?>

<div class="container">

<!-- FORM CARI HANDLER -->
<?php 
if (isset($_GET['cari'])) {
	if ($_GET['keyword'] != '') {
		$lk = cariKesehatan($_GET['keyword']);
		// var_dump($lk);
	}	
}


 ?>


<!-- ALERT HANDLER -->
<?php 

// ALERT TAMBAH
if (isset($_SESSION['tambah'])) {
	// var_dump($_SESSION);
	// die();
	if($_SESSION['kode_err'] === '')
	{
		alertSuccess('tambah', 'Layanan Kesehatan');
	}else{
		alertSuccess('tambah', 'Layanan Kesehatan', 'Terjadi Kesalahan Ketika Mengtambah Data');
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
		alertSuccess('ubah '.$_SESSION['message'], 'Layanan Kesehatan');
	}else{
		alertFailed('ubah', 'Layanan Kesehatan', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
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
		alertSuccess('hapus '.$_SESSION['message'], 'Layanan Kesehatan');
	}else{
		alertFailed('hapus', 'Layanan Kesehatan', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
	}
	unset($_SESSION['hapus']);
	unset($_SESSION['message']);
	unset($_SESSION['kode_err']);
}


 ?>

 <!-- END ALERT -->

	<h1 class="my-4">Seluruh Layanan Kesehatan Sekitar</h1>
	<?php include_once '../layouts/menu.php' ?>
	<?php include_once '../layouts/form-cari.php' ?>
	<div class="row">
		<?php if (!empty($lk)): ?>
		<?php foreach ($lk as $l): ?>
		
		<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     		<div class="card-body">
	       		 	<h2 class="card-title"><?= $l['nama_layanan'] ?></h2>
	       		<div class="badge bg-primary text-wrap mb-3">
	       		 	<?= $l['jenis_layanan'] ?>
	       		</div>
	       		 	<small><b>RW <?= $l['no_rw'] ?></b></small>
	       		 	<p class="card-text"><?= $l['alamat_tempat'] ?></p>
	       		 	<small class="">Kontak : <?= $l['kontak'] ?></small><br>
	       		<div class="table-group-divider my-3"></div>
	       		<a href="../../functions/layanan-kesehatan/hapus.php?id=<?= $l['id_layanan']; ?>&nama=<?= $l['nama_layanan'] ?>"
	       		class="btn btn-danger mx-4" 
	       		onclick="return confirm('Yakin Hapus Data Layanan : <?= $l['nama_layanan'] ?> ')">
	       		 	<ion-icon name="trash-outline"></ion-icon> Hapus
	       		</a>
	       		<a href="ubah.php?id=<?= $l['id_layanan'] ?>" class="btn btn-success mx-4">
	       			<ion-icon name="create-outline"></ion-icon>Edit
	       		</a>
	      		</div>
	    	</div>
	  	</div>

	  	<?php endforeach ?>
	  	<?php else : ?>
	  		<!-- kalau bisa pake badge -->
	  		<h3>Tidak Ditemukan Layanan Kesehatan</h3>
	  	<?php endif; ?>
	</div>
</div>
<?php include_once '../layouts/footer.php' ?>