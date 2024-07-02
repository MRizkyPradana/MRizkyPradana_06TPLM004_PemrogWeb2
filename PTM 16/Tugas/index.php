<?php
// Mulai session
session_start();

// Baca cookie tema
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            transition: background-color 0.5s, color 0.5s;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        body.light {
            background-color: #f4f4f4;
            color: #333;
        }

        body.dark {
            background-color: #333;
            color: #f4f4f4;
        }

        .container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        body.dark .container {
            background: #444;
            color: white;
        }

        h1 {
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s, border 0.3s;
        }

        a:hover {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        a:active {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body class="<?php echo $theme; ?>">
    <div class="container">
        <h1>Selamat Datang</h1>
        <p>Silahkan Anda Pilih : <?php echo htmlspecialchars($theme); ?></p>
        <p>
            <a href="./set_theme.php">Set Theme Preference</a>
        </p>
        <p>
            <a href="./reset_theme.php">Reset Theme Preference</a>
        </p>
    </div>
</body>

</html>