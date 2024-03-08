<html>
<head>
    <title>Penggunaan Switch-Case</title>
</head>
<body>
    <p>Hari ini:
    <?php
    $namahari = date("l");
    switch ($namahari) {
        case "Sunday":
            print("Minggu");
            print " Waktu untuk istirahat";
            break;
        case "Monday":
            print("Senin<br>");
            print "Meeting awal minggu jam 08.00";
            break;
        case "Tuesday":
            print("Selasa<br>");
            print "Pembukaan Workshop Diklat";
            break;
        case "Wednesday":
            print("Rabu<br>");
            print "Seminar Launching Window Vista di JHCC";
            break;
        case "Thursday":
            print("Kamis<br>");
            print "Pertemuan dengan Mahasiswa";
            break;
        case "Friday":
            print("Jumat<br>");
            print "Jogging bersama";
            break;
        default:
            print("Sabtu<br>");
            print "Survey harga ke Dusit, Mangga Dua";
    }
    ?>
    </p>

    <p>Contoh penggunaan Switch-Case:
    <?php
    echo "<u>Menu Pilihan</u><br>";
    echo "[1] Trapesium<br>";
    echo "[2] Persegi Panjang<br>";
    echo "[3] Bujur Sangkar<br><br>";
    echo "<form method='post'>";
    echo "Pilihan<input type='text' name='pilih' size=2>";
    echo "<input type='submit' value='kirim'><br>";
    $pil = $_POST['pilih'];
    switch ($pil) {
        case 1:
            $atas = 12;
            $bawah = 17;
            $tinggi = 7;
            $luas = ($atas + $bawah) / 2 * $tinggi;
            echo "<br>Mencari Luas Trapesium<br>";
            echo "Garis atas = $atas cm<br>";
            echo "Garis bawah = $bawah cm<br>";
            echo "Tinggi = $tinggi cm<br>";
            echo "Luas Trapesium = $luas cm<sup>2</sup><br>";
            break;
        case 2:
            $panjang1 = 25;
            $lebar1 = 14;
            $luas1 = $panjang1 * $lebar1;
            echo "<br>Mencari Luas Persegi Panjang<br>";
            echo "Panjang = $panjang1 cm<br>";
            echo "Lebar = $lebar1 cm<br>";
            echo "Luas Bujur Sangkar = $luas1 cm<sup>2</sup><br>";
            break;
        case 3:
            $sisi = 12;
            $luas = $sisi * $sisi;
            echo "<br>Mencari Luas Bujur Sangkar<br>";
            echo "Sisi = $sisi cm<br>";
            echo "Luas Bujur Sangkar = $luas cm<sup>2</sup><br>";
            break;
        default:
            echo "<br><blink>Pilihan anda salah, silakan coba lagi</blink>";
            break;
    }
    ?>
    </p>
</body>
</html>
    