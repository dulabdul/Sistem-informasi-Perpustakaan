<?php
include '../koneksi.php';
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

if (isset($_POST['simpan'])) {

    mysqli_query(
        $db,
        "UPDATE tbkategori
        SET idkategori='$id_kategori', namakategori='$nama_kategori'
        WHERE idkategori = '$id_kategori'"
    );
}
// silahkan isi dengan kode pada modul


header("location:../index.php?p=kategori");
