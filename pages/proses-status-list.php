<?php


include './koneksi.php';

$query = "SELECT * FROM tbstatus";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_status = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_status
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_status[] = $row;
}


// ... lanjut di tampilan
