<a href="dashboard.php?pages=peminjaman&act=tambah" class="btn btn-primary">Tambah Peminjam</a>

<div class="row">
    <div class="col-8">

        <table class="table border shadow">
            <tr>
                <td>No</td>
                <td>No Peminjaman</td>
                <td>Judul Buku</td>
                <td>Nama Siswa</td>
                <td>Tanggal Pinjam</td>
                <td>Tanggal Kembali</td>
            </tr>
            <?php
            $no = 1;
            foreach (@$perpus->peminjaman() as $p) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $p->no_peminjaman ?></td>
                    <td><?= $p->judul_buku ?></td>
                    <td><?= $p->nama ?></td>
                    <td><?= $p->tgl_pinjam ?></td>
                    <td><?= $p->tgl_kembali ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
    </div>
</div>