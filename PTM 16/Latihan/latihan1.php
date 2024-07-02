<?php
// Set cookies
setcookie('user[nama]', 'joko', time() + (60 * 60), '/');
setcookie('user[hobi]', 'berenang', time() + (60 * 60), '/');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Set Cookie</title>
</head>

<body>
    <p>Cookies have been set.</p>
    <p>Cookie 'nama': <?php echo isset($_COOKIE['user']['nama']) ? $_COOKIE['user']['nama'] : 'not set'; ?></p>
    <p>Cookie 'hobi': <?php echo isset($_COOKIE['user']['hobi']) ? $_COOKIE['user']['hobi'] : 'not set'; ?></p>
</body>

</html>