<?php 

function is_active($page){
	if (basename(dirname($_SERVER['PHP_SELF'])) === $page) {
		echo "active";
	}else{
		echo "";
	}
}

$dir_file = basename(dirname($_SERVER['PHP_SELF'])).'/'.basename($_SERVER['PHP_SELF']);

?>



<div class="side-bar">
			<?php // echo $dir_file; ?>
	<div class="side-bar-head">
		<div class="menu-item <?= $dir_file === 'user/profil.php' ? 'active' : '' ?> my-2 container">
		<a href="../user/profil.php">
			<ion-icon name="person-circle-outline" size="large" class="mx-2"></ion-icon><b class="text-uppercase"><?= $_SESSION['level'] ?></b> &nbsp <?= $_SESSION['nama'] ?>
		</a>
		</div>
		<!-- <div class="table-group-divider"></div> -->
		<div class="menu-item <?php is_active('dashboard') ?>">
		<a href="../dashboard/">
			<ion-icon name="home-sharp" size="large" class="mx-2"></ion-icon>Dashboard
		</a>
		</div>
	</div>
			
	<div class="side-bar-menu">
		<!-- <div class="menu-item  <?php // is_active('rt') ?>">
		<a href="../rt/">
			<ion-icon name="radio-button-on-outline" size="large" class="mx-2"></ion-icon>RT
		</a>	
		</div> -->
		<div class="menu-item  <?php is_active('rw'); is_active('rt') ?>">
		<a href="../rw/">
			<ion-icon name="radio-button-on-outline" size="large" class="mx-2"></ion-icon>RW
		</a>	
		</div>
		<div class="menu-item  <?php is_active('warga') ?>">
		<a href="../warga/">
			<ion-icon name="accessibility-sharp" size="large" class="mx-2"></ion-icon>Data Warga
		</a>	
		</div>
		<div class="menu-item  <?php is_active('keluarga') ?>">
		<a href="../keluarga/">
			<ion-icon name="people-sharp" size="large" class="mx-2"></ion-icon>Data keluarga
		</a>	
		</div>
		<div class="menu-item  <?php is_active('kematian') ?>">
		<a href="../kematian/">
			<ion-icon name="remove-circle-sharp" size="large" class="mx-2"></ion-icon>Data Kematian
		</a>	
		</div>
		<div class="menu-item  <?php is_active('mutasi') ?>">
		<a href="../mutasi/">
			<ion-icon name="move-sharp" size="large" class="mx-2"></ion-icon>Data Warga Mutasi
		</a>	
		</div>
		<div class="menu-item  <?php is_active('penyakit-warga') ?>">
		<a href="../penyakit-warga/">
			<ion-icon name="heart-half-sharp" size="large" class="mx-2"></ion-icon>Riwayat Penyakit Warga
		</a>	
		</div>
		<div class="menu-item  <?php is_active('layanan-kesehatan') ?>">
		<a href="../layanan-kesehatan/">
			<ion-icon name="medkit-outline" size="large" class="mx-2"></ion-icon>Layanan Kesehatan Sekitar
		</a>
		</div>
		<div class="menu-item mt-3 
		<?= $dir_file === 'user/index.php' ? 'active' : '' ?> 
		<?= $dir_file === 'user/tambah.php' ? 'active' : '' ?>
		<?= $dir_file === 'user/ubah.php' ? 'active' : '' ?> ">
		<a href="../user/">
			<ion-icon name="people-circle-outline" size="large" class="mx-2"></ion-icon>Users
		</a>
		</div>
<!-- 		<ion-icon name="people-circle-outline"></ion-icon> -->
	</div>
</div>
	

