<?php
include '../koneksi.php';
$id_penulis = $_POST['id_penulis'];
$nama_penulis = $_POST['nama_penulis'];


$sql =
    "INSERT INTO tbpenulis
				VALUES('$id_penulis', '$nama_penulis')";
$query = mysqli_query($db, $sql);
// silahkan isi dengan kode pada modul


header("location:../index.php?p=penulis");
