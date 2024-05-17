<?php
//Koneksi ke database menggunakan PDO-->
$db_host = 'localhost'; 
$db_name = 'db_berita'; 
$db_user = 'root'; 
$db_pass = ''; 

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

//Tambah data disubmit-->
if(isset($_POST['submit'])) {
    $idkategori = $_POST['idkategori'];
    $namakategori = $_POST['namakategori'];

//Masukkan record baru pada tbl_kategori-->
    $sql = "INSERT INTO tbl_kategori (idkategori, namakategori) VALUES (:idkategori, :namakategori)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkategori', $idkategori);
    $stmt->bindParam(':namakategori', $namakategori);

//Eksekusi statement-->
    try {
        $stmt->execute();
        echo "Record berhasil ditambahkan.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Update data disubmit-->
if(isset($_POST['update'])) {
    $idkategori = $_POST['update_idkategori'];
    $namakategori = $_POST['update_namakategori'];

//Update record dari tbl_kategori-->
    $sql = "UPDATE tbl_kategori SET namakategori = :namakategori WHERE idkategori = :idkategori";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkategori', $idkategori);
    $stmt->bindParam(':namakategori', $namakategori);

//Eksekusi statement-->
    try {
        $stmt->execute();
        echo "Record berhasil diupdate.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Delete data disubmit-->
if(isset($_POST['delete'])) {
    $idkategori = $_POST['delete_idkategori'];

//Hapus record dari tbl_kategori-->
    $sql = "DELETE FROM tbl_kategori WHERE idkategori = :idkategori";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkategori', $idkategori);

//Eksekusi statement-->
    try {
        $stmt->execute();
        echo "Record berhasil dihapus.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Ambil data kategori dari tabel-->
$sql_select = "SELECT * FROM tbl_kategori";
$stmt_select = $pdo->query($sql_select);
$categories = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Kategori Dana</title>
</head>
<body>
    <h2>Form Kategori</h2>
    <form method="post">
        <label for="idkategori">ID Kategori:</label>
        <input type="text" id="idkategori" name="idkategori"><br><br>
        
        <label for="namakategori">Nama Kategori:</label>
        <select id="namakategori" name="namakategori">
            <option value="sosial">Sosial</option>
            <option value="budaya">Budaya</option>
            <option value="teknologi">Teknologi</option>
        </select><br><br>

        <input type="submit" name="submit" value="Tambah">
    </form>

    <h2>Data Kategori</h2>
    <table border="1">
        <tr>
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
            <th>Action</th>
        </tr>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['idkategori']; ?></td>
                <td><?php echo $category['namakategori']; ?></td>
                <td>
                    <form method="post"  style="display: inline;">
                        <input type="hidden" name="update_idkategori" value="<?php echo $category['idkategori']; ?>">
                        <input type="text" name="update_namakategori" value="<?php echo $category['namakategori']; ?>">
                        <input type="submit" name="update" value="Update">
                    </form>
                        <form method="post"  style="display: inline;">
                        <input type="hidden" name="delete_idkategori" value="<?php echo $category['idkategori']; ?>">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


