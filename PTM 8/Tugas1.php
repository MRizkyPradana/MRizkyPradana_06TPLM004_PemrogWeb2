<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Tanggal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #333;
        }

        h2,
        h3 {
            color: #555;
        }

        form {
            margin: 20px 0;
        }

        input[type="date"] {
            padding: 10px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        $currentDate = getdate();
        $currentHour = $currentDate['hours'];
        $greeting = "";

        if ($currentHour < 12) {
            $greeting = "Selamat Pagi";
        } elseif ($currentHour < 15) {
            $greeting = "Selamat Siang";
        } elseif ($currentHour < 18) {
            $greeting = "Selamat Sore";
        } else {
            $greeting = "Selamat Malam";
        }

        echo $greeting;
        ?>
    </h1>
    <h2>Selamat jumpa</h2>
    <h3>Saat ini tanggal <?php echo date('d F Y'); ?></h3>
    <h3>Waktu saat ini <?php echo date('h:i:s A'); ?></h3>

    <form method="post">
        <label for="targetDate">Masukkan tanggal yang diinginkan:</label><br>
        <input type="date" id="targetDate" name="targetDate" required>
        <input type="submit" value="Hitung Selisih Hari">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['targetDate'])) {
        $targetDate = $_POST['targetDate'];
        $currentDateObj = new DateTime();
        $targetDateObj = new DateTime($targetDate);
        $interval = $currentDateObj->diff($targetDateObj);

        echo "<h3>Selisih hari dengan tanggal " . date('d F Y', strtotime($targetDate)) . " adalah " . $interval->days . " hari.</h3>";
    }
    ?>
</body>

</html>