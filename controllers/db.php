<?php

class perpustakaan
{

    var $koneksi;


    public function __construct()
    {
        $this->koneksi = new mysqli("localhost", "root", "", "perpustakaan_v2");

        if (mysqli_connect_errno()) {
            echo "Koneksi Gagal" . mysqli_connect_error();
        }
    }


    public function proses_login($uname, $pw)
    {

        $query = $this->koneksi->query("SELECT * FROM users WHERE username='$uname' AND password=md5('$pw')");
        $data = $query->fetch_object();
        $count = $query->num_rows;

        if ($count > 0) {
            session_start();
            $_SESSION['login'] = 1;
            $_SESSION['username'] = $data->username;
            $_SESSION['level'] = $data->level;
            $_SESSION['nis'] = $data->nis;

            header("location:../dashboard.php");
        } else {
            session_start();
            $_SESSION['warning'] = "Anda Gagal Login, Periksa lagi";
            header("location:../login.php");
        }
    }


    public function logout()
    {
        session_start();
        session_destroy();

        // ALERT
        session_start();
        $_SESSION['success'] = "Anda Berhasil Logout";

        header("location:../login.php");
    }

    // DATA USERS
    public function list_users()
    {

        $query = $this->koneksi->query("SELECT * FROM users");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function simpan_user($uname, $pw)
    {
        if ($uname == '' || $pw == '') {
            session_start();
            $_SESSION['warning'] = "Username atau Password belum diisi, isi terlebih dahulu";
            header('location:../dashboard.php?pages=users&act=tambah');
        } else {
            $this->koneksi->query("INSERT INTO users VALUES(null,'$uname',md5('$pw'),'Petugas',0)");
            session_start();
            $_SESSION['success'] = "User berhasil di tambah";
            header('location:../dashboard.php?pages=users');
        }
    }

    public function ubah_user($uname, $pw, $id)
    {
        if ($pw == '') {
            $query = $this->koneksi->query("UPDATE users SET username='$uname' WHERE user_id=$id");
        } else {
            $query = $this->koneksi->query("UPDATE users SET username='$uname', password=md5('$pw') WHERE user_id=$id");
        }
        if ($query) {
            session_start();
            $_SESSION['success'] = "User berhasil di ubah";
            header('location:../dashboard.php?pages=users');
        }
    }

    public function tampil_ubah($id)
    {
        $query = $this->koneksi->query("SELECT * FROM users where user_id=$id");
        $data = $query->fetch_object();
        return $data;
    }

    public function hapus_user($id)
    {
        $query = $this->koneksi->query("DELETE FROM users where user_id=$id");

        if ($query) {
            session_start();
            $_SESSION['success'] = "User berhasil di hapus";
            header('location:../dashboard.php?pages=users');
        }
    }
    public function jumlah_user()
    {
        $query = $this->koneksi->query("SELECT * FROM users");
        return $query->num_rows;
    }
    // DATA USERS END



    // DATA SISWA

    public function list_siswa()
    {

        $query = $this->koneksi->query("SELECT * FROM siswa");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function simpan_siswa($nisn, $nama, $kelas, $foto)
    {
        if ($nisn == '' || $nama == '' || $kelas == '' || $foto == '') {

            session_start();
            $_SESSION['warning'] = "Data belum diisi, isi terlebih dahulu";
            header('location:../dashboard.php?pages=siswa&act=tambah');
        } else {
            $ukuran = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];

            if ($ukuran > 0 || $error == 0) {
                $move = move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $foto);
                if ($move) {
                    echo "File '$foto' dengan ukuran $ukuran sudah terupload";
                } else {
                    echo "Terjadi kesalahan mengupload";
                }
            } else {
                echo "File Gagal Diupload" . $error;
            }

            $query = $this->koneksi->query("INSERT INTO siswa VALUES(null,'$nisn','$nama','$kelas','$foto')");

            if ($query) {
                $query = $this->koneksi->query("INSERT INTO users VALUES(null,'$nisn',md5('$nisn'),'Siswa','$nisn')");
                session_start();
                $_SESSION['success'] = "Siswa berhasil di tambah";
                header('location:../dashboard.php?pages=siswa');
            }
        }
    }
    public function ubah_siswa($nisn, $nama, $kelas, $foto, $id)
    {
        if ($kelas == '' || $foto == '') {
            $query = $this->koneksi->query("UPDATE siswa SET nisn='$nisn',nama='$nama' WHERE siswa_id=$id");
        } else {
            $move = move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $foto);
            $query = $this->koneksi->query("UPDATE siswa SET nisn='$nisn',nama='$nama',kelas='$kelas',foto='$foto' WHERE siswa_id=$id");
        }

        if ($query) {
            session_start();
            $_SESSION['success'] = "Siswa berhasil di ubah";
            header('location:../dashboard.php?pages=siswa');
        }
    }

    public function tampil_ubah_siswa($id)
    {
        $query = $this->koneksi->query("SELECT * FROM siswa where siswa_id=$id");
        $data = $query->fetch_object();
        return $data;
    }

    public function hapus_siswa($id)
    {
        $query = $this->koneksi->query("DELETE FROM siswa where siswa_id=$id");

        if ($query) {
            session_start();
            $_SESSION['success'] = "User berhasil di hapus";
            header('location:../dashboard.php?pages=siswa');
        }
    }
    public function jumlah_siswa()
    {
        $query = $this->koneksi->query("SELECT * FROM siswa");
        return $query->num_rows;
    }

    // DATA SISWA END

    // DATA BUKU
    public function list_buku()
    {

        $query = $this->koneksi->query("SELECT * FROM buku");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function simpan_buku($jb, $desk, $penulis, $penerbit, $cover)
    {
        if ($jb == '' || $desk == '' || $penulis == '' || $penerbit == '' || $cover == '') {

            session_start();
            $_SESSION['warning'] = "Data belum diisi, isi terlebih dahulu";
            header('location:../dashboard.php?pages=buku&act=tambah');
        } else {
            $ukuran = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];

            if ($ukuran > 0 || $error == 0) {
                $move = move_uploaded_file($_FILES['cover']['tmp_name'], '../assets/images/' . $cover);
                if ($move) {
                    echo "File '$cover' dengan ukuran $ukuran sudah terupload";
                } else {
                    echo "Terjadi kesalahan mengupload";
                }
            } else {
                echo "File Gagal Diupload" . $error;
            }
            $query = $this->koneksi->query("INSERT INTO buku VALUES(null,'$jb','$desk','$penulis','$penerbit','$cover')");

            if ($query) {
                session_start();
                $_SESSION['success'] = "Buku berhasil di tambah";
                header('location:../dashboard.php?pages=buku');
            }
        }
    }
    public function ubah_buku($jb, $desk, $penulis, $penerbit, $cover, $id)
    {

        if ($jb == '' || $desk == '' || $penulis == '' || $penerbit == '' || $cover == '') {
            session_start();
            $_SESSION['success'] = "buku berhasil di ubah";
            header('location:../dashboard.php?pages=buku');
        } else {
            $this->koneksi->query("UPDATE buku SET judul_buku='$jb',deskripsi='$desk',penulis='$penulis',penerbit='$penerbit',cover='$cover' WHERE buku_id=$id");
            session_start();
            $_SESSION['success'] = "buku berhasil di ubah";
            header('location:../dashboard.php?pages=buku');
        }
    }

    public function tampil_ubah_buku($id)
    {
        $query = $this->koneksi->query("SELECT * FROM buku where buku_id=$id");
        $data = $query->fetch_object();
        return $data;
    }

    public function hapus_buku($id)
    {
        $query = $this->koneksi->query("DELETE FROM buku where buku_id=$id");

        if ($query) {
            session_start();
            $_SESSION['success'] = "User berhasil di hapus";
            header('location:../dashboard.php?pages=buku');
        }
    }
    public function jumlah_buku()
    {
        $query = $this->koneksi->query("SELECT * FROM buku");
        return $query->num_rows;
    }
    // DATA BUKU END


    // DATA PEMINJAMAN

    public function peminjaman()
    {
        $query = $this->koneksi->query("SELECT * FROM peminjaman
        inner join buku on buku.buku_id = peminjaman.buku_id
        inner join siswa on siswa.nisn = peminjaman.nisn
        ");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function simpan_peminjaman($no_peminjaman, $siswa, $buku, $tgl_pinjam, $tgl_kembali)
    {
        $this->koneksi->query("INSERT INTO peminjaman VALUES
        ('$no_peminjaman','$buku','$siswa','$tgl_pinjam','$tgl_kembali')");

        if ($no_peminjaman == '' || $siswa == '' || $buku == '' || $tgl_pinjam == '' || $tgl_kembali == '') {
            session_start();
            $_SESSION['warning'] = "Data belum diisi, isi terlebih dahulu";
            header('location:../dashboard.php?pages=peminjaman&act=tambah');
        } else {
            session_start();
            $_SESSION['success'] = "User berhasil di tambah";
            header('location:../dashboard.php?pages=peminjaman');
        }
    }

    public function buku()
    {
        $query = $this->koneksi->query("SELECT * FROM buku");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function cari_nisn($nisn)
    {
        if ($nisn) {
            header("location:../dashboard.php?pages=peminjaman&act=tambah&nisn=$nisn");
        }
    }

    public function jumlah_peminjam()
    {
        $query = $this->koneksi->query("SELECT * FROM peminjaman");
        return $query->num_rows;
    }

    // DATA PEMINJAMAN END



};




$perpus = new perpustakaan();
