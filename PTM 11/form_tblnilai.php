<!DOCTYPE html>
<html>

<head>
    <style>
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Form Pengisian Data Nilai</h2>
    <form action="proses_pengisian.php" method="post">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" maxlength="9"><br>

        <label for="nama_mhs">Nama Mahasiswa:</label><br>
        <input type="text" id="nama_mhs" name="nama_mhs" maxlength="30"><br>

        <label for="matakuliah">Mata Kuliah:</label><br>
        <input type="text" id="matakuliah" name="matakuliah" maxlength="20"><br>

        <label for="uts">Nilai UTS:</label><br>
        <input type="text" id="uts" name="uts"><br>

        <label for="uas">Nilai UAS:</label><br>
        <input type="text" id="uas" name="uas"><br>

        <label for="tugas">Nilai Tugas:</label><br>
        <input type="text" id="tugas" name="tugas"><br>

        <label for="jmlhadir">Jumlah Kehadiran:</label><br>
        <input type="text" id="jmlhadir" name="jmlhadir"><br>

        <br>
        <button class="btn" type="submit">Submit</button>
    </form>

    <h2>Data Nilai Mahasiswa</h2>
    <a href="tampil_data_tblnilai.php" class="btn">Tampilkan Data</a>
</body>

</html>