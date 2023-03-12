<h3>UBAH BUKU</h3>
<hr>
<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <?php
                $b = $perpus->tampil_ubah_buku(@$_GET['id']);
                ?>
                <input type="hidden" class="form-control" name="id" value="<?= $_GET['id']; ?>">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul_buku" value="<?= $b->judul_buku ?>">
                <label for="">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"><?= $b->deskripsi ?></textarea>
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="penulis" value="<?= $b->penulis ?>">
                <label for="">Penerbit</label>
                <input type=" text" class="form-control" name="penerbit" value="<?= $b->penerbit ?>">
                <label for="">Cover</label>
                <input type="file" class="form-control" name="cover" value="<?= $b->cover ?>">
            </div>
            <div class=" form-group">
                <input type="submit" class="btn btn-success" name="ubah_buku" value="Ubah">
                <a href="dashboard.php?pages=buku" class="btn btn-outline-success">Kembali</a>
            </div>
        </div>
    </div>
</form>