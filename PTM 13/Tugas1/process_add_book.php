<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_perpustakaan");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $query = "INSERT INTO buku (judul, penulis, tahun_terbit) VALUES ('$judul', '$penulis', '$tahun_terbit')";

    if (mysqli_query($koneksi, $query)) {
        echo "Buku berhasil ditambahkan. <a href='add_book.php'>Tambah lagi</a> | <a href='search_books.php'>Cari Buku</a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
