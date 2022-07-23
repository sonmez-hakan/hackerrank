<?php
/*
 * Complete the 'superDigit' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. STRING n
 *  2. INTEGER k
 */
function superDigit($n, $k)
{
    $sum = 0;
    for ($x = 0, $l = strlen($n); $x < $l; $x++) {
        $sum += (int)$n[$x];
    }
    $sum *= $k;
    if ($sum > 10) {
        return superDigit((string)$sum, 1);
    }

    return $sum;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = $first_multiple_input[0];

$k = intval($first_multiple_input[1]);

$result = superDigit($n, $k);

fwrite($fptr, $result . "\n");

fclose($fptr);
