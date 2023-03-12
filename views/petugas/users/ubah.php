<h3>UBAH USERS</h3>
<hr>
<form action="routes/proses.php" method="post">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <?php
                $u = $perpus->tampil_ubah(@$_GET['id']);
                ?>
                <label for="">Username</label>
                <input type="hidden" class="form-control" name="id" value="<?= $_GET['id']; ?>">
                <input type="text" class="form-control" name="username" value="<?= $u->username ?>">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class=" form-group">
                <input type="submit" class="btn btn-success" name="ubah_user" value="Ubah">
                <a href="dashboard.php?pages=users" class="btn btn-outline-success">Kembali</a>
            </div>
        </div>
    </div>
</form>