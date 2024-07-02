<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Cek apakah username sudah ada
    $check_user_sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose another one.";
    } else {
        // Simpan user baru ke database
        $insert_user_sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($insert_user_sql) === TRUE) {
            echo "Registration successful. You can now <a href='login.php'>login</a>.";
        } else {
            echo "Error: " . $insert_user_sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <form method="POST" action="register.php">
        <label>Username: </label>
        <input type="text" name="username" required>
        <br>
        <label>Password: </label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Register</button>
    </form>
</body>

</html>