<?php
function arrayManipulation($n, $queries)
{
    $array = []; //array_fill(0, $n + 1, 0);
    foreach ($queries as $query) {
        $array[$query[0]] = ($array[$query[0]] ?? 0) + $query[2];
        if ($query[1] + 1 <= $n) {
            $array[$query[1] + 1] = ($array[$query[1] + 1] ?? 0) - $query[2];
        }
    }

    $sum = 0;
    $max = 0;
    var_dump($array);
    for ($x = 0; $x <= $n; $x++) {
        if (!isset($array[$x])) {
            continue;
        }
        $sum += $array[$x];
        if ($max < $sum) {
            $max = $sum;
        }
    }

    return $max;
}