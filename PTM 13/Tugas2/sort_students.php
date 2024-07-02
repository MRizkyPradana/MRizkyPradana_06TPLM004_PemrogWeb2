<?php
session_start(); // Mulai sesi

// Fungsi untuk mengatur urutan
function setSortOrder($default)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        return isset($_POST['sort_by']) ? $_POST['sort_by'] : $default;
    } else {
        return isset($_SESSION['sort_by']) ? $_SESSION['sort_by'] : $default;
    }
}

$koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Pagination
$per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

// Tentukan urutan
$sort_by = setSortOrder('nim');
$_SESSION['sort_by'] = $sort_by;

// Query untuk mendapatkan total data
$total_query = "SELECT * FROM mahasiswa";
$total_result = mysqli_query($koneksi, $total_query);
$total = mysqli_num_rows($total_result);
$pages = ceil($total / $per_page);

// Query untuk mendapatkan data sesuai halaman
$query = "SELECT * FROM mahasiswa ORDER BY $sort_by LIMIT $start, $per_page";
$hasil = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Pengurutan Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h3 {
            color: #333;
        }

        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
        }

        select {
            width: 300px;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <h3>Pengurutan Data Mahasiswa</h3>
    <form action="sort_students.php" method="post">
        <label>Urutkan berdasarkan:</label>
        <select name="sort_by">
            <option value="nim" <?php if ($sort_by == 'nim') echo 'selected'; ?>>NIM</option>
            <option value="nama" <?php if ($sort_by == 'nama') echo 'selected'; ?>>Nama</option>
        </select>
        <p>
            <input type="submit" value="Sort">
        </p>
    </form>

    <?php
    if (mysqli_num_rows($hasil) > 0) {
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

        // Tampilkan pagination
        echo "<div class='pagination'>";
        for ($i = 1; $i <= $pages; $i++) {
            echo "<a href='sort_students.php?page=$i'>$i</a> ";
        }
        echo "</div>";
    } else {
        echo "Tidak ada hasil yang ditemukan.";
    }

    mysqli_close($koneksi);
    ?>
</body>

</html>