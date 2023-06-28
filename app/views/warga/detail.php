<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/user/function-crud.php" ?>
<?php require_once "../../functions/alert.php" ?>
<?php $warga = cariWargaByNIK($_GET['nik']); ?>
<?php $kk = cariWargaByNIK_join($_GET['nik']); ?>
<div class="container mt-3">
	<div class="card">
	  <h4 class="card-header">Detail Warga NIK 
	  	<span class="badge text-bg-info"><?= $warga['nik_warga'] ?></span>
	  </h4>
	  <div class="card-body">
	  	<div class="data-kk d-flex">
	  		<div class="badge bg-info text-wrap mb-3 mt-4 d-flex">
	  			<h3 class="mx-4">NO KK : <?= $warga['no_kk'] ?></h3>
	  		</div>
	  		<div class="badge bg-info text-wrap mb-3 mt-4 d-flex mx-4">
	  			<h3 class="text-uppercase">
					<?php $kepala = cariWargaByNIK_join($kk['nik_kepala_kk']); ?>
		  			Kepala Keluarga : <?= $kepala['nama_warga']  ?>
		  		</h3>
			</div>
	  		
	  	</div>
	    
	    <div class="data-wrapper d-flex">
	    	<div class="data-left">
	    		<p class="card-text"><b>Nama : </b> <?= $warga['nama_warga'] ?></p>
			    <p class="card-text"><b>NIK : </b> <?= $warga['nik_warga'] ?></p>
			    <p class="card-text"><b>Status Dalam Keluarga : </b> <?= $warga['status_kk'] ?></p>
			    <p class="card-text"><b>Tempat Lahir :</b> <?= $warga['tempat_lahir'] ?></p>
			    <p class="card-text"><b>Tanggal Lahir :</b> <?= $warga['tanggal_lahir'] ?></p>
			    <p class="card-text"><b>Jenis Kelamin :</b> <?= $warga['jenis_kelamin'] ?></p>
			    <p class="card-text"><b>Gol. Darah :</b> <?= $warga['gol_darah'] ?></p>
			    <p class="card-text"><b>Kewarganegaraan :</b> <?= $warga['kewarganegaraan'] ?></p>
			    <p class="card-text"><b>RW / RT :</b> <?= $warga['no_rw'] ?> / <?= $warga['no_rt'] ?></p>
			    <p class="card-text"><b>Agama :</b> <?= $warga['agama'] ?></p>
			    <p class="card-text"><b>Kontak :</b> <?= $warga['kontak'] ?></p>
	    	</div>
	    	<div class="data-right" style="margin-left: 25%;">
	    		<p class="card-text"><b>Alamat KTP :</b> <?= $warga['alamat_ktp'] ?></p>
	    		<p class="card-text"><b>Alamat Tinggal :</b> : <?= $warga['alamat_tinggal'] ?></p>
			    <p class="card-text"><b>Pendidikan Terakhir :</b> <?= $warga['pendidikan_terakhir'] ?></p>
			    <p class="card-text"><b>Status Perkawinan :</b> <?= $warga['status_perkawinan'] ?></p>
			    <p class="card-text"><b>Status Kehidupan :</b> <?= $warga['status_kehidupan'] ?></p>
			    <?php $user_adder = getUserById($warga['id_adder'])[0]; ?>
			    <p class="card-text">
			    	<b>Di Tambahkan Oleh User ID :</b> <?= $warga['id_adder'] ?> - <?= $user_adder['nama_lengkap'] ?>
			    </p>
			    <p class="card-text"><b>Tanggal Ditambah :</b> <?= $warga['created_at'] ?></p>

			    <?php if (!empty($warga['id_updater'])): ?>
			    	<?php $user_updater = getUserById($warga['id_updater'])[0]; ?>
				    <p class="card-text"><b>Di Edit Oleh User ID :</b> <?= $warga['id_updater'] ?> - <?= $user_updater['nama_lengkap'] ?></p>	
				    <p class="card-text"><b>Tanggal Terakhir Diubah :</b> <?= $warga['updated_at'] ?></p>
			    <?php else :  ?>
			    	<p class="card-text"><b>Di Edit Oleh User ID :</b> <p class="badge bg-info">Belum Pernah Ada Yang Mengupdate Data Ini</p></p>	
			    <?php endif ?>
	    	</div>
	    </div>
	    
	  </div>
	</div>
</div>
<?php include_once '../layouts/footer.php' ?>