<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

	<!-- feather icon -->
	<script src="https://unpkg.com/feather-icons"></script>
	<!-- end icon -->

	<!-- My CSS -->
	<link rel="stylesheet" href="../../css/colors.css">
	<link rel="stylesheet" href="../../css/side-bar.css">
	<link rel="stylesheet" href="../../css/menu.css">
	<link rel="stylesheet" href="../../css/style.css">
	<!-- END MY CSS -->
</head>
<body>
<header>
	<div class="app-name" style="height: 100%;">
		<a href="../dashboard" style="text-decoration: none; color: white;" class="d-flex align-items-center justify-content-center">
			Aplikasi Pendataan Penduduk
		</a>
	</div>
	<div class="logout d-flex" align="right" style="height: 100%;">	
		<a href="../../../logout.php" style="text-decoration: none; color: white;" class="d-flex align-items-center ">
			Logout
			<ion-icon name="log-out-sharp" size="large" class="mx-2">
		</a>
	</div>
</header>
<div class="main-content">