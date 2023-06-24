<?php 

function is_active($page){
	if (basename(dirname($_SERVER['PHP_SELF'])) === $page) {
		echo "active";
	}else{
		echo "";
	}
}

?>



<div class="side-bar">
			
	<div class="side-bar-head">
		<div class="menu-item <?php is_active('dashboard') ?>" href="../dashboard">
		<a href="../dashboard/">
			<ion-icon name="home-sharp" size="large" class="mx-2"></ion-icon>Dashboard
		</a>
		</div>
	</div>
			
	<div class="side-bar-menu">
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
	</div>
</div>
	

