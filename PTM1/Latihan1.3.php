<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Penyisipan PHP Pada HTML</title>
</head>
<style>
p {
            text-align: left;
            margin-left: 40%;
            margin-right: 30%;
}
</style>
<body>
    <h2>1st Thing 1st, Silakan identifikasi diri Anda!</h2>
    <hr color="blue" size="4" width="60%" align="left">
    <?php
    // Berikut ini adalah kode PHP yang disisipkan
    echo "<b><font face='arial' size='5' color='sienna'>Momentum tahun baru
    memang paling enak untuk dijadikan turning perbaikan diri<br>";
    echo "But how? Begitu banyak kebiasaan buruk, begitu banyak masalah,
    begitu banyak tujuan,<br>";
    echo "begitu banyak mimpi, bla... bla... bla... Stop! tentukan prioritas... first thing
    first!</font></b>";
    ?>
    <h3>Selamat belajar PHP</h3>

    <?php
    echo "<pre>";
    echo "<center><span style='font-size: 14px; color: magenta;'>BIODATA</span></center>";
    echo "<hr size='4' width='60%' color='blue'>";
    echo "<p><span style='font-size: 12px; color: red;'>Nama: Endar Nirmala</span><br></p>";
    echo "<p><span style='font-size: 12px; color: blue;'>Kelas: 6TPLPB</span><br></p>";
    echo "<p><span style='font-size: 12px; color: green;'>Jurusan: Teknik Informatika</span><br></p>";
    echo "<p><span style='font-size: 12px; color: purple;'>Hobi: Traveling</span><br></pre></p>";
    echo "<hr size='4' width='60%' color='blue'>";
    ?>
</body>
</html>
