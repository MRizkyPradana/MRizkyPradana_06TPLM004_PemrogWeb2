<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include('includes/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM klasemen WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $negara_id = $_POST['negara_id'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $poin = $_POST['poin'];

    $sql = "UPDATE klasemen SET negara_id='$negara_id', menang='$menang', seri='$seri', kalah='$kalah', poin='$poin' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: dashboard.php');
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data</title>
</head>

<body>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <select name="negara_id">
            <?php
            $sql = "SELECT * FROM negara";
            $result = $conn->query($sql);
            while ($negara = $result->fetch_assoc()) {
                $selected = ($negara['id'] == $row['negara_id']) ? 'selected' : '';
                echo "<option value='{$negara['id']}' $selected>{$negara['nama']}</option>";
            }
            ?>
        </select>
        <input type="number" name="menang" placeholder="Menang" value="<?php echo $row['menang']; ?>" required>
        <input type="number" name="seri" placeholder="Seri" value="<?php echo $row['seri']; ?>" required>
        <input type="number" name="kalah" placeholder="Kalah" value="<?php echo $row['kalah']; ?>" required>
        <input type="number" name="poin" placeholder="Poin" value="<?php echo $row['poin']; ?>" required>
        <button type="submit">Update</button>
    </form>
    <?php if (isset($error)) {
        echo $error;
    } ?>
</body>

</html>