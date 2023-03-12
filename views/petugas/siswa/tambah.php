<h3>TAMBAH SISWA</h3>
<hr>

<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">NISN</label>
                <input type="text" class="form-control" name="nisn">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama">
                <label for="">Kelas</label>
                <select type="text" class="form-select" name="kelas">
                    <option value="" hidden></option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                <label for="">Foto</label>
                <input type="file" class="form-control" name="foto">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="simpan_siswa" value="Tambah">
                <a href="dashboard.php?pages=siswa" class="btn btn-outline-success">Kembali</a>
            </div>
        </div>
    </div>
</form>