<?php
$id_penulis = $_GET['id'];
$q_tampil_penulis = mysqli_query($db, "SELECT * FROM tbpenulis WHERE idpenulis='$id_penulis'");
$r_tampil_penulis = mysqli_fetch_array($q_tampil_penulis);
?>
<div id="label-page">
    <h3 class='mt-3'>Edit Data Penulis</h3>
</div>
<div id="content">
    <form action="proses/penulis-edit-proses.php" method="post" enctype="multipart/form-data">
    <div class="table-responsive">
        <table id="table-input" class="table table-borderless">
            <tr>
                <td class="label-formulir"><label for="" class="form-label">ID Penulis</label></td>
                <td class="isian-formulir"><input type="text" name="id_penulis" value="<?php echo $r_tampil_penulis['idpenulis']; ?>" readonly="readonly" class="form-control warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir"><label for="" class="form-label">Nama Penulis</label></td>
                <td class="isian-formulir">
                    <input type="text" name="nama_penulis" value="<?php echo $r_tampil_penulis['namapengarang']; ?>" class="form-control">
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