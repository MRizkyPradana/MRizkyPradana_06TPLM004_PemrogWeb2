<?php
$con = mysqli_connect("localhost", "root", "", "db_latihan11");
$hasil = mysqli_query($con, "SELECT * FROM tbl_mhs");
while ($data = mysqli_fetch_array($hasil)) {
    echo $data['FirstName'] . $data['LastName'] . $data['Age'] . "<br>";
}
