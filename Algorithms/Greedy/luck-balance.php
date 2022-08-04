<?php

/*
 * Complete the 'luckBalance' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. 2D_INTEGER_ARRAY contests
 */
function luckBalance($k, $contests)
{
    $sum = 0;
    $arr = [];
    foreach ($contests as $contest) {
        if ($contest[1] == 1) {
            $arr[] = $contest[0];
        } else {
            $sum += $contest[0];
        }
    }

    rsort($arr);
    for ($x = 0, $l = count($arr); $x < $l; $x++) {
        $sum += ($x < $k ? 1 : -1) * $arr[$x];
    }

    return $sum;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$k = intval($first_multiple_input[1]);

$contests = array();

for ($i = 0; $i < $n; $i++) {
    $contests_temp = rtrim(fgets(STDIN));

    $contests[] = array_map('intval', preg_split('/ /', $contests_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = luckBalance($k, $contests);

fwrite($fptr, $result . "\n");

fclose($fptr);
