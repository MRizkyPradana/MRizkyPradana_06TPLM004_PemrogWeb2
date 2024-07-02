<?php
session_start();
include 'config.php';

if (!isset($_SESSION['nim'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $country = $conn->query("SELECT * FROM countries WHERE id=$id")->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = ($wins * 3) + ($draws * 1);

    $sql = "UPDATE countries SET wins=$wins, draws=$draws, losses=$losses, points=$points WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Country updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header('Location: dashboard.php');
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $country['id']; ?>">
    Wins: <input type="number" name="wins" value="<?php echo $country['wins']; ?>"><br>
    Draws: <input type="number" name="draws" value="<?php echo $country['draws']; ?>"><br>
    Losses: <input type="number" name="losses" value="<?php echo $country['losses']; ?>"><br>
    <input type="submit" value="Update Country">
</form>