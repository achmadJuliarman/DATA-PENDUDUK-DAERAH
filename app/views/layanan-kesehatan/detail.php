<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/layanan-kesehatan/function-crud.php' ?>
<?php 
if (!isset($_GET['rw'])) {
	header("Location: index.php");
}

$rw = $_GET['rw'];
$_SESSION['lk-rw'] = $_GET['rw'];
$rw = $_SESSION['lk-rw'];

$lk = getKesehatanInRw($rw);

// var_dump($lk);
// die();
 ?>
<div class="container">
	<h1 class="my-4">Layanan Kesehatan Di 
	<div class="badge bg-primary text-wrap mb-3 mt-4">
		<b>RW <?= $rw ?></b> 
	</div>
	</h1>
	<div class="row">
		<?php if (!empty($lk)): ?>
		<?php foreach ($lk as $l) : ?>

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
	  		<h3>Belum Ada Layanan Kesehatan Di <b>RW <?= $_GET['rw']; ?></b> yang Ditambahkan</h3>
	  	<?php endif; ?>
	</div>
</div>
<?php include_once '../layouts/footer.php' ?>