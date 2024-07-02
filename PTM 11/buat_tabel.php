<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_latihan11");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Membuat tabel
$sql = "CREATE TABLE IF NOT EXISTS tbl_mhs (
    mhsID INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(mhsID),
    FirstName VARCHAR(15),
    LastName VARCHAR(15),
    Age INT
)";

if (mysqli_query($koneksi, $sql)) {
    echo "Tabel berhasil dibuat";
} else {
    echo "Error creating table: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
