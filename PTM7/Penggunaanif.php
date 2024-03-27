<!DOCTYPE html>
<html>
<head>
    <title>TUGAS PEMROGRAMAN WEB PTM 7</title>
</head>
<body>
    <h2>Materi Pemrograman PHP</h2>
    <form method="post" action="">
        <select name="materi">
            <option value="1">Penggunaan IF</option>
            <option value="2">Penggunaan SWITCH..CASE</option>
            <option value="3">Penggunaan Looping</option>
            <option value="4">Penggunaan Array</option>
        </select>
        <button type="submit" name="submit">Kirim</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $materi = $_POST['materi'];
        
        // Memanggil fungsi sesuai dengan pilihan materi yang dipilih
        switch ($materi) {
            case '1':
                nilai_akhir();
                break;
            case '2':
                kalkulator();
                break;
            case '3':
                bilanganhabisdibagi3();
                break;
            case '4':
                perkalian_matriks();
                break;
            default:
                echo "Pilihan tidak valid.\n";
        }
    }

    // Fungsi-fungsi yang sesuai dengan pilihan materi
    function nilai_akhir() {
        echo "<p>Anda memilih Penggunaan IF.</p>";
        include "nilaiakhir.php";
    }

    function kalkulator() {
        echo "<p>Anda memilih Penggunaan SWITCH..CASE.</p>";
        include "kalkulator.php";
    }

    function bilanganhabisdibagi3() {
        echo "<p>Anda memilih Penggunaan Looping.</p>";
        include 'deretbilangan.php';
    }

    function perkalian_matriks() {
        echo "<p>Anda memilih Penggunaan Array.</p>";
        include 'looping.php';
    }
    ?>
</body>
</html>
