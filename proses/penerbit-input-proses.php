<?php
include '../koneksi.php';
$id_penerbit = $_POST['id_penerbit'];
$nama_penerbit = $_POST['nama_penerbit'];


$sql =
    "INSERT INTO tbpenerbit
				VALUES('$id_penerbit', '$nama_penerbit')";
$query = mysqli_query($db, $sql);
// silahkan isi dengan kode pada modul


header("location:../index.php?p=penerbit");
