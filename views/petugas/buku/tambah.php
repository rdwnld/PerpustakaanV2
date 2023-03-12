<h3>TAMBAH BUKU</h3>
<hr>

<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul_buku">
                <label for="">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"></textarea>
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="penulis">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="penerbit">
                <label for="">Cover</label>
                <input type="file" class="form-control" name="cover">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="simpan_buku" value="Tambah">
                <a href="dashboard.php?pages=buku" class="btn btn-outline-success">Kembali</a>
            </div>
        </div>
    </div>
</form>