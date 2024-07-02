<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_latihan11");
$hasil1 = mysqli_query($koneksi, "SELECT * FROM tbl_mhs");
$hit1 = mysqli_num_rows($hasil1);
echo "Jumlah record: " . $hit1;
