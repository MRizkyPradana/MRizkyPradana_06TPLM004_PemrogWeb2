<?php
// Koneksi ke database
$con = mysqli_connect("localhost", "root", "", "lat_dbase");
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Inisialisasi variabel
$jumlah_data = 0;
$nim = [];
$nama_mhs = [];
$matakuliah = [];
$uts = [];
$uas = [];
$tugas = [];
$jmlhadir = [];

// Mendapatkan data dari form
if (isset($_POST['nim'])) {
    // Jika $_POST['nim'] adalah array, ambil data
    if (is_array($_POST['nim'])) {
        $jumlah_data = count($_POST['nim']);
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $matakuliah = $_POST['matakuliah'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];
        $tugas = $_POST['tugas'];
        $jmlhadir = $_POST['jmlhadir'];
    } else {
        // Jika hanya satu data yang dikirim, ambil data dari variabel tunggal
        $nim[] = $_POST['nim'];
        $nama_mhs[] = $_POST['nama_mhs'];
        $matakuliah[] = $_POST['matakuliah'];
        $uts[] = $_POST['uts'];
        $uas[] = $_POST['uas'];
        $tugas[] = $_POST['tugas'];
        $jmlhadir[] = $_POST['jmlhadir'];
        $jumlah_data = 1;
    }

    // Loop untuk memproses setiap data
    for ($i = 0; $i < $jumlah_data; $i++) {
        // Perhitungan nilai akhir
        $nilai_akhir = (0.3 * $uts[$i]) + (0.4 * $uas[$i]) + (0.3 * $tugas[$i]);

        // Penentuan grade
        if ($nilai_akhir >= 80) {
            $grade = 'A';
        } elseif ($nilai_akhir >= 70) {
            $grade = 'B';
        } elseif ($nilai_akhir >= 60) {
            $grade = 'C';
        } elseif ($nilai_akhir >= 50) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        // Insert data ke dalam tabel
        $sql = "INSERT INTO tbl_nilai (nim, nama_mhs, matakuliah, uts, uas, tugas, jmlhadir, nilai_akhir, grade) VALUES ('$nim[$i]', '$nama_mhs[$i]', '$matakuliah[$i]', $uts[$i], $uas[$i], $tugas[$i], $jmlhadir[$i], $nilai_akhir, '$grade')";

        if (!mysqli_query($con, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    echo "Data berhasil disimpan";
} else {
    echo "Tidak ada data yang dikirim";
}

mysqli_close($con);
