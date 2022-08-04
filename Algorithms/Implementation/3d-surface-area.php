<?php


/*
 * Complete the 'surfaceArea' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY A as parameter.
 */

function surfaceArea($A)
{
    $H = count($A);
    $W = count($A[0]);
    $area = 2 * $H * $W;
    for ($x = 0; $x < $H; $x++) {
        for ($y = 0; $y < $W; $y++) {
            $area += max($A[$x][$y] - ($A[$x - 1][$y] ?? 0), 0);
            $area += max($A[$x][$y] - ($A[$x][$y + 1] ?? 0), 0);
            $area += max($A[$x][$y] - ($A[$x + 1][$y] ?? 0), 0);
            $area += max($A[$x][$y] - ($A[$x][$y - 1] ?? 0), 0);
        }
    }

    return $area;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$H = intval($first_multiple_input[0]);

$W = intval($first_multiple_input[1]);

$A = array();

for ($i = 0; $i < $H; $i++) {
    $A_temp = rtrim(fgets(STDIN));

    $A[] = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = surfaceArea($A);

fwrite($fptr, $result . "\n");

fclose($fptr);
