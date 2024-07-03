<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include('includes/db.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Data Group A</h1>
    <table>
        <thead>
            <tr>
                <th>Tim</th>
                <th>Menang</th>
                <th>Seri</th>
                <th>Kalah</th>
                <th>Poin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT klasemen.*, negara.nama AS negara FROM klasemen JOIN negara ON klasemen.negara_id = negara.id";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['negara']}</td>
                    <td>{$row['menang']}</td>
                    <td>{$row['seri']}</td>
                    <td>{$row['kalah']}</td>
                    <td>{$row['poin']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a>
                        <a href='delete.php?id={$row['id']}'>Hapus</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="add.php">Tambah Data</a>
    <a href="generate_pdf.php">Cetak PDF</a>
    <a href="logout.php">Logout</a>
</body>

</html>