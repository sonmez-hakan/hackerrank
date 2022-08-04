<?php
function closestNumbers($arr) {
    sort($arr);
    $min = PHP_INT_MAX;
    $results = [];
    for ($x = 0, $l = count($arr) - 1; $x < $l; $x++) {
        $tmp = $arr[$x + 1] - $arr[$x];
        if ($tmp < $min) {
            $min = $tmp;
            $results = [];
        }

        if ($tmp == $min) {
            $results[] = $arr[$x];
            $results[] = $arr[$x + 1];
        }
    }

    return $results;
}
