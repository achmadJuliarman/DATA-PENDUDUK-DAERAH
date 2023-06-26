<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/alert.php" ?>


<?php 
if (isset($_SESSION['login'])) {
		

} 
?>
<!-- myCard -->
<div class="container d-flex flex-wrap">
	

<!-- <div class="card text-bg-info mb-3 mt-2 mx-2" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Info card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div> -->


<div class="col mt-3">
	<?php 
		if (isset($_SESSION['berhasil'])) {
			alertSuccessLogin($_SESSION['level']);
			unset($_SESSION['berhasil']);
		}
	 ?>
	<h1 class="mb-4">Dashboard</h1>
	<div class="row">
		<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card mb-4">
	     		<div class="card-body">
	       		 <h2 class="card-title">Data Warga</h2>
	       		 <p class="card-text">Seluruh Data Warga Dari Seluruh RT/RW</p>
	       		 <a href="../warga" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card">
	     		<div class="card-body">
	       		 <h2 class="card-title">Data KK / Keluarga</h2>
	       		 <p class="card-text">Data Keluarga / Kartu Keluarga Yang Ada Dari Seluruh RW & RT</p>
	       		 <a href="../keluarga" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card">
	     		<div class="card-body">
	       		 <h2 class="card-title">Data Kematian</h2>
	       		 <p class="card-text">Data Seluruh Warga Yang Sudah Meninggal Dunia</p>
	       		 <a href="../kematian" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card">
	     		<div class="card-body">
	       		 <h2 class="card-title">Data Mutasi</h2>
	       		 <p class="card-text">Data Seluruh Warga Yang Berpindah Ke Wilayah Lain</p>
	       		 <a href="../mutasi" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card">
	     		<div class="card-body">
	       		 <h2 class="card-title">Penyakit Warga</h2>
	       		 <p class="card-text">Data Riwayat Penyakit Yang Diderita Warga Dari Seluruh RT & RW</p>
	       		 <a href="../penyakit-warga" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-sm-3 mb-3 mb-sm-0">
    		<div class="card">
	     		<div class="card-body">
	       		 <h2 class="card-title">Layanan Kesehatan</h2>
	       		 <p class="card-text">Data Tempat Layanan Kesehatan Dari Seluruh RT & RW</p>
	       		 <a href="../layanan-kesehatan" class="btn btn-primary">Lihat</a>
	      		</div>
	    	</div>
	  	</div>

	</div>
</div>

</div>
<!-- end myCard -->
<?php include_once '../layouts/footer.php' ?>