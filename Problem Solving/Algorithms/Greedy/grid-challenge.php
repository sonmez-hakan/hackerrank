<?php


/*
 * Complete the 'gridChallenge' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING_ARRAY grid as parameter.
 */

function gridChallenge($grid)
{
    $chars = [];
    foreach ($grid as $row) {
        $split = str_split($row);
        sort($split);
        $chars[] = $split;
    }

    $count = count($grid);
    for ($x = 0; $x < $count; $x++) {
        $column = [];
        for ($y = 0; $y < $count; $y++) {
            $column[] = $chars[$y][$x];
        }
        $sorted = $column;
        sort($sorted);
        if ($sorted !== $column) {
            return 'NO';
        }
    }

    return 'YES';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $grid = array();

    for ($i = 0; $i < $n; $i++) {
        $grid_item = rtrim(fgets(STDIN), "\r\n");
        $grid[] = $grid_item;
    }

    $result = gridChallenge($grid);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
