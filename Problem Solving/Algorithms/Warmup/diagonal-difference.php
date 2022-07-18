<?php
function diagonalDifference($arr)
{
    $count = count($arr);
    $c = $count - 1;
    $d1 = 0;
    $d2 = 0;
    for ($x = 0; $x <= $count; $x++) {
        $d1 += $arr[$x][$x];
        $d2 += $arr[$c][$x];
        $c--;
    }

    return abs($d1 - $d2);
}
