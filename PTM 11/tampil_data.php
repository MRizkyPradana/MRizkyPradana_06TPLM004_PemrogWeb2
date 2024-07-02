<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_latihan11");
$hasil = mysqli_query($koneksi, "SELECT * FROM tbl_mhs");
while ($data = mysqli_fetch_row($hasil)) {
    echo "$data[0] $data[1] $data[2]<br>";
}
