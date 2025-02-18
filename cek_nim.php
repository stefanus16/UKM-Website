<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);

    $query = "SELECT * FROM peserta WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "found"; // NIM ada di database
    } else {
        echo "not_found"; // NIM tidak ditemukan
    }
}
?>
