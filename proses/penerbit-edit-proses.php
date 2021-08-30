<?php
include '../koneksi.php';
$id_penerbit = $_POST['id_penerbit'];
$nama_penerbit = $_POST['nama_penerbit'];

if (isset($_POST['simpan'])) {

    mysqli_query(
        $db,
        "UPDATE tbpenerbit
        SET idpenerbit='$id_penerbit', namapenerbit='$nama_penerbit'
        WHERE idpenerbit = '$id_penerbit'"
    );
}
// silahkan isi dengan kode pada modul


header("location:../index.php?p=penerbit");
