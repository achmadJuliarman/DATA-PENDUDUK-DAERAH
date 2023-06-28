<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php include_once '../../functions/keluarga/function-crud.php' ?>
<?php include_once '../../functions/warga/function-crud.php' ?>
<div class="container">
<br><br>
<?php if (!isset($_GET['no'])) {
	header("Location: index.php");
} ?>
<h3 class="my-3">Anggota Keluarga Dari Nomor Kartu Keluarga <b><?= $_GET['no'] ?></b></h3><br>
<?php $anggota = getWargaByKK($_GET['no']) ?>
<?php $kk = getAnggotaKeluargaByNo($_GET['no'])[0]; ?>


<table class="table table-hover table-bordered " >
  <thead class="">
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">NO KK</th>
      <th scope="col">NIK Kepala Keluarga</th>
      <th scope="col">Nama Anggota</th>
      <th scope="col">Status</th>
      <th scope="col">Alamat KK</th>
      <th scope="col">RT / RW</th>
      <th scope="col">Tanggal Tambah</th>
      <th scope="col">Tanggal Edit</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($anggota as $a) : ?>    
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $a['no_kk'] ?></td>
      <td><?= $kk['nik_kepala_kk'] ?></td>
      <td><?= $a['nama_warga'] ?></td>
      <?php // $kepala = getKepalaKeluarga($kk['nik_kepala_kk'])[0]; ?>
      <td><?= $a['status_kk'] ?></td>
      <td><?= $kk['alamat_kk'] ?></td>
      <td><?= $a['no_rt'] ?> / <?= $a['no_rw'] ?></td>
      <td><?= $a['created_at'] ?></td>
      <td>
      <?php if ($a['updated_at'] == '0000-00-00 00:00:00'): ?>
        <div class="badge bg-primary text-wrap mb-3"> Belum Pernah Ada Perubahan </div>
      <?php else : ?>         
        <?= $a['updated_at'] ?> 
      <?php endif ?>  
      </td>
      <td>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            aksi
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="../warga/ubah.php?nik=<?= $a['nik_warga'] ?> ">Ubah Data Anggota Ini</a></li>
            <li><a class="dropdown-item" href="../../functions/keluarga/hapus-anggota.php?nik=<?= $a['nik_warga'] ?> ">Hapus Data Anggota Ini</a></li>
          </ul>
        </div>
      </td>
    </tr>
    <?php endforeach ?>
</tbody>

</div>


<?php include_once '../layouts/footer.php' ?>