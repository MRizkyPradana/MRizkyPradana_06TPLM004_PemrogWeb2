<?php
// Mulai session
session_start();
session_destroy();

// Hapus cookie login jika ada
if (isset($_COOKIE['login'])) {
    setcookie("login", "", time() - 3600, "/"); // Tambahkan path untuk memastikan cookie dihapus di seluruh domain
}

// Redirect ke halaman login
header('Location: ./login.php');
exit();
