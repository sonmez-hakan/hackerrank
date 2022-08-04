<?php
function birthday($s, $d, $m)
{
    $total = 0;
    $count = count($s);
    for ($x = 0; $x < $count; $x++) {
        $sum = $s[$x];
        if ($x + $m > $count) {
            break;
        }
        for ($y = $x + 1, $limit = $x + $m; $y < $limit; $y++) {
            $sum += $s[$y];
        }
        $total += $sum == $d ? 1 : 0;
    }

    return $total;
}
