<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Kehadiran</title>
    <link rel="stylesheet" href="stylelogin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="login-box">
        <form id="absenForm" action="proses_kehadiran.php" method="post">
            <h2>Absen Kehadiran</h2>
            <div class="input-box">
                <label for="nim"></label>
                <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
                <button type="button" id="cekNIM">Cek NIM</button>
            </div>

            <div class="input-box" id="namaField" style="display: none;">
                <label for="nama"></label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama">
            </div>

            <button type="submit" id="absenBtn" disabled>Absen</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#cekNIM").click(function() {
                var nim = $("#nim").val();
                if (nim === "") {
                    alert("Masukkan NIM terlebih dahulu!");
                    return;
                }

                $.ajax({
                    url: "cek_nim.php",
                    method: "POST",
                    data: { nim: nim },
                    success: function(response) {
                        if (response === "found") {
                            alert("NIM ditemukan. Silahkan tekan tombol Absen");
                            $("#namaField").hide(); // Sembunyikan input nama
                            $("#absenBtn").prop("disabled", false); // Aktifkan tombol absen
                        } else {
                            alert("NIM tidak ditemukan! Silakan masukkan nama.");
                            $("#namaField").show(); // Tampilkan input nama
                            $("#absenBtn").prop("disabled", false); // Aktifkan tombol absen
                        }
                    }
                });
            });
        });
    </script>

</body>
</html>
