<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include('includes/db.php');

function fetch_data($conn)
{
    $data = '';
    $sql = "SELECT klasemen.*, negara.nama AS negara FROM klasemen JOIN negara ON klasemen.negara_id = negara.id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $data .= '<tr>
                    <td>' . $row['negara'] . '</td>
                    <td>' . $row['menang'] . '</td>
                    <td>' . $row['seri'] . '</td>
                    <td>' . $row['kalah'] . '</td>
                    <td>' . $row['poin'] . '</td>
                  </tr>';
    }
    return $data;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Klasemen UEFA 2024</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        @media print {
            @page {
                size: landscape;
            }
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Data Klasemen UEFA 2024</h1>
    <table>
        <thead>
            <tr>
                <th>Tim</th>
                <th>Menang</th>
                <th>Seri</th>
                <th>Kalah</th>
                <th>Poin</th>
            </tr>
        </thead>
        <tbody>
            <?= fetch_data($conn); ?>
        </tbody>
    </table>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>

</html>