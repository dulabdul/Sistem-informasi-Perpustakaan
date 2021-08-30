<?php
include '../koneksi.php';

$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$kategori = $_POST['kategori'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$status = $_POST['status'];

if (isset($_POST['simpan'])) {

    mysqli_query(
        $db,
        "UPDATE tbbuku
        SET 
         judulbuku='$judul_buku',
          idkategori='$kategori',
           idpenulis='$penulis',
           idpenerbit='$penerbit',
           idstatus='$status'
        WHERE idbuku = '$id_buku'"
    );
}
// silahkan isi dengan kode pada modul


header("location:../index.php?p=buku");
