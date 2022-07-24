<?php

/*
 * Complete the 'flippingMatrix' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY matrix as parameter.
 */
function flippingMatrix($matrix)
{
    $s = 0;
    $c = count($matrix);
    for ($x = 0, $l = (int)($c / 2); $x < $l; $x++) {
        for ($y = 0; $y < $l; $y++) {
            $s += max(
                $matrix[$x][$y],
                $matrix[$c - 1 - $x][$y],
                $matrix[$x][$c - 1 - $y],
                $matrix[$c - 1 - $x][$c - 1 - $y]
            );
        }
    }

    return $s;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $matrix = array();

    for ($i = 0; $i < (2 * $n); $i++) {
        $matrix_temp = rtrim(fgets(STDIN));

        $matrix[] = array_map('intval', preg_split('/ /', $matrix_temp, -1, PREG_SPLIT_NO_EMPTY));
    }

    $result = flippingMatrix($matrix);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

