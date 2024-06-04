<?php
//Koneksi ke database menggunakan PDO-->
$db_host = 'localhost'; // Sesuaikan dengan host database Anda
$db_name = 'db_berita'; // Nama database
$db_user = 'root'; // Username database
$db_pass = ''; // Password database

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

//Update data berita-->
if(isset($_POST['update'])) {
    $idberita = $_POST['update_idberita'];
    $judulberita = $_POST['update_judulberita'];
    $isiberita = $_POST['update_isiberita'];
    $penulis = $_POST['update_penulis'];
    $tgldipublish = $_POST['update_tgldipublish'];

    $sql = "UPDATE tbl_berita SET judulberita = :judulberita, isiberita = :isiberita, penulis = :penulis, tgldipublish = :tgldipublish WHERE idberita = :idberita";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idberita', $idberita);
    $stmt->bindParam(':judulberita', $judulberita);
    $stmt->bindParam(':isiberita', $isiberita);
    $stmt->bindParam(':penulis', $penulis);
    $stmt->bindParam(':tgldipublish', $tgldipublish);

    try {
        $stmt->execute();
        echo "Record berhasil diupdate.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Delete data berita-->
if(isset($_POST['delete'])) {
    $idBerita = $_POST['delete_idberita'];

    $sql = "DELETE FROM tbl_berita WHERE idberita = :idberita";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idberita', $idBerita);

    try {
        $stmt->execute();
        echo "Record berhasil dihapus.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Tambah data disubmit-->
if(isset($_POST['submit'])) {
    $idBerita = $_POST['idberita'];
    $idKategori = $_POST['idkategori'];
    $judulberita = $_POST['judulberita'];
    $isiberita = $_POST['isiberita'];
    $penulis = $_POST['penulis'];
    $tgldipublish = $_POST['tgldipublish'];

//Masukkan record baru pada tbl_berita-->
    $sql = "INSERT INTO tbl_berita (idberita, idkategori, judulberita, isiberita, penulis, tgldipublish) VALUES (:idberita, :idkategori, :judulberita, :isiberita, :penulis, :tgldipublish)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idberita', $idBerita);
    $stmt->bindParam(':idkategori', $idKategori);
    $stmt->bindParam(':judulberita', $judulberita);
    $stmt->bindParam(':isiberita', $isiberita);
    $stmt->bindParam(':penulis', $penulis);
    $stmt->bindParam(':tgldipublish', $tgldipublish);

//Eksekusi statement-->
    try {
        $stmt->execute();
        echo "Record berhasil ditambahkan.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Berita Dana</title>
</head>
<body>
    <h2>Form Berita</h2>
    <form method="post">
        <label for="idberita">ID Berita:</label>
        <input type="text" id="idberita" name="idberita"><br><br>
        
        <label for="idkategori">ID Kategori:</label>
        <input type="text" id="idkategori" name="idkategori"><br><br>
        
        <label for="judulberita">Judul Berita:</label>
        <input type="text" id="judulberita" name="judulberita"><br><br>
        
        <label for="isiberita">Isi Berita:</label><br>
        <textarea id="isiberita" name="isiberita" rows="4" cols="50"></textarea><br><br>
        
        <label for="penulis">Penulis:</label>
        <input type="text" id="penulis" name="penulis"><br><br>
        
        <label for="tgldipublish">Tanggal Dipublish:</label>
        <input type="date" id="tgldipublish" name="tgldipublish"><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Data Berita</h2>
    <table border="1">
        <tr>
            <th>ID Berita</th>
            <th>ID Kategori</th>
            <th>Judul Berita</th>
            <th>Isi Berita</th>
            <th>Penulis</th>
            <th>Tanggal Dipublish</th>
            <th>Action</th>
        </tr>
        <?php
        // Ambil data berita dari tabel
        $sql_select = "SELECT * FROM tbl_berita";
        $stmt_select = $pdo->query($sql_select);
        $beritas = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

        foreach ($beritas as $berita): ?>
            <tr>
                <td><?php echo $berita['idberita']; ?></td>
                <td><?php echo $berita['idkategori']; ?></td>
                <td><?php echo $berita['judulberita']; ?></td>
                <td><?php echo $berita['isiberita']; ?></td>
                <td><?php echo $berita['penulis']; ?></td>
                <td><?php echo $berita['tgldipublish']; ?></td>
                <td>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="update_idberita" value="<?php echo $berita['idberita']; ?>">
                        <input type="hidden" name="update_isiberita" value="<?php echo $berita['isiberita']; ?>">
                        <input type="hidden" name="update_penulis" value="<?php echo $berita['penulis']; ?>">
                        <input type="hidden" name="update_tgldipublish" value="<?php echo $berita['tgldipublish']; ?>">
                        <input type="text" name="update_judulberita" value="<?php echo $berita['judulberita']; ?>">
                        <input type="submit" name="update" value="Update">
                    </form>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="delete_idberita" value="<?php echo $berita['idberita']; ?>">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
