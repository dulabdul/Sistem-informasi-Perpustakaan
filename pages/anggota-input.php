<div id="content" class="container">
	<h3 class="mt-3">Input Data Anggota</h3>
	<form action="proses/anggota-input-proses.php" method="post" enctype="multipart/form-data">

		<table id="tabel-input">
			<tr>
				<td class="label-formulir"><label class="form-label">
						Foto
					</label></td>
				<td class="isian-formulir">
					<input type="file" name="foto" class="form-control mb-3">
				</td>
			</tr>
			<tr>
				<td class="label-formulir"><label class="form-label">
						ID Anggota
					</label></td>
				<td class="isian-formulir"><input type="text" required name="id_anggota" class="form-control mb-3">
				</td>
			</tr>
			<tr>
				<td class="label-formulir"><label class="form-label">Nama</label></td>
				<td class="isian-formulir">
					<input type="text" required name="nama" class="form-control mb-3">
				</td>
			</tr>
			<tr>
				<td class="label-formulir"><label class="form-label">
						Jenis Kelamin
					</label></td>
				<td class="isian-formulir">
					<input type="radio" class="form-check-input ms-3" required name="jenis_kelamin" value="Pria">
					<label class="form-check-label">Pria</label>
				</td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir">
					<input type="radio" class="form-check-input ms-3" required name="jenis_kelamin" value="Wanita">
					<label class="form-check-label">Wanita</label>
				</td>
			</tr>
			<tr>
				<td class="label-formulir"><label class="form-label">
						Alamat
					</label></td>
				<td class="isian-formulir"><textarea rows="2" required cols="40" name="alamat" class="mt-3 form-control mb-3"></textarea></td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir">
					<button type="submit" onclick="return confirm('Yakin Ingin Menambahkannya?')" name="simpan" value="Simpan" class="btn btn-secondary">Simpan</button>
				</td>
			</tr>
		</table>
	</form>
</div>