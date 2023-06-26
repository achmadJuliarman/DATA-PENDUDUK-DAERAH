<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/rw/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/layanan-kesehatan/function-crud.php" ?>

<?php 
if (isset($_GET['rw'])) {
	$rw = $_GET['rw']; 
}else{
	$rw = 1;
}
?>
<div class="container">
	<div class="badge bg-primary text-wrap mb-3 mt-4">
		<h1>RW <?= $rw ?> </h1>
	</div>
	
	<div class="row">
		<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     		<div class="card-body">
	       		 <h2 class="card-title">Layanan Kesehatan</h2>
	       		 <p class="card-text">Seluruh Data Layanan Kesehatan Yang Tersedia di <b>RW <?= $rw ?></b></p>
	       		 <a href="../layanan-kesehatan/detail.php?rw=<?= $rw ?>" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     		<div class="card-body">
	       		 <h2 class="card-title">Data RT</h2>
	       		 <p class="card-text">Seluruh Data RT Dari <b>RW <?= $rw ?></b></p>
	       		 <a href="../rt/index.php?rw=<?= $rw ?>" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
</div>
</div>
<?php include_once '../layouts/footer.php' ?>