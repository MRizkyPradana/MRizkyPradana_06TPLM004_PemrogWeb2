<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana dengan PHP</title>
</head>
<body>
    <h2>Kalkulator Sederhana dengan PHP</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="num1" placeholder="Masukkan angka pertama" required>
        <select name="operator">
            <option value="tambah">+</option>
            <option value="kurang">-</option>
            <option value="kali">*</option>
            <option value="bagi">/</option>
        </select>
        <input type="text" name="num2" placeholder="Masukkan angka kedua" required>
        <button type="submit" name="submit">Hitung</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operator'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operator = $_POST['operator'];
            $result = '';

            switch ($operator) {
                case 'tambah':
                    $result = $num1 + $num2;
                    break;
                case 'kurang':
                    $result = $num1 - $num2;
                    break;
                case 'kali':
                    $result = $num1 * $num2;
                    break;
                case 'bagi':
                    if ($num2 == 0) {
                        $result = "Tidak dapat melakukan pembagian dengan angka nol";
                    } else {
                        $result = $num1 / $num2;
                    }
                    break;
                default:
                    $result = "Operator tidak valid";
                    break;
            }

            echo "<h3>Hasil: $result</h3>";
        } else {
            echo "<h3>Silakan masukkan semua nilai</h3>";
        }
    }
    ?>
</body>
</html>
