<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/function-crud.php" ?>
<?php require_once "../../functions/alert.php" ?>



<div class="container">
<?php 

if (isset($_SESSION['tambah'])) {
	// var_dump($_SESSION);
	// die();
	if ($_SESSION['kode_err'] === 1062) 
	{
		alertFailed('tambah', 'warga', 'NIK Sudah Terdaftar');
	}else if($_SESSION['kode_err'] === '')
	{
		alertSuccess('tambah', 'warga');
	}
	unset($_SESSION['tambah']);
	unset($_SESSION['kode_err']);
}

if (isset($_SESSION['ubah'])) {
	// var_dump($_SESSION);
	// die();
	if($_SESSION['kode_err'] === '')
	{
		alertSuccess('ubah', 'warga');
	}else{
		alertFailed('ubah', 'warga', 'Terjadi Kesalahan Ketika Mengubah Data');
	}
	unset($_SESSION['ubah']);
	unset($_SESSION['kode_err']);
}
	
if (isset($_SESSION['hapus'])) {
	// var_dump($_SESSION);
	// die();
	if($_SESSION['kode_err'] === '')
	{
		alertSuccess('hapus '.$_SESSION['message'], 'warga');
	}else{
		alertFailed('hapus', 'warga', 'Terjadi Kesalahan Ketika Menghapus Data');
	}
	unset($_SESSION['hapus']);
	unset($_SESSION['kode_err']);
	unset($_SESSION['message']);
}
	

 ?>

<?php include_once '../layouts/menu.php' ?>
<table class="table table-hover table-bordered mt-2">
  <thead>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">L/P</th>
      <th scope="col">Agama</th>
      <th scope="col">RT/RW</th>
      <th scope="col">Usia</th>
      <th scope="col">Pendidikan Terakhir</th>
      <th scope="col">Pekerjaan</th>
      <th scope="col">Status Kawin</th>
      <th scope="col">Status warga</th>
      <th scope="col">Status Kehidupan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>

  <tbody>
  	<?php $no = 1; ?>
  	<!-- pagination config -->
  	<?php 
		$jumlahData = count(getAllWarga());

		$jumlahDataPerhalaman = 8;
		$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

		$halamanAktif = ( isset($_GET['page']) ? $halamanAktif = $_GET['page'] : $halamanAktif = 1);

		$mulaiDari = ($halamanAktif * $jumlahDataPerhalaman) - $jumlahDataPerhalaman;

		// var_dump($mulaiDari);
		$warga_all = getAllWargaPaginated($mulaiDari, $jumlahDataPerhalaman);
	?>
	<!-- end cifguration config -->

  	<?php foreach ($warga_all as $w) { ?>
    <tr>
      <th scope="row"><?= $no++; ?></th>
      <td><?= $w['nik_warga'] ?></td>
      <td><?= $w['nama_warga'] ?></td>
      <td><?= $w['jenis_kelamin'] ?></td>
      <td><?= $w['agama'] ?></td>
      <td><?= $w['no_rt'] ?> / <?= $w['no_rw'] ?></td>
      <td><?= $w['usia'] ?></td>
      <td><?= $w['pendidikan_terakhir'] ?></td>
      <td><?= $w['pekerjaan'] ?></td>
      <td><?= $w['status_perkawinan'] ?></td>
      <td><?= $w['status_warga'] ?></td>
      <td><?= $w['status_kehidupan'] ?></td>
      <td>
      	<div class="dropdown">
		  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		    aksi
		  </button>
		  <ul class="dropdown-menu dropdown-menu-dark">
		  	<li><a class="dropdown-item" href="detail.php?nik=<?= $w['nik_warga'] ?>">Lihat Detail</a></li>
		    <li><a class="dropdown-item" href="ubah.php?nik=<?= $w['nik_warga'] ?>">Ubah</a></li>
		    <li><hr class="dropdown-divider"></li>
		    <li><a class="dropdown-item" href="../../functions/warga/hapus.php?nik=<?= $w['nik_warga'] ?>" 
		    	onClick="return confirm('Yakin Hapus Data dengan NIK : <?= $w['nik_warga'] ?>')">Hapus</a>
		    </li>
		  </ul>
		</div>
      </td>
    </tr>
    <?php } ?>
</table>

<div class="data-jumlah-warga d-flex">
	<p class="mx-2"><b>Pria :</b> <?= getJumlahPria(); ?> </p>
	<p class="mx-2"><b>Wanita :</b> <?= getJumlahWanita(); ?> </p>
	<p class="mx-2"><b>Lansia :</b> <?= getJumlahLansia(); ?> </p>
	<p class="mx-2"><b>Remaja < 18 :</b> <?= getJumlahRemaja(); ?> </p>
	<p class="mx-2"><b>Dewasa >= 18 :</b> <?= getJumlahDewasa(); ?> </p>
</div>

<!-- NAVIGATION PAGE -->

<nav aria-label="Page navigation example">
  <ul class="pagination">
  	<?php if (($halamanAktif-1) != 0) : ?>
    	<li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif-1 ?>">Previous</a></li>
	<?php endif; ?>

    <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
    	<li class="page-item">
    		<?php if ($halamanAktif == $i) : ?>
    			<a class="page-link active" href="?page=<?= $i ?>"><?= $i ?></a>
    		<?php else : ?>
    			<a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
    		<?php endif; ?>
    	</li>
    <?php endfor; ?>

    <?php if (($halamanAktif+1) <= $jumlahHalaman) : ?>
    	<li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif+1 ?>">Next</a></li>
	<?php endif; ?>
  </ul>
</nav>

</div>
<?php include_once '../layouts/footer.php' ?>