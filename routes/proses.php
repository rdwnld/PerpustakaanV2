<?php
include '../controllers/db.php';

// PROSES LOGIN
if (@$_POST['login']) {

    $uname = $_POST['username'];
    $pw = $_POST['password'];


    if ($uname == null || $pw == null) {
        session_start();
        $_SESSION['warning'] = "Data Kosong";
        header("location:../login.php");
    } else {

        $perpus->proses_login($uname, $pw);
    }
}
// PROSES LOGIN END


// PROSES LOGOUT
if (@$_GET['aksi'] == 'logout') {
    $perpus->logout();
}
// PROSES LOGOUT END




// PROSES USER

// PROSES SIMPAN USER
if (@$_POST['simpan_user']) {
    $uname = $_POST['username'];
    $pw = $_POST['password'];

    $perpus->simpan_user($uname, $pw);
}
// PROSES SIMPAN USER END

// PROSES UBAH USER
if (@$_POST['ubah_user']) {
    $id = $_POST['id'];
    $uname = $_POST['username'];
    $pw = $_POST['password'];

    $perpus->ubah_user($uname, $pw, $id);
}
// PROSES UBAH USER END

// PROSES HAPUS USER
if (@$_GET['act'] == 'hapus_user') {
    $id = $_GET['id'];

    $perpus->hapus_user($id);
}
// PROSES HAPUS USER END

// PROSES USER END



// PROSES SISWA

// PROSES SIMPAN SISWA
if (@$_POST['simpan_siswa']) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $foto = $_FILES['foto']['name'];

    $perpus->simpan_siswa($nisn, $nama, $kelas, $foto);
}
// PROSES SIMPAN SISWA END

// PROSES UBAH SISWA
if (@$_POST['ubah_siswa']) {
    $id = $_POST['id'];

    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $foto = $_FILES['foto']['name'];

    $perpus->ubah_siswa($nisn, $nama, $kelas, $foto, $id);
}
// PROSES UBAH SISWA END

// PROSES HAPUS SISWA
if (@$_GET['act'] == 'hapus_siswa') {
    $id = $_GET['id'];

    $perpus->hapus_siswa($id);
}
// PROSES HAPUS SISWA END
// PROSES SISWA END



// PROSES buku

// PROSES SIMPAN buku
if (@$_POST['simpan_buku']) {
    $jb = $_POST['judul_buku'];
    $desk = $_POST['deskripsi'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $cover = $_FILES['cover']['name'];

    $perpus->simpan_buku($jb, $desk, $penulis, $penerbit, $cover);
}
// PROSES SIMPAN buku END

// PROSES UBAH buku
if (@$_POST['ubah_buku']) {
    $id = $_POST['id'];

    $jb = $_POST['judul_buku'];
    $desk = $_POST['deskripsi'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $cover = $_FILES['cover']['name'];

    $perpus->ubah_buku($jb, $desk, $penulis, $penerbit, $cover, $id);
}
// PROSES UBAH buku END

// PROSES HAPUS buku
if (@$_GET['act'] == 'hapus_buku') {
    $id = $_GET['id'];

    $perpus->hapus_buku($id);
}
// PROSES HAPUS buku END
// PROSES buku END


// PROSES PEMINJAMAN

if (@$_POST['simpan_peminjaman']) {
    $no_peminjaman = $_POST['nisnn'] . "-" . date('Y-m-d');
    $siswa = $_POST['nisnn'];
    $buku = $_POST['buku'];
    $tgl_pinjam = date('Y-m-d');
    $tgl_kembali = $_POST['tgl_kembali'];

    $perpus->simpan_peminjaman($no_peminjaman, $siswa, $buku, $tgl_pinjam, $tgl_kembali);
}

if (@$_POST['cari_nisn']) {
    $nisn = $_POST['nisn'];
}
$perpus->cari_nisn($nisn);

// PROSES PEMINJAMAN END

session_start();
$nisn = $_SESSION['nis'];
echo $nisn;
