<?php

include '../koneksi.php';

$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$kategori = $_POST['kategori'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$status = $_POST['status'];

$sql = "INSERT INTO tbbuku (idbuku, judulbuku, idkategori, idpenulis, idpenerbit,idstatus) 
    VALUES ('$id_buku', '$judul_buku', '$kategori', '$pengarang', '$penerbit','$status')";

$query = mysqli_query($db, $sql);

header("location:../index.php?p=buku");
