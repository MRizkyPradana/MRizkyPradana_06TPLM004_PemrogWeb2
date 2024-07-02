<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group = $_POST['group'];
    $country = $_POST['country'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];

    $stmt = $conn->prepare("INSERT INTO standings (group_name, country, wins, draws, losses) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiii", $group, $country, $wins, $draws, $losses);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT * FROM standings");
?>

<!DOCTYPE html>
<html>

<head>
    <title>UEFA 2024 Standings</title>
</head>

<body>
    <form method="POST">
        Group: <select name="group">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select><br>
        Country: <input type="text" name="country" required><br>
        Wins: <input type="number" name="wins" required><br>
        Draws: <input type="number" name="draws" required><br>
        Losses: <input type="number" name="losses" required><br>
        <input type="submit" value="Add">
    </form>

    <h2>Standings</h2>
    <table border="1">
        <tr>
            <th>Group</th>
            <th>Country</th>
            <th>Wins</th>
            <th>Draws</th>
            <th>Losses</th>
            <th>Points</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['group_name'] ?></td>
                <td><?= $row['country'] ?></td>
                <td><?= $row['wins'] ?></td>
                <td><?= $row['draws'] ?></td>
                <td><?= $row['losses'] ?></td>
                <td><?= $row['points'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="generate_pdf.php">Download PDF</a>
</body>

</html>