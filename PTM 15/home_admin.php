<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, Kawan Untuk Mengakses Halaman Ini, Anda Harus Login Terlebih Dahulu, Terimakasih');
        document.location='index.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="jumbotron bg-info text-white">
            <h1 class="display-4">Hello, <b><?= $_SESSION['nama_lengkap'] ?></b></h1>
            <p class="lead">Selamat data, login sebagai <b><?= $_SESSION['level'] ?></b></p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="logout.php" role="button">Logout</a>
            <div class="card">
            </div>
        </div>
    </div>
</body>

</html>