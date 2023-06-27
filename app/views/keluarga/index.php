<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/keluarga/function-crud.php' ?>
<?php include_once '../../functions/rw/function-crud.php' ?>
<div class="container">
<h1 class="my-4">Data Keluarga</h1>

<?php $keluarga = getAllKeluarga(); ?>
<?php $rw_all = getAllRw(); ?>

<div class="row mb-4">
		<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     		<div class="card-body">
	       		 <h2 class="card-title">Keluarga</h2>
	       		 <p class="card-text">Data Keluarga Dari Seluruh RW</p>
	       		 <p class="card-text">Jumlah : <?= getJumlahKeluarga(); ?></b></p>
	       		 <a href="all.php" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
</div>
<div class="table-group-divider mb-2"></div>
<div class="row">
	<?php foreach ($rw_all as $rw ): ?>
	<div class="col-sm-3 mb-3 mb-sm-0">
    	<div class="card mb-4">
	     	<div class="card-body">
	       		<h2 class="card-title">RW <?= $rw['no_rw'] ?></h2>
	       		<p class="card-text">Data Keluarga Dari RW <?= $rw['no_rw']; ?></p>
	       		<p class="card-text">Jumlah : <?=  getJumlahKeluargaInRw($rw['no_rw']); ?></b></p>
				<a href="keluarga-in-rw.php?rw=<?= $rw['no_rw'] ?>" class="btn btn-primary">Lihat</a>
			</div>
		</div>
	</div>
	<?php endforeach ?>
</div>

</div>


<?php include_once '../layouts/footer.php' ?>