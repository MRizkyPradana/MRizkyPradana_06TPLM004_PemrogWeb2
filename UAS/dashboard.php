<?php
session_start();
include 'config.php';

if (!isset($_SESSION['nim'])) {
    header('Location: login.php');
    exit();
}

// Fetch groups and countries data
$groups = $conn->query("SELECT * FROM groups");
$countries = $conn->query("SELECT * FROM countries");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome, <?php echo $_SESSION['nim']; ?></h1>

    <!-- Form to add group -->
    <form method="POST" action="add_group.php">
        <label for="group_name">Add Group:</label>
        <select name="group_name">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <input type="submit" value="Add Group">
    </form>

    <!-- Form to add country -->
    <form method="POST" action="add_country.php">
        <label for="country_name">Country Name:</label>
        <input type="text" name="country_name">
        <label for="group_id">Group:</label>
        <select name="group_id">
            <?php while ($group = $groups->fetch_assoc()) : ?>
                <option value="<?php echo $group['id']; ?>"><?php echo $group['group_name']; ?></option>
            <?php endwhile; ?>
        </select>
        <input type="submit" value="Add Country">
    </form>

    <!-- Display countries data -->
    <table border="1">
        <tr>
            <th>Country</th>
            <th>Group</th>
            <th>Wins</th>
            <th>Draws</th>
            <th>Losses</th>
            <th>Points</th>
            <th>Actions</th>
        </tr>
        <?php while ($country = $countries->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $country['country_name']; ?></td>
                <td><?php echo $country['group_id']; ?></td>
                <td><?php echo $country['wins']; ?></td>
                <td><?php echo $country['draws']; ?></td>
                <td><?php echo $country['losses']; ?></td>
                <td><?php echo $country['points']; ?></td>
                <td>
                    <a href="edit_country.php?id=<?php echo $country['id']; ?>">Edit</a>
                    <a href="delete_country.php?id=<?php echo $country['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="logout.php">Logout</a>
</body>

</html>