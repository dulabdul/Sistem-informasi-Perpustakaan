<?php
$id_penerbit = $_GET['id'];
$q_tampil_penerbit = mysqli_query($db, "SELECT * FROM tbpenerbit WHERE idpenerbit='$id_penerbit'");
$r_tampil_penerbit = mysqli_fetch_array($q_tampil_penerbit);
$q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE idbuku='$id_buku'");
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);
$id_buku = $_GET['id'];
?>
<div id="label-page">
    <h3 class="mt-3">Edit Data Penerbit</h3>
</div>
<div id="content">
    <form action="proses/penerbit-edit-proses.php" method="post" enctype="multipart/form-data">
    <div class="table-responsive">
        <table id="table-input" class="table table-borderless">
            <tr>
                <td class="label-formulir"><label for="" class="form-label">ID Penerbit</label></td>
                <td class="isian-formulir">
                    <input type="text" name="id_penerbit" value="<?php echo $r_tampil_penerbit['idpenerbit']; ?>" readonly="readonly" class="form-control">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"><label for="" class="form-label">Nama Penerbit</label></td>
                <td class="isian-formulir">
                    <input type="text" name="nama_penerbit" value="<?php echo $r_tampil_penerbit['namapenerbit']; ?>" class="form-control">
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