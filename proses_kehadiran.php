<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = isset($_POST['nama']) ? mysqli_real_escape_string($koneksi, $_POST['nama']) : null;

    // Cek apakah NIM sudah ada di tabel peserta
    $queryPeserta = "SELECT * FROM peserta WHERE nim = '$nim'";
    $resultPeserta = mysqli_query($koneksi, $queryPeserta);

    if ($resultPeserta && mysqli_num_rows($resultPeserta) > 0) {
        // Jika NIM ditemukan, ambil idpeserta
        $rowPeserta = mysqli_fetch_assoc($resultPeserta);
        $idpeserta = $rowPeserta['idpeserta'];
    } else {
        // Jika NIM tidak ditemukan, pastikan user memasukkan nama
        if (empty($nama)) {
            echo "<script>alert('NIM tidak ditemukan. Silakan masukkan nama!'); window.history.back();</script>";
            exit;
        }

        // Tambahkan peserta baru ke tabel peserta
        $queryInsertPeserta = "INSERT INTO peserta (nim, nama) VALUES ('$nim', '$nama')";
        if (mysqli_query($koneksi, $queryInsertPeserta)) {
            // Ambil ID peserta yang baru ditambahkan
            $idpeserta = mysqli_insert_id($koneksi);
        } else {
            echo "<script>alert('Gagal menambahkan peserta baru.'); window.history.back();</script>";
            exit;
        }
    }

    // Tambahkan ke tabel kehadiran
    $tanggalHadir = date("Y-m-d H:i:s"); // Format datetime
    $queryKehadiran = "INSERT INTO kehadiran (idpeserta, tanggalhadir, jumlahhadir) VALUES ('$idpeserta', '$tanggalHadir', 1)";

    if (mysqli_query($koneksi, $queryKehadiran)) {
        echo "<script>alert('Kehadiran berhasil dicatat!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Gagal mencatat kehadiran.'); window.history.back();</script>";
    }
}
?>
