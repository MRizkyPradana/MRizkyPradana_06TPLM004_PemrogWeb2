<?php
// Tangkap data dari form
$theme = isset($_POST['theme']) ? $_POST['theme'] : 'light';

// Set cookie dengan preferensi tema
setcookie('theme', $theme, time() + (30 * 24 * 60 * 60), "/"); // Cookie berlaku selama 30 hari

// Redirect ke halaman utama
header('Location: ./index.php');
exit();
