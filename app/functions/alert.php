<?php 



function alertSuccess($aksi, $table)
{
	echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="margin-left: 16vw; width: 35vw;">
		  Data <strong>'.$table.'</strong> Berhasil <strong>Di'.$aksi.' !</strong>
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
}

function alertFailed($aksi, $table, $message)
{
	echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" style="margin-left: 16vw; width: 35vw;">
		  Data <strong>'.$table.'</strong> Gagal <strong>Di'.$aksi.' !</strong> '. $message .'
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
}