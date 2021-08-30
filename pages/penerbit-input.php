<div id="label-page">
    <h3 class="mt-3">Tambah Data Penerbit</h3>
</div>
<div id="content">
    <form action="proses/penerbit-input-proses.php" method="post" enctype="multipart/form-data">
    <div class="table-responsive">
        <table id="table-input" class="table table-borderless">
            <tr>
                <td class="label-formulir"><label for="" class="form-label">ID Penerbit</label></td>
                <td class="isian-formulir">
                    <input type="text" name="id_penerbit" class="form-control">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"><label for="" class="form-label">Nama Penerbit</label></td>
                <td class="isian-formulir">
                    <input type="text" name="nama_penerbit" class="form-control">
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