<!DOCTYPE html>
<html>

<head>
    <title>Tambah Buku Baru</title>
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

        input[type="text"],
        input[type="number"] {
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
    </style>
</head>

<body>
    <h3>Tambah Buku Baru</h3>
    <form action="process_add_book.php" method="post">
        <label>Judul:</label>
        <input type="text" name="judul" required><br>
        <label>Penulis:</label>
        <input type="text" name="penulis" required><br>
        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" required><br>
        <p>
            <input type="submit" value="Tambah Buku">
        </p>
    </form>
    <a href="search_books.php">Kembali ke Pencarian Buku</a>
</body>

</html>