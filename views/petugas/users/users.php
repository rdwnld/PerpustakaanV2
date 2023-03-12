<a href="Dashboard.php?pages=users&act=tambah" class="btn btn-primary">Tambah Users</a>

<div class="row">
    <div class="col-8">
        <table class="table border shadow">
            <tr class="bg-primary text-light">
                <th>No</th>
                <th>Username</th>
                <th>Level</th>
                <th>Opsi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($perpus->list_users() as $u) {
            ?>

                <tr>
                    <td><?= $no ?></td>
                    <td><?= $u->username ?></td>
                    <td><?= $u->level ?></td>
                    <td>
                        <a href="dashboard.php?pages=users&act=ubah&id=<?= $u->user_id ?>" class="btn btn-primary">Ubah</a>
                        <a href="routes/proses.php?act=hapus_user&id=<?= $u->user_id ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>

                </tr>

            <?php
                $no++;
            }
            ?>
        </table>
    </div>
</div>