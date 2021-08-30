<div id="content" class="container">
	<h3 class="mt-3">Tampil Data Anggota</h3>
	<p id="tombol-tambah-container" class="tambah"><a href="index.php?p=anggota-input" class="tambah-data">Tambah Anggota</a>
		<a target="_blank" href="pages/cetak.php"><img src="print.png" height="50px" height="50px"></a>

	<form class="d-flex" method="post">
		<input class="form-control me-2" type="search" name="pencarian" placeholder="Cari Anggota" aria-label="cari anggota">
		<button class="btn btn-outline-secondary tombol-submit" name="search" value="search" type="submit">Cari</button>
	</form>

	</p>
	<div class="table-responsive">
		<table id="tabel-tampil" class="table table-striped">
			<thead class="table-dark">
				<tr>
					<th scope="col" id="label-tampil-no">No</td>
					<th scope="col">ID Anggota</th>
					<th scope="col">Nama</th>
					<th scope="col">Foto</th>
					<th scope="col">Jenis Kelamin</th>
					<th scope="col">Alamat</th>
					<th scope="col" id="label-opsi">Opsi</th>
				</tr>
			</thead>
			<?php
			$batas = 5;
			extract($_GET);
			if (empty($hal)) {
				$posisi = 0;
				$hal = 1;
				$nomor = 1;
			} else {
				$posisi = ($hal - 1) * $batas;
				$nomor = $posisi + 1;
			}
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
				if ($pencarian != "") {
					$sql = "SELECT * FROM tbanggota WHERE nama LIKE '%$pencarian%'
							OR idanggota LIKE '%$pencarian%'
							OR jeniskelamin LIKE '%$pencarian%'
							OR alamat LIKE '%$pencarian%'";

					$query = $sql;
					$queryJml = $sql;
				} else {
					$query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
					$queryJml = "SELECT * FROM tbanggota";
					$no = $posisi * 1;
				}
			} else {
				$query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbanggota";
				$no = $posisi * 1;
			}

			//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
			$q_tampil_anggota = mysqli_query($db, $query);
			if (mysqli_num_rows($q_tampil_anggota) > 0) {
				while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
					if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-'))
						$foto = "user(1).png";
					else
						$foto = $r_tampil_anggota['foto'];
			?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $r_tampil_anggota['idanggota']; ?></td>
						<td><?php echo $r_tampil_anggota['nama']; ?></td>
						<td><img class="img-user" src="images/<?php echo $foto; ?>"></td>
						<td><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
						<td><?php echo $r_tampil_anggota['alamat']; ?></td>
						<td>
							<div class="tombol-opsi-anggota mb-3">
								<a class="bg-primary text-white p-2" target="_blank" href="pages/cetak_kartu.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="tombol"><i class="fas fa-print me-1"></i> Cetak Kartu</a>
							</div>
							<div class="tombol-opsi-anggota mb-3">
								<a class="bg-warning text-dark p-2" href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="tombol"><i class="fas fa-edit me-1"></i> Edit</a>
							</div>
							<div class="tombol-opsi-anggota mb-3">
								<a class="bg-danger text-white p-2" href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol"><i class="fas fa-trash me-1"></i> Hapus</a>
							</div>
						</td>
					</tr>
			<?php $nomor++;
				}
			} else {
				echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
			} ?>
		</table>
	</div>
	<?php
	if (isset($_POST['pencarian'])) {
		if ($_POST['pencarian'] != '') {
			echo "<div style=\"float:left;\">";
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "<p class='fs-6'>Data Hasil Pencarian: <b>$jml</b></p>";
			echo "</div>";
		}
	} else { ?>
		<div style="float: left;">
			<?php
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "<p class='fs-6'>Jumlah Data : <b>$jml</b></p>";
			?>
		</div>
		<div class="pagination justify-content-end">
			<?php
			$jml_hal = ceil($jml / $batas);
			for ($i = 1; $i <= $jml_hal; $i++) {
				if ($i != $hal) {
					echo "<li class='page-item'>";
					echo "<a class='page-link' href=\"?p=anggota&hal=$i\">$i</a>";
					echo "</li>";
				} else {
					echo "<li class='page-item'>";
					echo "<a class=\"active\">$i</a>";
					echo "</li>";
				}
			}
			?>
		</div>
	<?php
	}
	?>
</div>