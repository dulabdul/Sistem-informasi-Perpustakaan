<?php
$id_anggota = $_GET['id'];
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota WHERE idanggota='$id_anggota'");
$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);
if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-'))
	$foto = "user(1).png";
else
	$foto = $r_tampil_anggota['foto'];
?>

<div id="content">
	<h3 class="mt-3">Edit Data Anggota</h3>
	<form action="proses/anggota-edit-proses.php" method="post" enctype="multipart/form-data">
		<div class="table-responsvie">
			<table id="tabel-input" class="table table-borderless">
				<tr>
					<td class="label-formulir"><label class="form-label">Foto</label></td>
					<td class="isian-formulir">
						<img class="img-fluid mb-3" src="images/<?php echo $foto; ?>" width=100px height=100px>
						<input class="form-control" type="file" name="foto">
						<input class="form-control" type="hidden" name="foto_awal" value="<?php echo $r_tampil_anggota['foto']; ?>">
					</td>
				</tr>
				<tr>
					<td class="label-formulir"><label class="form-label">ID Anggota</label></td>
					<td class="isian-formulir">
						<input class="form-control" type="text" name="id_anggota" value="<?php echo $r_tampil_anggota['idanggota']; ?>" readonly="readonly">
					</td>
				</tr>
				<tr>
					<td class="label-formulir"><label class="form-label">Nama</label></td>
					<td class="isian-formulir">
						<input class="form-control" type="text" name="nama" value="<?php echo $r_tampil_anggota['nama']; ?>">
					</td>
				</tr>
				<tr>
					<td class="label-formulir"><label class="form-label">Jenis Kelamin</label></td>
					<?php
					if ($r_tampil_anggota['jeniskelamin'] == "Pria") {
						echo "<td class='isian-formulir'><input type='radio' class='form-check-input' name='jenis_kelamin' value='Pria' checked>
					<label class='form-check-label'>Pria</label>
					</td>
					</tr>
		<tr>
			<td class='label-formulir'></td>
			<td class='isian-formulir'>
			<input type='radio' name='jenis_kelamin' class='form-check-input' value='Wanita'>
			<label class='form-check-label'>Wanita</label></td>";
					} elseif ($r_tampil_anggota['jeniskelamin'] == "Wanita") {
						echo "<td class='isian-formulir'><input type='radio' class='form-check-input' name='jenis_kelamin' value='Pria'>Pria</label></td>
					</tr>
		<tr>
			<td class='label-formulir'></td>
			<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Wanita' checked>Wanita</td>";
					}
					?>

				</tr>
				<tr>
					<td class="label-formulir">Alamat</td>
					<td class="isian-formulir">
						<textarea class="form-control" rows="2" cols="40" name="alamat"><?php echo $r_tampil_anggota['alamat']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="label-formulir"></td>
					<td class="isian-formulir">
						<button class="btn btn-secondary" type="submit" name="simpan" value="Simpan" onclick="return confirm('Yakin Ingin Mengeditnya?')" id="tombol-simpan">Simpan</button>
					</td>
				</tr>
			</table>

		</div>
	</form>
</div>