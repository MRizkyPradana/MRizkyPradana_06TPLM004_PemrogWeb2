<?php
// Static variabel
$user = 'admin';
$pass = md5('admin');

// Memulai session
session_start();

// Tampung data dari form
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Cek login dari form
if ($username == $user && md5($password) == $pass) {
    // Set session login
    $_SESSION['login'] = TRUE;
    // Cek remember me
    if (isset($_POST['remember'])) {
        // Set cookie dengan nama pengguna
        setcookie('username', $username, time() + (30 * 24 * 60 * 60), "/"); // Cookie berlaku selama 30 hari
    } else {
        // Hapus cookie jika tidak dicentang
        setcookie('username', '', time() - 3600, "/");
    }
    // Redirect ke halaman utama
    header('Location: ./home.php');
    exit();
} else {
    header('Location: ./login.php');
    exit();
}
