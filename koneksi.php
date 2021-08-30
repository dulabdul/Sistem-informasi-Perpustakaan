<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "dbpus2";
$db = mysqli_connect($server, $user, $password, $nama_database);
if (!$db) {
    die("gagal terhubung ke database :" . mysqli_connect_error());
}
//silahkan isi dengan kode pada modul
