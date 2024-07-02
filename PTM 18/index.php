<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
require 'koneksi.php';

$result = $conn->query("SELECT * FROM plants");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Plant Stock</title>
</head>

<body>
    <h1>Plant Stock</h1>
    <a href="add_plant.php">Add Plant</a>
    <a href="print.php">Print Data</a>
    <form method="GET" action="search.php">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
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
    <a href="logout.php">Logout</a>
</body>

</html>