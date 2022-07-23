<?php
function superReducedString($s)
{
    $l = strlen($s);
    for ($x = 0; $x < $l - 1; $x++) {
        if ($s[$x] == $s[$x + 1]) {
            $s = substr_replace($s, '', $x, 2);
            $l -= 2;
            $x = $x > 2 ? $x - 2 : -1;
        }
    }

    return $s ?: 'Empty String';
}