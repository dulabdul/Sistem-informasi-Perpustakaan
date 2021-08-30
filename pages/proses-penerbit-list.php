<?php


include './koneksi.php';

$query = "SELECT * FROM tbpenerbit";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_penerbit = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_penerbit
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_penerbit[] = $row;
}


// ... lanjut di tampilan
