<a href="Dashboard.php?pages=siswa&act=tambah" class="btn btn-primary">Tambah Siswa</a>

<div class="row">
    <div class="col-8">
        <table class="table border shadow">
            <tr class="bg-primary text-light">
                <th>No</th>
                <th>NISN</th>
                <th>NAMA</th>
                <th>KELAS</th>
                <th>FOTO</th>
                <th>Opsi</th>
            </tr>

            <?php
            $no = 1;
            foreach ($perpus->list_siswa() as $u) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $u->nisn ?></td>
                    <td><?= $u->nama ?></td>
                    <td><?= $u->kelas ?></td>
                    <td> <img src='assets/images/<?= $u->foto ?>' width='100'></td>
                    <td>
                        <a href="dashboard.php?pages=siswa&act=ubah&id=<?= $u->siswa_id ?>" class="btn btn-primary">Ubah</a>
                        <a href="routes/proses.php?act=hapus_siswa&id=<?= $u->siswa_id ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>

                </tr>

            <?php
                $no++;
            }
            ?>
        </table>
    </div>
</div>