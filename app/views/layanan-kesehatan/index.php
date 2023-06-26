<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/layanan-kesehatan/function-crud.php' ?>
<?php $lk = getAllKesehatan(); ?>
<div class="container">
	<h1 class="my-4">Seluruh Layanan Kesehatan Sekitar</h1>
	<div class="row">
		<?php if (!empty($lk)): ?>
		<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     		<div class="card-body">
	       		 <h2 class="card-title">Layanan Kesehatan</h2>
	       		 <p class="card-text">Seluruh Data Layanan Kesehatan Yang Tersedia di</b></p>
	       		 <p class="card-text"></b></p>
	       		 <a href="" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
	  	<?php else : ?>
	  		<h3>Belum Ada Layanan Kesehatan Yang Ditambahkan</h3>
	  	<?php endif; ?>
	</div>
</div>
<?php include_once '../layouts/footer.php' ?>