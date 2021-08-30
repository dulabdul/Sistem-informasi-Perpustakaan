<?php
include '../koneksi.php';
$id_penulis = $_GET['id'];

mysqli_query(
    $db,
    "DELETE FROM tbpenulis WHERE idpenulis = '$id_penulis'"
);
// silahkan isi dengan kode pada modul


header("location:../index.php?p=penulis");
