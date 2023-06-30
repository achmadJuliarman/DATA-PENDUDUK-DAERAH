<div class="menu-crud-wrapper mt-4">
	<div class="menu-crud flex-column">
		<div class="menu-crud-item p-3">
			<a href="tambah.php" class="btn btn-primary" role="button">
				<ion-icon name="add-circle-sharp" size="large" class="mx-2">
			</a>
			<a href="<?= basename($_SERVER['PHP_SELF']).'?'.$_SERVER['QUERY_STRING'] ?>" class="btn btn-primary ms-5" role="button">
				<ion-icon name="refresh-circle-sharp" size="large" class="mx-2">
			</a>
		</div>
	</div>
</div>