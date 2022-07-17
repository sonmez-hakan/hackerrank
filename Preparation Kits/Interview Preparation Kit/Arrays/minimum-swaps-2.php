<?php
function minimumSwaps($arr) {
    $swaps = 0;
    for ($x = 0, $c = count($arr); $x < $c - 1; $x++) {
        $z = $x + 1;
        if ($z == $arr[$x]) {
            continue;
        }
        $arrX = $arr[$x];
        $arr[$x] = $arr[$arrX - 1];
        $arr[$arrX - 1] = $arrX;
        $swaps++;
        $x--;
    }

    return $swaps;
}
