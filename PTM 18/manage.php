<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('db.php');

if (isset($_POST['search'])) {
    $search_term = $_POST['search_term'];
    $sql = "SELECT * FROM plants WHERE name LIKE '%$search_term%'";
} else {
    $sql = "SELECT * FROM plants";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Manage Plants</title>
</head>

<body>
    <h1>Manage Plants</h1>
    <a href="add.php">Add New Plant</a> | <a href="logout.php">Logout</a>
    <form method="post" action="">
        <input type="text" name="search_term" placeholder="Search plants...">
        <input type="submit" name="search" value="Search">
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>