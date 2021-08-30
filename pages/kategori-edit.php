<?php
$id_kategori = $_GET['id'];
$q_tampil_kategori = mysqli_query($db, "SELECT * FROM tbkategori WHERE idkategori='$id_kategori'");
$r_tampil_kategori = mysqli_fetch_array($q_tampil_kategori);
?>
<div id="label-page">
    <h3 class="mt-3">Edit Data Kategori</h3>
</div>
<div id="content">
    <form action="proses/kategori-edit-proses.php" method="post" enctype="multipart/form-data">
    <div class="table-responsive">
        <table id="table-input" class="table table-borderless">
            <tr>
                <td class="label-formulir"><label for="" class="form-label">ID Kategori</label></td>
                <td class="isian-formulir">
                    <input class="form-control" type="text" name="id_kategori" value="<?php echo $r_tampil_kategori['idkategori']; ?>" readonly="readonly">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"><label for="" class="form-label">Nama Kategori</label></td>
                <td class="isian-formulir"><input type="text" name="nama_kategori" value="<?php echo $r_tampil_kategori['namakategori']; ?>" class="form-control">
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