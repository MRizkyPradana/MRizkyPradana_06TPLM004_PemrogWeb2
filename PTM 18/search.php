<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
require 'koneksi.php';

$query = $_GET['query'];
$result = $conn->query("SELECT * FROM plants WHERE name LIKE '%$query%'");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Results</title>
</head>

<body>
    <h1>Search Results</h1>
    <a href="index.php">Back</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <a href="edit_plant.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_plant.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>