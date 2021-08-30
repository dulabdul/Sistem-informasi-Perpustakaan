<?php
include '../koneksi.php';
$id_penerbit = $_GET['id'];

mysqli_query(
    $db,
    "DELETE FROM tbpenerbit WHERE idpenerbit = '$id_penerbit'"
);
// silahkan isi dengan kode pada modul


header("location:../index.php?p=penerbit");
