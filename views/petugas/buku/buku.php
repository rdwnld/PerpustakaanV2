<a href="Dashboard.php?pages=buku&act=tambah" class="btn btn-primary">Tambah Buku</a>

<div class="row">
    <div class="col-8">
        <table class="table border shadow">
            <tr class="bg-primary text-light">
                <th>No</th>
                <th>Judul Buku</th>
                <th>Deskripsi</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Cover</th>
                <th>Opsi</th>
            </tr>

            <?php
            $no = 1;
            foreach ($perpus->list_buku() as $b) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $b->judul_buku ?></td>
                    <td><?= $b->deskripsi ?></td>
                    <td><?= $b->penulis ?></td>
                    <td><?= $b->penerbit ?></td>
                    <td> <img src='assets/images/<?= $b->cover ?>' width='100'></td>
                    <td>
                        <a href="dashboard.php?pages=buku&act=ubah&id=<?= $b->buku_id ?>" class="btn btn-primary">Ubah</a>
                        <a href="routes/proses.php?act=hapus_buku&id=<?= $b->buku_id ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>

                </tr>

            <?php
                $no++;
            }
            ?>
        </table>
    </div>
</div>