<?php

/*
 * Complete the 'beautifulPairs' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY A
 *  2. INTEGER_ARRAY B
 */
function beautifulPairs($A, $B) {
    $countsA = [];
    foreach ($A as $a) {
        @$countsA[$a]++;
    }

    $countsB = [];
    foreach ($B as $b) {
        @$countsB[$b]++;
    }

    $result = 0;
    foreach ($countsA as $num => $value) {
        if (isset($countsB[$num])) {
            if ($countsB[$num] == $value) {
                $result += $value;
                continue;
            }

            $result += $countsB[$num] > $value ? $value : $countsB[$num];
        }
    }

    return $result + ($result == count($A) ? -1 : 1);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$A_temp = rtrim(fgets(STDIN));

$A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));

$B_temp = rtrim(fgets(STDIN));

$B = array_map('intval', preg_split('/ /', $B_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = beautifulPairs($A, $B);

fwrite($fptr, $result . "\n");

fclose($fptr);

