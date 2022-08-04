<?php
function plusMinus($arr)
{
    $count = count($arr);
    $counts = [0, 0, 0];
    foreach ($arr as $num) {
        if ($num > 0) {
            $counts[0]++;
        } else if ($num < 0) {
            $counts[1]++;
        } else {
            $counts[2]++;
        }
    }

    foreach ($counts as $c) {
        echo number_format(round($c / $count, 6), 6, null, null) . PHP_EOL;
    }
}
