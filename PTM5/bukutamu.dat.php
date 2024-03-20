<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
</head>
<body>

<h2>Silakan Isi Buku Tamu</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nama: <input type="text" name="nama"><br>
    Email: <input type="email" name="email"><br>
    Komentar: <textarea name="komentar" cols="30" rows="5"></textarea><br> <!-- Ubah nilai cols sesuai kebutuhan -->
    <input type="submit" name="submit" value="Submit">
</form>

<?php
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    if (isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["komentar"])) {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $komentar = $_POST["komentar"];

        if (!empty($nama) && !empty($email) && !empty($komentar)) {
            // Buka atau buat file untuk menyimpan data
            $file = fopen("buku_tamu.txt", "a");

            // Menulis data ke file
            fwrite($file, "Nama: " . $nama . "\n");
            fwrite($file, "Email: " . $email . "\n");
            fwrite($file, "Komentar: " . $komentar . "\n\n");

            // Tutup file
            fclose($file);

            echo "<p>Terima kasih atas kunjungan Anda! Data telah tersimpan.</p>";
        } else {
            echo "<p>Semua kolom harus diisi.</p>";
        }
    } else {
        echo "<p>Semua kolom harus diisi.</p>";
    }
}
?>

</body>
</html>
