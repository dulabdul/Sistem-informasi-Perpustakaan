<?php
$id_buku = $_GET['id'];
include 'proses-list-kategori.php';
include 'proses-penerbit-list.php';
include 'penulis-proses-list.php';
include 'proses-list-buku.php';
include 'proses-status-list.php';   
?>
<div id="label-page">
    <h3>Input Data Buku</h3>
</div>
<div id="content">
    <form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">
    <div class="table-responsive">
        <table id="tabel-input" class="table table-borderless">
            <tr>
                <td class="label-formulir"><label for="" class="form-label">ID Buku</label></td>
                <td class="isian-formulir">
                    <input type="text" required name="id_buku" class="form-control">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"><label for="" class="form-label">Judul Buku</label></td>
                <td class="isian-formulir"><input type="text" required name="judul_buku" class="form-control"></td>
            </tr>
            <tr>
                <td class="label-formulir"><label for="" class="form-label">Kategori</label></td>
                <td class="label-formulir">
                    <select required name="kategori" id="kategori">
                        <option value="" selected disabled='disabled'>-Pilih Kategori-</option>
                        <?php foreach ($data_kategori as $kategori) : ?>
                            <option value="<?php echo $kategori['idkategori'] ?>"><?php echo $kategori['namakategori'] ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir"><label for="" class="form-label">Penulis</label></td>
                <td class="label-formulir">
                    <select required name="pengarang" id="penulis">
                        <option value="" selected disabled='disabled'>-Pilih Penulis-</option>
                        <?php foreach ($data_penulis as $penulis) : ?>
                            <option value="<?php echo $penulis['idpenulis'] ?>"><?php echo $penulis['namapengarang'] ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir"><label for="" class="form-label">Penerbit</label></td>
                <td class="label-formulir">
                    <select required name="penerbit" id="penerbit">
                        <option value="" selected disabled='disabled'>-Pilih Penerbit-</option>
                        <?php foreach ($data_penerbit as $penerbit) : ?>
                            <option value="<?php echo $penerbit['idpenerbit'] ?>"><?php echo $penerbit['namapenerbit'] ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Status</td>
                <td class="isian-formulir">
                    <?php foreach ($data_status as $status) : ?>
                        <input type="radio" class="form-check-input ms-3" required name="status" value="<?php echo $status['idstatus'] ?>">
                        <label for=""><?php echo $status['kodestatus'] ?></label>
                    <?php endforeach ?>
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><button class="btn btn-secondary" type="submit" onclick="return confirm('Yakin Ingin Menambahkannya?')" required name="simpan" value="Simpan" class="tombol">Simpan</button>
            </td>
            </tr>
        </table>

    </div>
    </form>
</div>