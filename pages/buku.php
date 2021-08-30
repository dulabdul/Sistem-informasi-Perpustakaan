<?php
include 'proses-list-buku.php';
?>

<div id="content">
    <h3 class="mt-3">Tampil Data Buku</h3>
    <p id="tombol-tambah-container" class="tambah mt-3">
        <a href="index.php?p=buku-input" class="tambah-data">Tambah Buku</a>
    <form class="d-flex form-cari" method="post">
        <input class="form-control me-2" type="search" name="pencarian" placeholder="Cari Buku" aria-label="cari Buku">
        <button class="btn btn-outline-secondary tombol-submit" name="search" value="search" type="submit">Cari</button>
    </form>
    </p>
    <div class="table-responsive">
        <table id="tabel-tampil" class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col" id="label-tampil-no">No</td>
                    <th scope="col">ID Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Status</th>
                    <th scope="col" id="label-opsi">Opsi</th>
                </tr>
            </thead>
            <?php
            $batas = 5;
            extract($_GET);
            if (empty($hal)) {
                $posisi = 0;
                $hal = 1;
                $nomor = 1;
            } else {
                $posisi = ($hal - 1) * $batas;
                $nomor = $posisi + 1;
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
                if ($pencarian != "") {
                    $sql = "SELECT * FROM tbbuku WHERE judulbuku LIKE '%$pencarian%'
                            OR judulbuku LIKE '%$pencarian%'
                            OR idkategori LIKE '%$pencarian%'
                            OR idpenulis LIKE '%$pencarian%'
                            OR idpenerbit LIKE '%$pencarian%'
                            OR idstatus LIKE '%$pencarian%'";
                    $query = $sql;
                    $queryJml = $sql;
                } else {
                    $query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM tbbuku";
                    $no = $posisi * 1;
                }
            } else {
                $query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tbbuku";
                $no = $posisi * 1;
            }

            //$sql="SELECT * FROM tbbuku ORDER BY idbuku DESC";
            foreach ($data_buku as $buku) :
            ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $buku['idbuku']; ?></td>
                    <td><?php echo $buku['judulbuku']; ?></td>
                    <td><?php echo $buku['namakategori']; ?></td>
                    <td><?php echo $buku['namapengarang']; ?></td>
                    <td><?php echo $buku['namapenerbit']; ?></td>
                    <td><?php echo $buku['kodestatus']; ?></td>
                    <td>
                        <div class="tombol-opsi-container mb-3">
                            <a class="bg-warning text-dark p-2" href="index.php?p=buku-edit&id=<?php echo $buku['idbuku']; ?>" class="tombol"><i class="fas fa-edit me-1"> Edit</i></a>
                        </div>
                        <div class="tombol-opsi-container mb-3">
                            <a class="bg-danger text-white p-2" href="proses/buku-hapus.php?id=<?php echo $buku['idbuku']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol"><i class="fas fa-trash me-1"> Hapus</i></a>
                        </div>
                    </td>
                </tr>
            <?php $nomor++;
            endforeach ?>
        </table>

    </div>
    <?php
    if (isset($_POST['pencarian'])) {
        if ($_POST['pencarian'] != '') {
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "<p class='fs-6'>Data Hasil Pencarian: <b>$jml</b></p>";
            echo "</div>";
        }
    } else { ?>
        <div style="float: left;">
            <?php
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "<p class='fs-6'>Jumlah Data : <b>$jml</b></p>";
            ?>
        </div>
        <div class="pagination justify-content-end">
            <?php
            $jml_hal = ceil($jml / $batas);
            for ($i = 1; $i <= $jml_hal; $i++) {
                if ($i != $hal) {
                    echo "<li class='page-item'>";
                    echo "<a class='page-link' href=\"?p=buku&hal=$i\">$i</a>";
                    echo '</li>';
                } else {
                    echo "<li class='page-item'>";
                    echo "<a class=\"active\">$i</a>";
                    echo "</li'>";
                }
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>