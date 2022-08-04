<?php


/*
 * Complete the 'missingNumbers' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY arr
 *  2. INTEGER_ARRAY brr
 */

function missingNumbers($arr, $brr)
{

    $countsA = [];
    foreach ($arr as $a) {
        @$countsA[$a]++;
    }

    $countsB = [];
    foreach ($brr as $b) {
        @$countsB[$b]++;
    }

    $diff = [];
    foreach ($countsB as $num => $freq) {
        $f = $countsA[$num] ?? 0;
        if ($freq > $f) {
            $diff[] = $num;
        }
    }

    sort($diff);

    return $diff;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$m = intval(trim(fgets(STDIN)));

$brr_temp = rtrim(fgets(STDIN));

$brr = array_map('intval', preg_split('/ /', $brr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = missingNumbers($arr, $brr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
