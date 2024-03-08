<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Akhir dan Keterangan Grade</title>
</head>
<body>
    <?php
    // Fungsi untuk menghitung nilai akhir berdasarkan bobot
    function hitungNilaiAkhir($kehadiran, $tugas, $uts, $uas) {
        $bobot_kehadiran = 0.1;
        $bobot_tugas = 0.2;
        $bobot_uts = 0.3;
        $bobot_uas = 0.4;

        $nilai_akhir = ($kehadiran / 18) * 100 * $bobot_kehadiran + $tugas * $bobot_tugas + $uts * $bobot_uts + $uas * $bobot_uas;
        return $nilai_akhir;
    }

    // Fungsi untuk menentukan grade dan keterangan
    function tentukanGradeKeterangan($nilai_akhir) {
        if ($nilai_akhir >= 80) {
            $grade = 'A';
            $keterangan = 'Lulus';
        } elseif ($nilai_akhir >= 70) {
            $grade = 'B';
            $keterangan = 'Lulus';
        } elseif ($nilai_akhir >= 60) {
            $grade = 'C';
            $keterangan = 'Lulus';
        } elseif ($nilai_akhir >= 50) {
            $grade = 'D';
            $keterangan = 'Lulus';
        } else {
            $grade = 'E';
            $keterangan = 'Tidak Lulus';
        }

        return [$grade, $keterangan];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_mahasiswa = $_POST["nama"];
        $nim_mahasiswa = $_POST["nim"];
        $matakuliah = $_POST["matakuliah"];
        $kehadiran = $_POST["kehadiran"];
        $tugas = $_POST["tugas"];
        $uts = $_POST["uts"];
        $uas = $_POST["uas"];

        // Hitung nilai akhir
        $nilai_akhir = hitungNilaiAkhir($kehadiran, $tugas, $uts, $uas);

        // Tentukan grade dan keterangan
        list($grade, $keterangan) = tentukanGradeKeterangan($nilai_akhir);

        // Menampilkan hasil
        echo "<h2>Nilai Akademik - $matakuliah</h2>";
        echo "<p>Nama: $nama_mahasiswa</p>";
        echo "<p>NIM: $nim_mahasiswa</p>";
        echo "<p>Jumlah Kehadiran: $kehadiran</p>";
        echo "<p>Nilai Kehadiran: " . ($kehadiran / 18) * 100 . "</p>";
        echo "<p>Nilai Tugas: $tugas</p>";
        echo "<p>Nilai UTS: $uts</p>";
        echo "<p>Nilai UAS: $uas</p>";
        echo "<p>Nilai Akhir: $nilai_akhir</p>";
        echo "<p>Grade: $grade</p>";
        echo "<p>Keterangan: $keterangan</p>";
    }
    ?>

    <h2>Form Input</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" required><br>

        <label for="matakuliah">Matakuliah:</label>
        <input type="text" name="matakuliah" required><br>

        <label for="kehadiran">Jumlah Kehadiran:</label>
        <input type="number" name="kehadiran" required><br>

        <label for="tugas">Nilai Tugas:</label>
        <input type="number" name="tugas" required><br>

        <label for="uts">Nilai UTS:</label>
        <input type="number" name="uts" required><br>

        <label for="uas">Nilai UAS:</label>
        <input type="number" name="uas" required><br>

        <input type="submit" value="Hitung">
    </form>
</body>
</html>
