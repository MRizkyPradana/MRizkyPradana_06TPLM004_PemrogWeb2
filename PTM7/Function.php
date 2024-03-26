<?php
function count_vowels($string) {
    // Menggunakan ekspresi reguler untuk menghitung huruf hidup
    $vowels = preg_match_all('/[aeiou]/i', $string, $matches);
    
    // Mengembalikan jumlah huruf hidup
    return $vowels;
}

// Contoh penggunaan
$text = "Halo, ini adalah contoh teks!";
echo "Jumlah huruf hidup dalam teks adalah: " . count_vowels($text);
?>
