<?php
    include 'koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $namaLengkap = mysqli_real_escape_string($koneksi, $_POST['namalengkap']);
        $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);

        // Enkripsi password (opsional, disarankan untuk keamanan)
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menyimpan data ke database
        $sql = "INSERT INTO admin (nim, nama, password) VALUES ('$nim', '$namaLengkap', '$passwordHash')";

        // if (mysqli_query($koneksi, $sql)) {
        //     echo "Registrasi berhasil. <a href='login.php'>Login di sini</a>";
        // } else {
        //     echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        // }
    }

    // Menutup koneksi
    mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register UKM Badminton</title>
    <link rel="stylesheet" href="styleregister.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        // Validasi formulir menggunakan JavaScript
        function validateForm() {
            const nim = document.getElementById("nim").value;

            // Cek apakah NIM terdiri dari 8 digit angka
            const nimPattern = /^\d{8}$/;
            if (!nimPattern.test(nim)) {
                alert("NIM harus berupa 8 digit angka!");
                return false; // Formulir tidak akan dikirim
            }

            return true; // Formulir akan dikirim jika valid
        }
        
    </script>
</head>
<body>
    <div class="register-box">
        <form action="" method="post" onsubmit="return validateForm()">
            <h2>Register</h2>
            <div class="input-box">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <input type="text" id="namalengkap" name="namalengkap" required>
                <label for="namalengkap">Nama Lengkap</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="apps-outline"></ion-icon></span>
                <input type="text" id="nim" name="nim" required>
                <label for="nim">NIM</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="regis">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
