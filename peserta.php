<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regis Peserta UKM Badminton</title>
    <link rel="stylesheet" href="stylepeserta.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>

    <div class="regis-box">
        <form action="terimakasih.php" method="get">
            <h2>Register Peserta</h2>
            <div class="input-regis-box">
                <span class="icon"><ion-icon name="apps-outline"></ion-icon></span>
                <input type="text" required>
                <label>NIM</label>
            </div>
            <div class="input-regis-box">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <input type="password" required>
                <label>Nama</label>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    
</body>
</html>