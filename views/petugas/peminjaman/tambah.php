<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan_v2');
?>
<div class="row">
    <div class="col-6">
        <table class="table border shadow">
            <form action="routes/proses.php" method="post">
                <div class="form-group">
                    <tr>
                        <td><label for="">NISN</label></td>
                        <td><input type="text" name="nisn" class="form-control"></td>
                        <td><input type="submit" name="cari_nisn" value="CARI" class="form-control"></td>
                    </tr>
                </div>
                <tr>
                    <td>Siswa</td>
                    <td>:</td>
                    <td>
                        <?php
                        @$nisn = $_GET['nisn'];
                        $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'");
                        $data = mysqli_fetch_array($query);
                        ?>
                        <input type='hidden' name="nisnn" value="<?= @$data['nisn'] ?>"></input>
                        <input type='text' class="form-control" name="siswa" value="<?= @$data['nama'] ?>" disabled></input>
                    </td>

                </tr>
                <tr>
                    <td>Buku</td>
                    <td>:</td>
                    <td>
                        <select name="buku" class="form-select">
                            <?php
                            foreach ($perpus->buku() as $b) {
                            ?>
                                <option value="<?= $b->buku_id; ?>"><?= $b->judul_buku; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Tanggal Kembali</td>
                    <td>:</td>
                    <td><input type="date" name='tgl_kembali' class="form-control"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="simpan_peminjaman" value="Simpan" class="btn btn-success"></td>
                </tr>
            </form>
        </table>
    </div>
</div>