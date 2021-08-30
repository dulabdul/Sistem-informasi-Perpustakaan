<?php
include 'penulis-proses-list.php';
?>
<div id="label-page">
    <h3 class="mt-3">Tampil Data Penulis</h3>
</div>
<div id="content">
    <p id="tombol-tambah-container" class="tambah mt-3">
        <a href="index.php?p=penulis-input" class="tambah-data">Tambah Penulis</a>
        <form class="d-flex" method="post">
        <input class="form-control me-2" type="search" name="pencarian" placeholder="Cari Kategori" aria-label="cari Kategori">
        <button class="btn btn-outline-secondary tombol-submit" name="search" value="search" type="submit">Cari</button>
    </form>
    </p>
    <div class="table-responsive">
    <table id="tabel-tampil" class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col" id="label-tampil-no">No</td>
                <th scope="col">ID Penulis</th>
                <th scope="col">Judul Penulis</th>
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
                $sql = "SELECT * FROM tbpenulis WHERE namapengarang LIKE '%$pencarian%'
						OR idpenulis LIKE '%$pencarian%'";
                $query = $sql;
                $queryJml = $sql;
            } else {
                $query = "SELECT * FROM tbpenulis LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tbpenulis";
                $no = $posisi * 1;
            }
        } else {
            $query = "SELECT * FROM tbpenulis LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM tbpenulis";
            $no = $posisi * 1;
        }

        //$sql="SELECT * FROM tbpenulis ORDER BY idpenulis DESC";
        $data_penulis = mysqli_query($db, $query);
        if (mysqli_num_rows($data_penulis) > 0) {
            while ($data_penulis_tampil = mysqli_fetch_array($data_penulis)) {
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data_penulis_tampil['idpenulis']; ?></td>
                    <td><?php echo $data_penulis_tampil['namapengarang']; ?></td>
                    <td>
                        <div class="d-flex">
                            <div class="tombol-opsi-container m-2">
                                <a  class="btn btn-warning text-dark" href="index.php?p=penulis-edit&id=<?php echo $data_penulis_tampil['idpenulis']; ?>" class="tombol"><i class="fas fa-edit me-1"> Edit</i></a>
                            </div>
                            <div class="tombol-opsi-container m-2">
                                <a class="btn btn-danger" href="proses/penulis-hapus.php?id=<?php echo $data_penulis_tampil['idpenulis']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol"><i class="fas fa-trash me-1"> Hapus</i></a>
                            </div>
                        </div>
                    </td>
                </tr>
        <?php $nomor++;
            }
        } else {
            echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
        } ?>

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
                    echo "<a class='page-link' href=\"?p=penulis&hal=$i\">$i</a>";
                    echo "</li>";
                } else {
                    echo "<li class='page-item'>";
                    echo "<a class=\"active\">$i</a>";
                    echo "</li>";
                }
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>