<h3>UBAH SISWA</h3>
<hr>
<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <?php
                $u = $perpus->tampil_ubah_siswa(@$_GET['id']);
                ?>
                <input type="hidden" class="form-control" name="id" value="<?= $_GET['id']; ?>">
                <label for="">NISN</label>
                <input type="text" class="form-control" name="nisn" value="<?= $u->nisn ?>">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $u->nama ?>">
                <label for="">Kelas</label>
                <select type=" text" class="form-select" name="kelas" value="<?= $u->kelas ?>">
                    <option value="" hidden></option>
                    <option value=" X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                <label for="">Foto</label>
                <input type="file" class="form-control" name="foto" value="<?= $u->foto ?>">
            </div>
            <div class=" form-group">
                <input type="submit" class="btn btn-success" name="ubah_siswa" value="Ubah">
                <a href="dashboard.php?pages=siswa" class="btn btn-outline-success">Kembali</a>
            </div>
        </div>
    </div>
</form>