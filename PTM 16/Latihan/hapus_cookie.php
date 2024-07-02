<?php
// Set the expiration date to one hour ago to delete the cookies
setcookie("username", "", time() - 3600);
setcookie("namalengkap", "", time() - 3600);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Penghapusan Cookie</title>
</head>

<body>
    <h1>Cookie Berhasil Dihapus.</h1>
    <h2>Klik <a href='buat_cookie.php'>disini</a> untuk buat cookies</h2>
    <h2>Klik <a href='lihat_cookie.php'>disini</a> untuk melihat isi cookie</h2>
</body>

</html>