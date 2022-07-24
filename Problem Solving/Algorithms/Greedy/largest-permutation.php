<?php

/*
 * Complete the 'largestPermutation' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY arr
 */
function largestPermutation($k, $arr) {
    $l = count($arr);
    $rev = array_flip($arr);
    for ($x = 0; $x < $l && $k > 0; $x++) {
        if ($arr[$x] == $l - $x) {
            continue;
        }

        $ax = $arr[$x];
        $rx = $rev[$ax];

        $rl = $rev[$l - $x];
        $al = $arr[$rl];

        $arr[$x] = $l - $x;
        $arr[$rl] = $ax;

        $rev[$ax] = $rl;
        $rev[$al] = $rx;

        $k--;
    }

    return $arr;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$k = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = largestPermutation($k, $arr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
