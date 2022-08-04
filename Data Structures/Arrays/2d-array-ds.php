<?php
function hourglassSum($arr)
{
    $max = PHP_INT_MIN;
    for ($x = 0, $lx = count($arr) - 2; $x < $lx; $x++) {
        for ($y = 0, $ly = count($arr[$x]) - 2; $y < $ly; $y++) {
            $sum = $arr[$x][$y] + $arr[$x][$y + 1] + $arr[$x][$y + 2]
                + $arr[$x + 1][$y + 1]
                + $arr[$x + 2][$y] + $arr[$x + 2][$y + 1] + $arr[$x + 2][$y + 2];

            if ($max < $sum) {
                $max = $sum;
            }
        }
    }

    return $max;
}