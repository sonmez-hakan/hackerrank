<?php
function gameOfThrones($s)
{
    $counts = [];
    for ($x = 0, $l = strlen($s); $x < $l; $x++) {
        @$counts[$s[$x]]++;
    }

    $odd = false;
    foreach ($counts as $count) {
        if ($count % 2 == 1) {
            if ($odd) {
                return 'NO';
            }
            $odd = true;
        }
    }

    return 'YES';
}