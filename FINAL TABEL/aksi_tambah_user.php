<?php
// Aktifkan laporan error PHP untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Matikan exception otomatis MySQLi agar tidak memicu HTTP 500 di PHP 8+
mysqli_report(MYSQLI_REPORT_OFF);

include 'koneksi.php';

// Ambil data dari form
$uss  = trim($_POST['username'] ?? '');
$pw   = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
$role = $_POST['role'] ?? '';

if (empty($uss) || empty($_POST['password']) || empty($role)) {
    echo "<script>alert('Semua field utama wajib diisi!'); window.location.href='form_tambah_user3.php';</script>";
    exit();
}

// Mulai Transaksi Database (Mencegah data yatim/gagal di tengah jalan)
mysqli_begin_transaction($koneksi);

try {
    // 1. Simpan ke tabel users
    $sql_usr = "INSERT INTO users (username, password, role, created_at) VALUES ('$uss', '$pw', '$role', NOW())";
    $query_usr = mysqli_query($koneksi, $sql_usr);

    if (!$query_usr) {
        throw new Exception("Gagal simpan ke tabel users: " . mysqli_error($koneksi));
    }

    $id_terakhir = mysqli_insert_id($koneksi);

    // 2. Jika role SISWA -> Simpan ke tabel siswa
    if ($role === 'siswa') {
        $nis           = trim($_POST['nis'] ?? '');
        $nama          = trim($_POST['nama'] ?? '');
        $kelas         = trim($_POST['kelas'] ?? '');
        $jk_raw        = $_POST['jenis_kelamin'] ?? '';
        $jenis_kelamin = ($jk_raw === 'Laki-laki' || $jk_raw === 'L') ? 'L' : (($jk_raw === 'Perempuan' || $jk_raw === 'P') ? 'P' : '');

        $sql_siswa = "INSERT INTO siswa (nis, nama, kelas, jenis_kelamin, user_id) VALUES ('$nis', '$nama', '$kelas', '$jenis_kelamin', '$id_terakhir')";
        $query_siswa = mysqli_query($koneksi, $sql_siswa);

        if (!$query_siswa) {
            throw new Exception("Gagal simpan ke tabel siswa: " . mysqli_error($koneksi));
        }

    // 3. Jika role GURU -> Simpan ke tabel guru
    } else if ($role === 'guru') {
        $nip       = trim($_POST['nip'] ?? '');
        $nama_guru = trim($_POST['nama_guru'] ?? '');
        $jk_raw    = $_POST['jk_guru'] ?? '';
        $jenis_kelamin = ($jk_raw === 'Laki-laki' || $jk_raw === 'L') ? 'L' : (($jk_raw === 'Perempuan' || $jk_raw === 'P') ? 'P' : '');

        // Sesuaikan dengan kolom tabel guru di database kamu: nip, nama, jenis_kelamin, user_id
        $sql_guru = "INSERT INTO guru (nip, nama, jenis_kelamin, user_id) VALUES ('$nip', '$nama_guru', '$jenis_kelamin', '$id_terakhir')";
        $query_guru = mysqli_query($koneksi, $sql_guru);

        if (!$query_guru) {
            throw new Exception("Gagal simpan ke tabel guru: " . mysqli_error($koneksi));
        }
    }

    // Jika semua query sukses, commit/simpan permanen
    mysqli_commit($koneksi);
    echo "<script>alert('Data berhasil disimpan'); window.location.href='tabel_user.php';</script>";

} catch (Exception $e) {
    // Jika ada error di salah satu query, batalkan simpan ke database (Rollback)
    mysqli_rollback($koneksi);
    $error_msg = addslashes($e->getMessage());
    echo "<script>alert('$error_msg'); window.location.href='form_tambah_user3.php';</script>";
}
?>