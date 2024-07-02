<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
require 'koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM plants WHERE id=$id");
$plant = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $sql = "UPDATE plants SET name='$name', stock='$stock', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Plant</title>
</head>

<body>
    <h1>Edit Plant</h1>
    <form method="POST" action="edit_plant.php?id=<?php echo $id; ?>">
        <label>Name: </label>
        <input type="text" name="name" value="<?php echo $plant['name']; ?>" required>
        <br>
        <label>Stock: </label>
        <input type="number" name="stock" value="<?php echo $plant['stock']; ?>" required>
        <br>
        <label>Description: </label>
        <textarea name="description" required><?php echo $plant['description']; ?></textarea>
        <br>
        <button type="submit">Update</button>
    </form>
</body>

</html>