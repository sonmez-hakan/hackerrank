<?php

/*
 * Complete the 'pairs' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY arr
 */
function pairs($k, $arr)
{
    rsort($arr);
    $count = 0;
    for ($x = 0, $l = count($arr); $x < $l - 1; $x++) {
        for ($y = $x + 1; $y < $l; $y++) {
            $diff = $arr[$x] - $arr[$y];
            if ($diff < $k) {
                continue;
            } elseif ($diff == $k) {
                $count++;
            } else {
                break;
            }
        }
    }

    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$k = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = pairs($k, $arr);

fwrite($fptr, $result . "\n");

fclose($fptr);

