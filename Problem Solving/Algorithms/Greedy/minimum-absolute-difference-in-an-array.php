<?php

/*
 * Complete the 'minimumAbsoluteDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */
function minimumAbsoluteDifference($arr)
{
    $min = PHP_INT_MAX;
    sort($arr);
    for ($x = 0, $l = count($arr); $x < $l - 1; $x++) {
        $tmp = abs($arr[$x] - $arr[$x + 1]);
        if ($min > $tmp) {
            $min = $tmp;
        }

    }

    return $min;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = minimumAbsoluteDifference($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
