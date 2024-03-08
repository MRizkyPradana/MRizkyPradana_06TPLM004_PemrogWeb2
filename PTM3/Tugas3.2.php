<?php
$C = 123; // variable global

function Test() {
    global $C; // variable local
    echo "C pada fungsi berisi = $C \n";
}

Test();

switch (isset($C)) {
    case true:
        echo "C diluar fungsi berisi = $C \n";
        break;
    case false:
        echo "C tidak diatur di luar fungsi \n";
        break;
}
?>
