<div id="label-page">
    <h3>Tambah Data Kategori</h3>
</div>
<div id="content">
    <form action="proses/kategori-input-proses.php" method="post" enctype="multipart/form-data">
    <div class="table-respnsive">
        <table id="table-input" class="table table-borderless">
            <tr>
                <td class="label-formulir"><label for="" class="form-label">ID Kategori</label></td>
                <td class="isian-formulir">
                    <input type="text" name="id_kategori" class="form-control">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"><label for="" class="form-label">Nama Kategori</label></td>
                <td class="isian-formulir"><input type="text" name="nama_kategori" class="form-control">
            </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir">
                    <button class="btn btn-secondary" type="submit" name="simpan" value="Simpan" onclick="return confirm('Yakin Ingin Menambahkannya?')" id="tombol-simpan">Simpan</button>
                </td>
            </tr>
        </table>
    </div>
    </form>
</div>