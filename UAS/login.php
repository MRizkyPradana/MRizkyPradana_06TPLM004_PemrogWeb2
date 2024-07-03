<?php
session_start();
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header('Location: dashboard.php');
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Username tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        .button-container {
            display: flex;
            align-items: center;
        }

        .button-container button,
        .button-container a {
            margin: 0 5px;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
        }

        .button-container a {
            width: auto;
            /* Adjust the width as needed */
            padding: 10px 15px;
            /* Smaller padding for smaller button */
        }

        .button-container button:hover,
        .button-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <div class="button-container">
            <button type="submit">Login</button>
            <a href="register.php">Registrasi</a>
        </div>
    </form>
    <?php if (isset($error)) {
        echo $error;
    } ?>
</body>

</html>