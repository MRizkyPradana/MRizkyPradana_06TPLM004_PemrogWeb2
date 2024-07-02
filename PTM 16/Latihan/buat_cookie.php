<?php
// Set cookies
$value = 'rahadian';
$value2 = 'rahadiramelan';
setcookie("username", $value);
setcookie("namalengkap", $value2, time() + 3600); // expire in 1 hour
?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Pembuatan Cookie</title>
</head>

<body>
    <h1>Halaman Pembuatan Cookie</h1>
    <h2>Klik <a href='lihat_cookie.php'>disini</a> untuk lihat cookie</h2>
</body>

</html>