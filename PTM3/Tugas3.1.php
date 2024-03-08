<?php
$C = 123; // variable global

function Test() {
    global $C; // variable local
    echo "C pada fungsi berisi = $C \n";
}

Test();

if (isset($C)) {
    echo "C diluar fungsi berisi = $C \n";
} else {
    echo "C tidak diatur di luar fungsi \n";
}
?>
