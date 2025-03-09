<?php
include 'koneksi.php';

// Query untuk mengambil data dari tabel peserta_kehadiran
$query = "SELECT * FROM peserta_kehadiran";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kehadiran Peserta</title>
    <link rel="stylesheet" href="datapeserta.css">
</head>
<body>
    <h2>Data Kehadiran Peserta</h2>
    <table>
        <tr>
            <th>ID Peserta</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jumlah Kehadiran</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['idpeserta']; ?></td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jumlah_kehadiran']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
<button class="back-button" onclick="window.location.href='pilihan.php'">Back</button>
</html>
