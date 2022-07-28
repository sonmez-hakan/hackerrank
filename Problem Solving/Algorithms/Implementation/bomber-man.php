<?php

/*
 * Complete the 'bomberMan' function below.
 *
 * The function is expected to return a STRING_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. STRING_ARRAY grid
 */
function bomberMan($n, $grid)
{
    if ($n == 1) {
        return $grid;
    }

    if ($n % 2 == 0) {
        return array_fill(0, count($grid), str_repeat('O', strlen($grid[0])));
    }

    $firstExploded = fillExploded($grid);
    switch ($n % 4) {
        case 1:
            return fillExploded($firstExploded);
        case 3:
            return $firstExploded;
    }
}

function fillExploded($grid)
{
    $exploded = [];
    for ($x = 0, $r = count($grid); $x < $r; $x++) {
        $exploded[$x] = '';
        for ($y = 0, $c = strlen($grid[$x]); $y < $c; $y++) {
            if ($grid[$x][$y] == 'O'
                || ($x > 0 && $grid[$x - 1][$y] == 'O')
                || ($x < $r - 1 && $grid[$x + 1][$y] == 'O')
                || ($y > 0 && $grid[$x][$y - 1] == 'O')
                || ($y < $c - 1 && $grid[$x][$y + 1] == 'O')
            ) {
                $exploded[$x][$y] = '.';
            } else {
                $exploded[$x][$y] = 'O';
            }
        }
    }

    return $exploded;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$r = intval($first_multiple_input[0]);

$c = intval($first_multiple_input[1]);

$n = intval($first_multiple_input[2]);

$grid = array();

for ($i = 0; $i < $r; $i++) {
    $grid_item = rtrim(fgets(STDIN), "\r\n");
    $grid[] = $grid_item;
}

$result = bomberMan($n, $grid);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
