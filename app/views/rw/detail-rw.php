<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/rw/function-crud.php" ?>
<?php require_once "../../functions/rt/function-crud.php" ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/layanan-kesehatan/function-crud.php" ?>

<?php $rw = $_GET['rw'] ?>
<div class="container d-flex flex-wrap">
<div class="col mt-3">
	<div class="badge bg-primary text-wrap mb-3">
		<h1>RW <?= $_GET['rw'] ?> </h1>
	</div>
	
	<!-- QUERY DATA RW -->
	<?php $rt_all = getRtInRw($_GET['rw']); ?>
	<!-- END QUERY DATA RW -->

	<h2 class="mb-4">Seluruh RT: </h2>
	
	<div class="row overflow-auto" style="height: 30vh;">
	<?php if (empty($rt_all)) : ?>
		<h1 class="mb-4">Belum Ada Data RT Di RW <?= $_GET['rw'] ?> Yang Ditambahkan</h1>
	<?php else : ?>

		<?php foreach ($rt_all as $rt) : ?>
			<div class="col-sm-3 mb-3 mb-sm-0">
	    		<div class="card mb-4">
		     		<div class="card-body">
		       		 <h2 class="card-title">RT <?= $rt['no_rt'] ?></h2>
		       		 <p class="card-text">Seluruh Data Yang Ada Dari RT <?= $rt['no_rt'] ?> </p>
		       		 <a href="#" class="btn btn-primary">Lihat</a>
		      		</div>
		    	</div>
		  	</div>
		<?php endforeach; ?>
		
	<?php endif; ?>
	</div>

	
		

	<h2 class="mb-4">Layanan Kesehatan : </h2>

	<div class="row">
		<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     		<div class="card-body">
	       			asdsad
	      		</div>
	    	</div>
	  	</div>
	</div>
	
</div>
</div>
<?php include_once '../layouts/footer.php' ?>