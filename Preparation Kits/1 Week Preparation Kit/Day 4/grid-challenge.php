<?php
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