<?php
// Koneksi ke database
$con = mysqli_connect("localhost", "root", "", "lat_dbase");
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query SQL
$sql = "SELECT nim, nama_mhs, matakuliah, jmlhadir, tugas, uts, uas, nilai_akhir, grade
        FROM tbl_nilai
        ORDER BY nilai_akhir DESC";

// Eksekusi query
$result = mysqli_query($con, $sql);

// Tampilkan hasil
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Nilai Kehadiran</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Grade</th>
            </tr>";
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["nim"] . "</td>
                <td>" . $row["nama_mhs"] . "</td>
                <td>" . $row["matakuliah"] . "</td>
                <td>" . $row["jmlhadir"] . "</td>
                <td>" . $row["tugas"] . "</td>
                <td>" . $row["uts"] . "</td>
                <td>" . $row["uas"] . "</td>
                <td>" . $row["nilai_akhir"] . "</td>
                <td>" . $row["grade"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data";
}

mysqli_close($con);
