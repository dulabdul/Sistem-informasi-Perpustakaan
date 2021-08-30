<?php
include '../koneksi.php';
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];


$sql =
    "INSERT INTO tbkategori(idkategori, namakategori)
				VALUES('$id_kategori', '$nama_kategori')";
$query = mysqli_query($db, $sql);
// silahkan isi dengan kode pada modul


header("location:../index.php?p=kategori");
