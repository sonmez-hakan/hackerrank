<?php
function countTriplets($arr, $r) {
    $right = array_count_values($arr);
    $left = [];
    $count = 0;
    foreach ($arr as $a) {

        if (!isset($left[$a])) {
            $left[$a] = 0;
        }

        if (isset($right[$a])) {
            $right[$a]--;
        }

        if ($a % $r != 0) {
            $left[$a]++;
            continue;
        }

        $val1 = (int)($a / $r);
        if (!isset($left[$val1])) {
            $left[$a]++;
            continue;
        }

        $val2 = (int)($a * $r);
        if (isset($right[$val2])) {
            $count += $left[$val1] * 1 * $right[$val2];
        }

        $left[$a]++;
    }

    return $count;
}