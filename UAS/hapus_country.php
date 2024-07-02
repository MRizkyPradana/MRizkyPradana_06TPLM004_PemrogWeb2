<?php
session_start();
include 'config.php';

if (!isset($_SESSION['nim'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM countries WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Country deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header('Location: dashboard.php');
}
