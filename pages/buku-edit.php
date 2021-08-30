<?php
include 'proses-list-kategori.php';
include 'proses-penerbit-list.php';
include 'penulis-proses-list.php';
include 'proses-status-list.php';
$id_buku = $_GET['id'];
$query = "SELECT * FROM tbbuku WHERE idbuku= '$id_buku'";
$hasil = mysqli_query($db, $query);
$data_buku = mysqli_fetch_assoc($hasil);
?>
<div id="label-page">
    <h3 class="mt-3">Edit Data Buku</h3>
</div>
<div id="content">
    <form action="proses/buku-edit-proses.php" method="post" enctype="multipart/form-data">
        <div class="table-responsive">
            <table id="table-input" class="table table-borderless">
                <tr>
                    <td class="label-formulir"><label for="" class="form-label">ID Buku</label></td>
                    <td class="isian-formulir">
                        <input class="form-control" type="text" name="id_buku" value="<?php echo $data_buku['idbuku'] ?>" readonly="readonly">
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir"><label for="" class="form-label">Judul Buku</label></td>
                    <td class="isian-formulir">
                        <input class="form-control" type="text" name="judul_buku" value="<?php echo $data_buku['judulbuku']; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir"><label for="" class="form-label">Kategori</label></td>
                    <td class="label-formulir">
                        <select required name="kategori" id="kategori">
                            <?php foreach ($data_kategori as $kategori) : ?>
                                <?php
                                if ($data_buku['idkategori'] == $kategori['idkategori']) {
                                    $selected = "selected";
                                } else {
                                    $selected = null;
                                }
                                ?>
                                <option value="<?php echo $kategori['idkategori'] ?>" <?php echo $selected ?>><?php echo $kategori['namakategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir"><label for="" class="form-label">Penulis</label></td>
                    <td class="label-formulir">
                        <select required name="penulis" id="penulis">
                            <?php foreach ($data_penulis as $penulis) : ?>
                                <?php
                                if ($data_buku['idpenulis'] == $penulis['idpenulis']) {
                                    $selected = "selected";
                                } else {
                                    $selected = null;
                                }
                                ?>
                                <option value="<?php echo $penulis['idpenulis'] ?>" <?php echo $selected ?>><?php echo $penulis['namapengarang'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir"><label for="" class="form-label">Penerbit</label></td>
                    <td class="label-formulir">
                        <select required name="penerbit" id="penerbit">
                            <?php foreach ($data_penerbit as $penerbit) : ?>
                                <?php
                                if ($data_buku['idpenerbit'] == $penulis['idpenerbit']) {
                                    $selected = "selected";
                                } else {
                                    $selected = null;
                                }
                                ?>
                                <option value="<?php echo $penerbit['idpenerbit'] ?>" <?php echo $selected ?>><?php echo $penerbit['namapenerbit'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">Status</td>
                    <td class="isian-formulir">
                        <select required name="status" id="status">
                            <?php foreach ($data_status as $status) : ?>
                                <?php
                                if ($data_buku['idstatus'] == $status['idstatus']) {
                                    $selected = "selected";
                                } else {
                                    $selected = null;
                                }
                                ?>
                                <option value="<?php echo $status['idstatus'] ?>" <?php echo $selected ?>><?php echo $status['kodestatus'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir"></td>
                    <td class="isian-formulir">
                        <button class="btn btn-secondary" type="submit" name="simpan" value="Simpan" onclick="return confirm('Yakin Ingin Mengeditnya?')" id="tombol-simpan">Simpan</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>