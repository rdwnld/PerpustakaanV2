<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan_v2');
?>
<div class="row">
    <div class="col-6">
        <form action="routes/proses.php" method="post">
            <div class="row">
                <div class="form-group">
                    <div class="row">
                        <div class="col-2"><label for="">NISN</label></div>
                        <div class="col"><input type="text" name="nisn" class="form-control"></div>
                        <div class="col"><input type="submit" name="cari_nisn" value="CARI" class="form-control"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-2"><label for="">Siswa</label></div>
                        <div class="col">
                            <?php
                            @$nisn = $_GET['nisn'];
                            $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'");
                            $data = mysqli_fetch_array($query);
                            ?>
                            <input type='hidden' name="nisnn" value="<?= @$data['nisn'] ?>"></input>
                            <input type='text' class="form-control" name="siswa" value="<?= @$data['nama'] ?>" disabled></input>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-2"><label>Buku</label></div>
                        <div class="col">
                            <select name="buku" class="form-select">
                                <?php
                                foreach ($perpus->buku() as $b) {
                                ?>
                                    <option value="<?= $b->buku_id; ?>"><?= $b->judul_buku; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-2"><label>Tanggal Kembali</label></div>
                        <div class="col">
                            <input type="date" name='tgl_kembali' class="form-control" </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col">
                            <input type="submit" name="simpan_peminjaman" value="Simpan" class="btn btn-success">
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>