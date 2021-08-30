<?php


include './koneksi.php';

$query = "SELECT * FROM tbpenulis";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_penulis = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_penulis
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_penulis[] = $row;
}


// ... lanjut di tampilan
