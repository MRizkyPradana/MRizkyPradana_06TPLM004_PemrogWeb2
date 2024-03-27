<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penentuan Nilai Akhir dan Grade</title>
</head>
<body>
    <h2>Penentuan Nilai Akhir dan Grade</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nilai">Masukkan nilai:</label>
        <input type="number" id="nilai" name="nilai" required>
        <button type="submit" name="submit">Hitung</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['nilai'])) { // Memeriksa apakah kunci 'nilai' ada dalam $_POST
            $nilai = $_POST['nilai'];

            // Validasi nilai
            if ($nilai >= 0 && $nilai <= 100) {
                // Menentukan nilai akhir dan grade
                $nilai_akhir = $nilai;
                if ($nilai >= 80) {
                    $grade = 'A';
                } elseif ($nilai >= 70) {
                    $grade = 'B';
                } elseif ($nilai >= 60) {
                    $grade = 'C';
                } elseif ($nilai >= 50) {
                    $grade = 'D';
                } else {
                    $grade = 'E';
                }

                echo "<p>Nilai akhir: $nilai_akhir</p>";
                echo "<p>Grade: $grade</p>";
            } else {
                echo "<p>Nilai harus dalam rentang 0-100.</p>";
            }
        }
    }
    ?>
</body>
</html>
