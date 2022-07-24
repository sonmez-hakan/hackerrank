<?php

/*
 * Complete the 'toys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY w as parameter.
 */

function toys($w)
{
    sort($w);
    $min = $w[0];
    $count = 1;
    for ($x = 1, $l = count($w); $x < $l; $x++) {
        if ($w[$x] <= $min + 4) {
            continue;
        }

        $min = $w[$x];
        $count++;
    }

    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$w_temp = rtrim(fgets(STDIN));

$w = array_map('intval', preg_split('/ /', $w_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = toys($w);

fwrite($fptr, $result . "\n");

fclose($fptr);

