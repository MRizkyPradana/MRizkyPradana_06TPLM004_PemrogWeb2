<!DOCTYPE html>
<html>

<head>
    <title>Pencarian Buku</title>
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

        input[type="text"] {
            width: 300px;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }

        a:hover {
            background-color: #007B9E;
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
    <h3>Pencarian Buku</h3>
    <form action="search_books.php" method="post">
        <label>Masukkan judul:</label>
        <input type="text" name="judul"><br>
        <label>Masukkan penulis:</label>
        <input type="text" name="penulis"><br>
        <p>
            <input type="submit" value="Search">
            <input type="reset" value="Hapus">
        </p>
    </form>
    <a href="add_book.php">Tambah Buku Baru</a>

    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_perpustakaan");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Cek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
        $penulis = isset($_POST['penulis']) ? $_POST['penulis'] : '';

        // Pagination
        $per_page = 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

        // Query untuk mendapatkan total data
        $total_query = "SELECT * FROM buku WHERE judul LIKE '%$judul%' OR penulis LIKE '%$penulis%'";
        $total_result = mysqli_query($koneksi, $total_query);
        $total = mysqli_num_rows($total_result);
        $pages = ceil($total / $per_page);

        // Query untuk mendapatkan data sesuai halaman
        $query = "SELECT * FROM buku WHERE judul LIKE '%$judul%' OR penulis LIKE '%$penulis%' LIMIT $start, $per_page";
        $hasil = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($hasil) > 0) {
            echo "<table>
            <tr>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
            </tr>";

            while ($data = mysqli_fetch_array($hasil)) {
                echo "<tr>
                <td>" . $data['id_buku'] . "</td>
                <td>" . $data['judul'] . "</td>
                <td>" . $data['penulis'] . "</td>
                <td>" . $data['tahun_terbit'] . "</td>
                </tr>";
            }
            echo "</table>";

            // Tampilkan pagination
            echo "<div class='pagination'>";
            for ($i = 1; $i <= $pages; $i++) {
                echo "<a href='search_books.php?page=$i'>$i</a> ";
            }
            echo "</div>";
        } else {
            echo "Tidak ada hasil yang ditemukan.";
        }
    }

    mysqli_close($koneksi);
    ?>
</body>

</html>