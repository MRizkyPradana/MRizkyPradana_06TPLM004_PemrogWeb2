<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi String</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        h1, h2, h3 {
            color: #333;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Aplikasi Manipulasi String</h1>

    <form method="post">
        <label for="inputString">Masukkan sebuah string:</label><br>
        <input type="text" id="inputString" name="inputString" required><br>
        <label for="searchWord">Masukkan kata yang ingin dicari:</label><br>
        <input type="text" id="searchWord" name="searchWord"><br>
        <input type="submit" value="Proses">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inputString'])) {
        $inputString = $_POST['inputString'];
        $searchWord = isset($_POST['searchWord']) ? $_POST['searchWord'] : '';

        // Mengubah string menjadi huruf besar
        $uppercaseString = strtoupper($inputString);

        // Mengubah string menjadi huruf kecil
        $lowercaseString = strtolower($inputString);

        // Menghitung jumlah karakter dalam string
        $stringLength = strlen($inputString);

        // Membalik urutan karakter dalam string
        $reversedString = strrev($inputString);

        // Memeriksa apakah kata terdapat dalam string
        $wordPosition = strpos($inputString, $searchWord);
        $wordFound = $wordPosition !== false ? "Kata '$searchWord' ditemukan pada posisi $wordPosition." : "Kata '$searchWord' tidak ditemukan.";

        echo "<h2>Hasil Manipulasi String</h2>";
        echo "<p>String asli: $inputString</p>";
        echo "<p>String huruf besar: $uppercaseString</p>";
        echo "<p>String huruf kecil: $lowercaseString</p>";
        echo "<p>Jumlah karakter: $stringLength</p>";
        echo "<p>String dibalik: $reversedString</p>";
        if ($searchWord) {
            echo "<p>Pencarian kata: $wordFound</p>";
        }
    }
    ?>
</body>
</html>
