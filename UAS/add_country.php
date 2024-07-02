<?php
session_start();
include 'config.php';

if (!isset($_SESSION['nim'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $country_name = $_POST['country_name'];
    $group_id = $_POST['group_id'];

    $sql = "INSERT INTO countries (country_name, group_id) VALUES ('$country_name', $group_id)";
    if ($conn->query($sql) === TRUE) {
        echo "New country added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header('Location: dashboard.php');
}
