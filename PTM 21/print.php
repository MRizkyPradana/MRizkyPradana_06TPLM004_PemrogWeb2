<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require 'koneksi.php';

// Query untuk mendapatkan data tanaman
$query = "SELECT * FROM plants";
$result = $conn->query($query);

// Membuat file CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="plant_stock.csv"');

$output = fopen('php://output', 'w');

// Menulis header
fputcsv($output, array('ID', 'Name', 'Stock', 'Description'));

// Menulis data ke CSV
while ($plant = $result->fetch_assoc()) {
    fputcsv($output, $plant);
}

fclose($output);
exit;
