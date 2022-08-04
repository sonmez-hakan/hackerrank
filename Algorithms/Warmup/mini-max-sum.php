<?php
function miniMaxSum($arr)
{
    $max = PHP_INT_MIN;
    $min = PHP_INT_MAX;
    $sum = 0;
    foreach ($arr as $num) {
        if ($num > $max) {
            $max = $num;
        }

        if ($num < $min) {
            $min = $num;
        }

        $sum += $num;
    }

    echo ($sum - $max) . " " . ($sum - $min);
}
