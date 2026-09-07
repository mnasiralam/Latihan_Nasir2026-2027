<?php
$host     = "localhost";
$user     = "root";
$password = ""; // Isi jika database MySQL kamu memiliki password
$database = "db_siacad_smk";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>