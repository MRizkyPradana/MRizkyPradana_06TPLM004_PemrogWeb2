<?php
echo "<html>
<body>";

// Cek apakah variabel $_POST['nama'] dan $_POST['jurusan'] sudah diatur sebelum digunakan
if (isset($_POST['nama']) && isset($_POST['jurusan'])) {
    $koneksi = mysqli_connect("localhost", "root", "", "pemrogweb2");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cari = $_POST['nama'];
    $cari2 = $_POST['jurusan'];

    // Query SQL
    $hasil = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nama LIKE '%$cari%' OR alamat LIKE '%$cari2%' ORDER BY nama ASC");

    echo "<table>
    <tr>
    <th>NIM</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Jurusan</th>
    </tr>";

    while ($data = mysqli_fetch_array($hasil)) {
        echo "<tr>
        <td>" . $data['nim'] . "</td>
        <td>" . $data['nama'] . "</td>
        <td>" . $data['alamat'] . "</td>
        <td>" . $data['jurusan'] . "</td>
        </tr>";
    }

    echo "</table>";

    mysqli_close($koneksi);
} else {
    echo "Masukkan nama dan jurusan untuk melakukan pencarian.";
}

echo "</body>
</html>";
