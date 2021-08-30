<?php
include 'koneksi.php';
$tgl = date('Y-m-d');
session_start();
if (isset($_SESSION['sesi'])) {
?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistem Informasi Perpustakaan</title>
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">

		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
		</style>

	</head>

	<body>
		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-12 col-lg-12 me-0 px-3 fs-3 text-start fs-bold" href="index.php?=beranda.php">Perpustakaan Umum <span class="d-block fs-6">Jl. Lembah Abang No 11, Telp: (021)55555555</span> </a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</header>
		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2  d-md-block bg-light sidebar collapse">
					<div class="position-sticky pt-3">
						<ul class="nav flex-column">
							<li class="nav-item mt-3">
								<div id="nama-user" class="ms-3 fs-4">
									<p class="user"><i class="fas fa-user me-2"></i>Howdy, <?php echo $_SESSION['sesi']; ?>!</p>
								</div>
							</li>
							<li class="nav-item nav-konten mb-2">
								<a class="nav-link" aria-current="page" href="index.php?p=beranda">
									<i class="fas fa-home me-1"></i>
									Beranda
								</a>
							</li>
							<li class="nav-item nav-konten">
								<p class="bg-dark text-white text-center fs-5 fw-bold"><i class="fas fa-key me-1"></i> Data Master</p>
							</li>
							<li class="nav-item nav-konten">
								<a class="nav-link" href="index.php?p=anggota">
									<i class="fas fa-users me-1"></i>
									Data Anggota
								</a>
							</li>
							<li class="nav-item nav-konten">
								<a class="nav-link" href="index.php?p=buku">
									<i class="fas fa-book me-1"></i>
									Data Buku
								</a>
							</li>
							<li class="nav-item nav-konten">
								<a class="nav-link" href="index.php?p=kategori">
									<i class="fas fa-list-alt me-1"></i>
									Data Kategori
								</a>
							</li>
							<li class="nav-item nav-konten">
								<a class="nav-link" href="index.php?p=penulis">
									<i class="fas fa-pen me-1"></i>
									Data Penulis
								</a>
							</li>
							<li class="nav-item nav-konten mb-1">
								<a class="nav-link" href="index.php?p=penerbit">
									<i class="fas fa-pen-square me-1"></i>
									Data Penerbit
								</a>
							</li>
							<li class="nav-item nav-konten">
								<p class="bg-dark text-white text-center fs-5 fw-bold"><i class="fas fa-file-alt me-1"></i> Data Transaksi</p>
							</li>
							<li class="nav-item nav-konten">
								<a class="nav-link" href="index.php?p=transaksi-peminjaman">
									<i class="fas fa-book-open me-1"></i>
									Data Peminjaman
								</a>
							</li>
							<li class="nav-item nav-konten mb-2">
								<a class="nav-link" href="index.php?p=transaksi-pengembalian">
									<i class="fas fa-book-open me-1"></i>
									Data Pengembalian
								</a>
							<li class="nav-item nav-ex">
								<a href="logout.php" class="d-block bg-dark text-white text-start fs-6 fw-bold nav-link">
									<i class="fas fa-sign-out-alt me-1"></i>
									Log Out
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<div id="content-container" class="col-md-12 ms-sm-auto col-lg-10 px-md-4">
			<div class="container">
				<?php
				$pages_dir = 'pages';
				if (!empty($_GET['p'])) {
					$pages = scandir($pages_dir, 0);
					unset($pages[0], $pages[1]);
					$p = $_GET['p'];
					if (in_array($p . '.php', $pages)) {
						include($pages_dir . '/' . $p . '.php');
					} else {
						echo 'Halaman Tidak Ditemukan';
					}
				} else {
					include($pages_dir . '/beranda.php');
				}
				?>
			</div>
		</div>
		<script src="https://kit.fontawesome.com/0477498157.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>

	</html>
<?php
} else {
	echo "<script>
		alert('Anda Harus Login Dahulu!');
	</script>";
	header('location:login.php');
}
?>