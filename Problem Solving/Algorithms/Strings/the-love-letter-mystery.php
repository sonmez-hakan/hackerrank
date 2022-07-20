<?php
function theLoveLetterMystery($s)
{
    $l = strlen($s);
    $diff = 0;
    for ($x = 0, $n = (int)($l / 2); $x < $n; $x++) {
        $diff += abs(ord($s[$x]) - ord($s[$l - 1 - $x]));
    }

    return $diff;
}
