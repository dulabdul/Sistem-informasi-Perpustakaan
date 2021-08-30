<?php


include './koneksi.php';

$query = "
SELECT tbbuku.*, tbkategori.namakategori,tbpenulis.namapengarang, tbpenerbit.namapenerbit, tbstatus.kodestatus
    FROM tbbuku
    JOIN tbkategori ON tbbuku.idkategori = tbkategori.idkategori
      JOIN tbpenulis ON tbbuku.idpenulis = tbpenulis.idpenulis
        JOIN tbpenerbit ON tbbuku.idpenerbit = tbpenerbit.idpenerbit
        JOIN tbstatus ON tbbuku.idstatus = tbstatus.idstatus";

$hasil = mysqli_query($db, $query);
mysqli_connect_error();
// ... menampung semua data
$data_buku = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_buku[] = $row;
}

// ... lanjut di tampilan
