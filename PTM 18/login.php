<?php
session_start();
require 'koneksi.php';

// Handle login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        echo "Invalid username or password";
    }
}

// Handle registration
if (isset($_POST['register'])) {
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
            echo "Registration successful. You can now login.";
        } else {
            echo "Error: " . $insert_user_sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login and Register</title>
</head>

<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label>Username: </label>
        <input type="text" name="username" required>
        <br>
        <label>Password: </label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>

    <h2>Register</h2>
    <form method="POST" action="">
        <label>Username: </label>
        <input type="text" name="username" required>
        <br>
        <label>Password: </label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="register">Register</button>
    </form>
</body>

</html>