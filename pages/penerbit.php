<?php
include 'proses-penerbit-list.php';
?>
<div id="label-page">
    <h3 class="mt-3">Tampil Data Penerbit</h3>
</div>
<div id="content">
    <p id="tombol-tambah-container" class="tambah mt-3">
        <a href="index.php?p=penerbit-input" class="tambah-data">Tambah Penerbit</a>
        <form class="d-flex" method="post">
		<input  class="form-control me-2" type="search" name="pencarian" placeholder="Cari Penerbit" aria-label="cari Penerbit">
		<button class="btn btn-outline-secondary tombol-submit" name="search" value="search" type="submit">Cari</button>
	</form>
    </p>
    <div class="table-responsive">
    <table id="tabel-tampil" class="table table-borderless">
        <thead class="table-dark">
        <tr>
            <th scope="col" id="label-tampil-no">No</td>
            <th scope="col">ID Penerbit</th>
            <th scope="col">Judul Penerbit</th>
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
                $sql = "SELECT * FROM tbpenerbit WHERE namapenerbit LIKE '%$pencarian%'
						OR idpenerbit LIKE '%$pencarian%'";
                $query = $sql;
                $queryJml = $sql;
            } else {
                $query = "SELECT * FROM tbpenerbit LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tbpenerbit";
                $no = $posisi * 1;
            }
        } else {
            $query = "SELECT * FROM tbpenerbit LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM tbpenerbit";
            $no = $posisi * 1;
        }

        //$sql="SELECT * FROM tbpenerbit ORDER BY idpenerbit DESC";
        $data_penerbit = mysqli_query($db, $query);
        if (mysqli_num_rows($data_penerbit) > 0) {
            while ($data_penerbit_tampil = mysqli_fetch_array($data_penerbit)) {
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data_penerbit_tampil['idpenerbit']; ?></td>
                    <td><?php echo $data_penerbit_tampil['namapenerbit']; ?></td>
                    <td>
                        <div class="d-flex">
                        <div class="tombol-opsi-container m-2">
                            <a class="btn btn-warning text-dark" href="index.php?p=penerbit-edit&id=<?php echo $data_penerbit_tampil['idpenerbit']; ?>" class="tombol"><i class="fas fa-edit me-1"> Edit</i></a>
                        </div>
                        <div class="tombol-opsi-container m-2">
                            <a class="btn btn-danger text-white" href="proses/penerbit-hapus.php?id=<?php echo $data_penerbit_tampil['idpenerbit']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol"><i class="fas fa-trash me-1"> Hapus</i></a>
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
    <div>
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
                    echo "<a class='page-link' href=\"?p=penerbit&hal=$i\">$i</a>";
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