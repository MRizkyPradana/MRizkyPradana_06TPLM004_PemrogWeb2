<?php
//misalkankitapunyabilangandengannotasiEsepertiini
$harga = 100000;
$jumlah = 3;
$teks = "PHP";
//jikakitacetakdenganecho:
echo "Harganya adalah Rp$harga<br>";
print " Jumlah$jumlah<br>";
$total = $harga * $jumlah;
//jikakitacetakdenganprintf
printf("Latihan Penggunaan fungsi Printf pada %s<br>", $teks);
printf("Harga barang adalah Rp%.2f<br>", $harga);
printf("Jumlah adalah Rp%d<br>", $jumlah);
printf("Total harga adalah Rp%.2f<br>", $total);
