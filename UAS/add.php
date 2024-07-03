<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['negara_id']) && !empty($_POST['negara_id'])) {
        $negara_id = $_POST['negara_id'];
        $menang = $_POST['menang'];
        $seri = $_POST['seri'];
        $kalah = $_POST['kalah'];
        $poin = $_POST['poin'];

        // Periksa apakah negara_id ada di tabel negara
        $sql_check = "SELECT id FROM negara WHERE id='$negara_id'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            $sql = "INSERT INTO klasemen (negara_id, menang, seri, kalah, poin) VALUES ('$negara_id', '$menang', '$seri', '$kalah', '$poin')";
            if ($conn->query($sql) === TRUE) {
                header('Location: dashboard.php');
            } else {
                $error = "Error: " . $conn->error;
            }
        } else {
            $error = "Negara ID tidak valid.";
        }
    } else {
        $error = "Negara ID harus dipilih.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data</title>
</head>

<body>
    <form method="post" action="">
        <select name="negara_id" required>
            <option value="">Pilih Negara</option>
            <?php
            $sql = "SELECT * FROM negara WHERE nama IN ('Jerman', 'Swiss', 'Hongaria', 'Skotlandia')";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nama']}</option>";
            }
            ?>
        </select>
        <input type="number" name="menang" placeholder="Menang" required>
        <input type="number" name="seri" placeholder="Seri" required>
        <input type="number" name="kalah" placeholder="Kalah" required>
        <input type="number" name="poin" placeholder="Poin" required>
        <button type="submit">Tambah</button>
    </form>
    <?php if (isset($error)) {
        echo $error;
    } ?>
</body>

</html>