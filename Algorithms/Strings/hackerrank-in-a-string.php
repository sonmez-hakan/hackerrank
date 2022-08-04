<?php
function hackerrankInString($s)
{
    $h = 'hackerrank';
    $i = 0;
    for ($x = 0, $l = strlen($s); $x < $l; $x++) {
        if ($h[$i] == $s[$x] && ++$i > 9) {
            return 'YES';
        }
    }

    return 'NO';
}