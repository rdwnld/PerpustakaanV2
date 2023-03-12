<h3>TAMBAH USERS</h3>
<hr>

<form action="routes/proses.php" method="post">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="simpan_user" value="Tambah">
                <a href="dashboard.php?pages=users" class="btn btn-outline-success">Kembali</a>
            </div>
        </div>
    </div>
</form>