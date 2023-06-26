<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/rt/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>
<?php require_once "../../functions/alert.php" ?>

<?php 
if (isset($_GET['rw'])) {
	$rw = $_GET['rw'];
	$_SESSION['query-rw'] = $_GET['rw'];
}else if(isset($_SESSION['query-rw'])){
	$rw = $_SESSION['query-rw'];
}else{
	$rw = 1;
}

$rt = getRtInRw($rw);

// var_dump($rt);

// FORM CARI HANDLER
if (isset($_GET['cari'])) {
	if ($_GET['keyword'] != '') {
		$rt = cariRt($_GET['keyword']);
		// var_dump($rt);
	}	
}

?>

<div class="container">
<!-- ALERT -->
<?php 

// ALERT TAMBAH
if (isset($_SESSION['tambah'])) {
	// var_dump($_SESSION);
	// die();
	if($_SESSION['kode_err'] === '')
	{
		alertSuccess('tambah', 'RT');
	}else{
		alertSuccess('tambah', 'RT', 'Terjadi Kesalahan Ketika Mengtambah Data');
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
		alertSuccess('ubah '.$_SESSION['message'], 'RT');
	}else{
		alertFailed('ubah', 'RT', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
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
		alertSuccess('hapus '.$_SESSION['message'], 'RT');
	}else{
		alertFailed('hapus', 'RT', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
	}
	unset($_SESSION['hapus']);
	unset($_SESSION['message']);
	unset($_SESSION['kode_err']);
}


 ?>

	<h1 class="my-4">Data RT Di RW <?= $rw ?></h1>
<!-- MENU CRUD KHUSUS TAMBAH RT -->

<div class="menu-crud-wrapper mt-4">
	<div class="menu-crud flex-column">
		<div class="menu-crud-item p-3">
			<a href="tambah.php?rw=<?= $rw ?>" class="btn btn-primary" role="button">
				<ion-icon name="add-circle-sharp" size="large" class="mx-2">
			</a>
			<a href="index.php" class="btn btn-primary ms-5" role="button">
				<ion-icon name="refresh-circle-sharp" size="large" class="mx-2">
			</a>
		</div>
	</div>
</div>
<!-- END END MENU CRUD -->
<?php include_once '../layouts/form-cari.php'?>
<table class="table table-hover table-bordered mt-2">
	<thead>
	    <tr class="table-dark">
	      <th scope="col">#</th>
	      <th scope="col">No RW</th>
	      <th scope="col">No RT</th>
	      <th scope="col">NIK Ketua RT</th>
	      <th scope="col">Nama Ketua RT</th>
	      <th scope="col">Waktu Dibuat</th>
	      <th scope="col">Waktu Terakhir Diubah</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
 	<tbody>
 	<?php $no =1; ?>
 	<?php foreach ($rt as $r) : ?>
 		<tr>
	      <th scope="row"><?= $no++; ?></th>
	      <td><?= $r['no_rw']  ?></td>
	      <td><?= $r['no_rt']  ?></td>
	      <td><?= $r['nik_ketua_rt']  ?></td>
	      <td><?= cariWargaNIK($r['nik_ketua_rt'])[0]['nama_warga'] ?></td>
	      <td><?= $r['created_at']  ?></td>
	      <td><?= $r['updated_at']  ?></td>
	      <td>
	      	<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			    aksi
			  </button>
			  <ul class="dropdown-menu dropdown-menu-dark">
			    <li>
			    	<a class="dropdown-item" href="ubah.php?nik=<?= $r['nik_ketua_rt'] ?>&rw=<?= $rw ?>&rt=<?= $r['no_rt'] ?>">
			    		Ubah
			    	</a>
				</li>
			    <li><hr class="dropdown-divider"></li>
			    <!-- <li><a class="dropdown-item" href="../../functions/rt/hapus.php?rt=<?= $r['no_rt'] ?>" 
			    	onClick="return confirm('Yakin Hapus Data dengan NO RT : <?= $r['no_rt'] ?>')">Hapus</a>
			    </li> -->
			  </ul>
			</div>
	      </td>
	    </tr>

	<?php endforeach; ?>
 	</tbody>

</div>
<?php include_once '../layouts/footer.php' ?>