<?php

/*
 * Complete the 'maximizingXor' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER l
 *  2. INTEGER r
 */
function maximizingXor($l, $r)
{
    $max = PHP_INT_MIN;
    for ($x = $l; $x <= $r; $x++) {
        for ($y = $l; $y <= $r; $y++) {
            $tmp = $x ^ $y;
            if ($tmp > $max) {
                $max = $tmp;
            }
        }
    }

    return $max;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$l = intval(trim(fgets(STDIN)));

$r = intval(trim(fgets(STDIN)));

$result = maximizingXor($l, $r);

fwrite($fptr, $result . "\n");

fclose($fptr);

