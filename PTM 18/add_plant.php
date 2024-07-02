<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $names = $_POST['name'];
    $stocks = $_POST['stock'];
    $descriptions = $_POST['description'];

    // Loop melalui setiap entri tanaman
    for ($i = 0; $i < count($names); $i++) {
        $name = $conn->real_escape_string($names[$i]);
        $stock = $conn->real_escape_string($stocks[$i]);
        $description = $conn->real_escape_string($descriptions[$i]);

        $sql = "INSERT INTO plants (name, stock, description) VALUES ('$name', '$stock', '$description')";
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Redirect ke index.php setelah memproses semua tanaman
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Tambah Tanaman</title>
</head>

<body>
    <h1>Tambah Tanaman</h1>
    <form method="POST" action="add_plant.php">
        <!-- Bagian yang bisa diulang untuk setiap tanaman -->
        <div class="plant-entry">
            <label>Nama:</label>
            <input type="text" name="name[]" required>
            <br>
            <label>Stok:</label>
            <input type="number" name="stock[]" required>
            <br>
            <label>Deskripsi:</label>
            <textarea name="description[]" required></textarea>
            <br><br>
        </div>
        <button type="button" id="addPlant">Tambah Tanaman Lainnya</button>
        <button type="submit">Tambah Tanaman</button>
    </form>

    <script>
        // JavaScript untuk menambahkan bidang masukan tanaman lebih banyak secara dinamis
        document.getElementById('addPlant').addEventListener('click', function() {
            var plantEntry = document.querySelector('.plant-entry').cloneNode(true);
            document.querySelector('form').insertBefore(plantEntry, this);
        });
    </script>
</body>

</html>