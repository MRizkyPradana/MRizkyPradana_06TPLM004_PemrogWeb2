<?php
// Mulai session
session_start();

// Hapus cookie tema
setcookie('theme', '', time() - 3600, "/");

// Redirect ke halaman utama
header('Location: ./index.php');
exit();
