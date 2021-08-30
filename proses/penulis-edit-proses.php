<?php
include '../koneksi.php';
$id_penulis = $_POST['id_penulis'];
$nama_penulis = $_POST['nama_penulis'];

if (isset($_POST['simpan'])) {

    mysqli_query(
        $db,
        "UPDATE tbpenulis
        SET idpenulis='$id_penulis', namapengarang='$nama_penulis'
        WHERE idpenulis = '$id_penulis'"
    );
}
// silahkan isi dengan kode pada modul


header("location:../index.php?p=penulis");
