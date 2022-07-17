<?php
function superDigit($n, $k)
{
    $sum = 0;
    for ($x = 0, $l = strlen($n); $x < $l; $x++) {
        $sum += (int)$n[$x];
    }
    $sum *= $k;
    if ($sum > 10) {
        return superDigit((string)$sum, 1);
    }

    return $sum;
}