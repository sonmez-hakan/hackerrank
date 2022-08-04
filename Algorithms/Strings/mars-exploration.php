<?php
function marsExploration($s)
{
    $count = 0;
    for ($x = 0, $l = strlen($s); $x < $l; $x++) {
        if ($x % 3 == 1) {
            $count += $s[$x] == 'O' ? 0 : 1;
        } else {
            $count += $s[$x] == 'S' ? 0 : 1;
        }
    }

    return $count;
}