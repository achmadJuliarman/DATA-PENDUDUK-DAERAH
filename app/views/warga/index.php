<?php include_once '../layouts/header.php' ?>
<?php include_once '../layouts/side-bar.php' ?>
<?php require_once "../../functions/warga/data.php" ?>
<div class="container">
<table class="table table-hover table-bordered mt-2">
  <thead>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">L/P</th>
      <th scope="col">Usia</th>
      <th scope="col">Tempat Lahir</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Pendidikan Terakhir</th>
      <th scope="col">Pekerjaan</th>
      <th scope="col">Status Kawin</th>
      <th scope="col">Status warga</th>
      <th scope="col">Status Kehidupan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>

  <tbody>
  	<?php foreach ($warga as $w) { ?>
    <tr>
      <th scope="row">1</th>
      <td><?= $w['nik_warga'] ?></td>
      <td><?= $w['nama_warga'] ?></td>
      <td><?= $w['jenis_kelamin'] ?></td>
      <td>Otto</td>
      <td>21</td>
      <td>Bandung</td>
      <td>SMA</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
      	<div class="dropdown">
		  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		    aksi
		  </button>
		  <ul class="dropdown-menu dropdown-menu-dark">
		    <li><a class="dropdown-item" href="#">Ubah</a></li>
		    <li><hr class="dropdown-divider"></li>
		    <li><a class="dropdown-item" href="#">Hapus</a></li>
		  </ul>
		</div>
      </td>
    </tr>
    <?php } ?>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>
<?php include_once '../layouts/footer.php' ?>