<?php
echo "<!DOCTYPE html>
<html>

<head>
    <title>Contoh Program Mencari record berdasarkan field nama</title>
</head>

<body>";
$koneksi = mysqli_connect("localhost", "root", "", "pemrogweb2");
// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

echo "<h3>Contoh Program Mencari record berdasarkan field nama</h3>
<form action=\"\" method=\"post\">
    <label>Masukkan nama:</label>
    <input type=\"text\" name=\"nama\"><br>
    <p>
        <input type=\"submit\" value=\"Search\">
        <input type=\"reset\" value=\"Hapus\">
    </p>
</form>";

// Periksa apakah $_POST['nama'] telah diatur sebelum menggunakannya
if (isset($_POST['nama'])) {
    $cari = $_POST['nama'];
    // Query SQL
    $hasil = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nama LIKE '%$cari%' ORDER BY nama ASC");

    // Periksa apakah ada hasil dari query
    if (mysqli_num_rows($hasil) > 0) {
        echo "<table>
        <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jurusan</th>
        </tr>";

        // Tampilkan hasil query
        while ($data = mysqli_fetch_array($hasil)) {
            echo "<tr>
            <td>" . $data['nim'] . "</td>
            <td>" . $data['nama'] . "</td>
            <td>" . $data['alamat'] . "</td>
            <td>" . $data['jurusan'] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada hasil yang ditemukan.";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Masukkan nama untuk melakukan pencarian.";
}

// Tutup tag body dan html
echo "</body></html>";

// Tutup koneksi database
mysqli_close($koneksi);
