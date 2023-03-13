<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan_v2');
?>

<table class="table border shadow">
    <tr class="bg-primary text-white">
        <td>NO</td>
        <td>Judul Buku</td>
        <td>Tgl Pinjam</td>
        <td>Tgl Kembali</td>
    </tr>
    <?php
    @session_start();
    $no = 1;
    $nisn = $_SESSION['nis'];
    echo $nisn;

    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman
    inner join buku on buku.buku_id = peminjaman.buku_id 
    WHERE nisn='$nisn'");

    while ($ps = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $ps['judul_buku']; ?></td>
            <td><?= $ps['tgl_pinjam']; ?></td>
            <td><?= $ps['tgl_kembali']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>