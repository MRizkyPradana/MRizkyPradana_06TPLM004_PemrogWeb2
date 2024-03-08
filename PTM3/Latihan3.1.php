<?php
$ball = 'purple';

switch ($ball) {
    case 'red':
        $redbox = $ball;
        echo "redbox: $redbox<br>\n";
        break;
    case 'yellow':
        $yellowbox = $ball;
        echo "yellowbox: $yellowbox<br>\n";
        break;
    case 'blue':
        $bluebox = $ball;
        echo "bluebox: $bluebox<br>\n";
        break;
    case 'green':
        $greenbox = $ball;
        echo "greenbox: $greenbox<br>\n";
        break;
    case 'purple':
        $purplebox = $ball;
        echo "purplebox: $purplebox<br>\n";
        break;
    default:
        $colorlessbox = $ball;
        echo "colorlessbox: $colorlessbox<br>\n";
}
?>
