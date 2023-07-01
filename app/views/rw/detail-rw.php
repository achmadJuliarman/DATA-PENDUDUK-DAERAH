<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/rw/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/layanan-kesehatan/function-crud.php" ?>
<?php require_once "../../functions/penyakit-warga/function-crud.php" ?>

<?php 
if (isset($_GET['rw'])) {
	$rw = $_GET['rw']; 
}else{
	$rw = 1;
}

$penyakit = getAllPenyakit();
$total_warga = count(getWargaByRw($rw));
?>

<div class="container">
	<div class="badge bg-primary text-wrap mb-3 mt-4">
		<h1>RW <?= $rw ?> </h1>
	</div>
	<div class="penyakit-wrapper my-3">
		<div class="card d-flex p-2">
			<h5>
				<div class="badge bg-info">
					Persentase Penyakit Yang Diderita Warga <b class="text-black">RW <?= $rw ?></b>
				</div>
			</h5>	
			<p>Total Warga : <?= $total_warga ?></p>
			<div class="persentase d-flex flex-wrap mt-1">
			<?php if (empty($total_warga)): ?>
				<h3>Belum Ada Data Warga Di RW Ini Yang Ditambahkan</h3>
			<?php else : ?>
				<?php foreach ($penyakit as $p) : ?>
					<div class="penyakit d-flex flex-wrap mt-2 mx-3">
						<div class="name"><b><?= $p['nama_penyakit'] ?> :</b> </div>
						<span class="badge rounded-pill text-bg-danger mx-1">
						<?= $persentase = persentasePenyakitByRW($p['id_penyakit'],$rw); ?>
							%
						</span>
					</div>
				<?php endforeach ?>
			<?php endif ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     		<div class="card-body">
	       		 <h2 class="card-title">Layanan Kesehatan</h2>
	       		 <p class="card-text">Seluruh Data Layanan Kesehatan Yang Tersedia di <b>RW <?= $rw ?></b></p>
	       		 <p class="card-text">Jumlah : <?= count(getKesehatanInRw($rw)); ?></b></p>
	       		 <a href="../layanan-kesehatan/detail.php?rw=<?= $rw ?>" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     		<div class="card-body">
	       		 <h2 class="card-title">Data RT</h2>
	       		 <p class="card-text">Seluruh Data RT Dari <b>RW <?= $rw ?></b></p>
	       		 <p class="card-text">Jumlah : <b><?= count(getRtInRw($rw)); ?></b></p>
	       		 <a href="../rt/index.php?rw=<?= $rw ?>" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
	</div>
	
</div>
<?php include_once '../layouts/footer.php' ?>

