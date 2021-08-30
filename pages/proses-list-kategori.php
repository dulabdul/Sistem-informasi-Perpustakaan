<?php


include './koneksi.php';

$query = "SELECT * FROM tbkategori";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_kategori = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_kategori
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kategori[] = $row;
}


// ... lanjut di tampilan
