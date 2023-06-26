<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/alert.php" ?>
<?php require_once "../../functions/rw/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/layanan-kesehatan/function-crud.php" ?>

<div class="container d-flex flex-wrap">
<div class="col mt-3">
<?php 

// ALERT TAMBAH
if (isset($_SESSION['tambah'])) {
	// var_dump($_SESSION);
	// die();
	if($_SESSION['kode_err'] === '')
	{
		alertSuccess('tambah', 'RW');
	}else{
		alertSuccess('tambah', 'RW', 'Terjadi Kesalahan Ketika Mengtambah Data');
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
		alertSuccess('ubah '.$_SESSION['message'], 'RW');
	}else{
		alertFailed('ubah', 'RW', 'Terjadi Kesalahan Ketika Mengubah Data '.$_SESSION['message']);
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
		alertSuccess('hapus '.$_SESSION['message'], 'RW');
	}else{
		alertFailed('hapus', 'RW', 'Terjadi Kesalahan Ketika Menghapus Data '.$_SESSION['message']);
	}
	unset($_SESSION['hapus']);
	unset($_SESSION['message']);
	unset($_SESSION['kode_err']);
}


 ?>

	<h1 class="mb-4">Data Seluruh RW Terdaftar : </h1>
	<?php require_once "../layouts/menu.php" ?>
	<div class="row overflow-auto overflow-x-hidden" style="height: 100%;">
	<?php $rw_all = getAllRw(); ?>
	<?php foreach ($rw_all as $rw) : ?>
		<?php $ketua_rw = cariWargaNIK($rw['nik_ketua_rw']); ?>
		
		<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     	  <div class="card-body">
	       		<h2 class="card-title">RW <?= $rw['no_rw'] ?></h2>
	       		<p class="card-text">Seluruh Data Yang Ada Dari RW <?= $rw['no_rw'] ?> </p>
	       		<?php $jumlah_rt_all = count(getRtInRw($rw['no_rw'])); ?>
				<?php $jumlah_kesehatan = count(getKesehatanInRw($rw['no_rw'])); ?>
				<p class="card-text">Jumlah RT : <?= $jumlah_rt_all ?></p>
				<p class="card-text">Jumlah Layanan Kesehatan : <?= $jumlah_kesehatan ?></p>
				<p class="card-text">
					Ketua RW : 
					<?php if (empty($ketua_rw)) : ?>
						<div class="badge bg-danger text-wrap mb-3">Warning !</div><br>
						NIK ketua RW yang diinput <b>Tidak Terdaftar</b>, Silahkan Edit Data RW
					<?php else : ?>
						<?= $ketua_rw[0]['nama_warga'] ?>
					<?php endif; ?>
						
				</p>
				<div class="table-group-divider mb-2"></div>
				<a href="../../functions/rw/hapus.php?rw=<?= $rw['no_rw'] ?>" class="btn btn-danger" style="margin-right: 20px;"
					onClick="return confirm('Yakin Hapus Data dengan No RW : <?= $rw['no_rw'] ?>')">
	       		 	<ion-icon name="trash-outline"></ion-icon> Hapus
	       		</a>
	       		<a href="ubah.php?rw=<?= $rw['no_rw'] ?>&nik=<?= $rw['nik_ketua_rw'] ?>" class="btn btn-success">
	       			<ion-icon name="create-outline"></ion-icon>Edit
	       		</a>
	       		<a href="detail-rw.php?rw=<?= $rw['no_rw'] ?>" class="btn btn-primary">Lihat</a>
	       		
	      	  </div>
	    	</div>
	  	</div>

	<?php endforeach; ?>
	</div>
	
</div>
</div>
<?php include_once '../layouts/footer.php' ?>