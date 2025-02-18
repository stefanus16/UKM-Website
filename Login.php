<!-- <?php
    // include 'koneksi.php';

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     // Ambil data dari form login
    //     $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    //     $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    //     // Query untuk mendapatkan data admin berdasarkan NIM
    //     $sql = "SELECT * FROM admin WHERE nim = '$nim'";
    //     $result = mysqli_query($koneksi, $sql);

    //     if (mysqli_num_rows($result) > 0) {
    //         $row = mysqli_fetch_assoc($result);

    //         // Verifikasi password
    //         if (password_verify($password, $row['password']))    {
    //             // Jika login berhasil
    //             session_start();
    //             $_SESSION['idadmin'] = $row['idadmin'];
    //             $_SESSION['nim'] = $row['nim'];
    //             $_SESSION['nama'] = $row['nama'];

    //             echo "<script>alert('Login berhasil!'); window.location.href = 'pilihan.php';</script>";
    //         } else {
    //             // Jika password salah
    //             echo "<script>alert('Password salah!'); window.location.href = 'login.php';</script>";
    //         }
    //     } else {
    //         // Jika NIM tidak ditemukan
    //         echo "<script>alert('NIM tidak ditemukan!'); window.location.href = 'login.php';</script>";
    //     }
    // }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login UKM Badminton</title>
    <link rel="stylesheet" href="stylelogin.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>

    <div class="login-box">
        <form action="pilihan.php" method="post">
            <h2>Login Pengurus</h2>
            <div class="input-box">
                <span class="icon"><ion-icon name="apps-outline"></ion-icon></span>
                <input type="text" required>
                <label>NIM</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" required>
                <label>Password</label>
            </div>
            <button type="submit">Login</button>
            <div class="regis">
                <p>Dont have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>

    
</body>
</html> -->

<?php
    include 'koneksi.php';

    // Cek jika form dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form login
        $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);

        // Query untuk mendapatkan data admin berdasarkan NIM
        $sql = "SELECT * FROM admin WHERE nim = '$nim'";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verifikasi password
            if (password_verify($password, $row['password'])) {
                // Jika login berhasil
                session_start();
                $_SESSION['idadmin'] = $row['idadmin'];
                $_SESSION['nim'] = $row['nim'];
                $_SESSION['nama'] = $row['nama'];

                echo "<script>alert('Login berhasil!'); window.location.href = 'pilihan.php';</script>";
            } else {
                // Jika password salah
                echo "<script>alert('Password salah!'); window.location.href = 'login.php';</script>";
            }
        } else {
            // Jika NIM tidak ditemukan
            echo "<script>alert('NIM tidak ditemukan!'); window.location.href = 'login.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Login UKM Badminton</title>
</head>
<body>

    <div class="login-box">
        <form action="" method="post">
            <h2>Login Pengurus</h2>
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
            <button type="submit">Login</button>
            <div class="regis">
                <p>Dont have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
