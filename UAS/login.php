<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE nim='$nim'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['nim'] = $user['nim'];
            header('Location: dashboard.php');
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found";
    }
}
?>

<form method="POST">
    NIM: <input type="text" name="nim"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>