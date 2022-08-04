<?php
function countingSort($arr)
{
    $frequency = array_fill(0, 100, 0);
    foreach ($arr as $a) {
        $frequency[$a]++;
    }

    $result = [];
    foreach ($frequency as $num => $fr) {
        for ($x = 0; $x < $fr; $x++) {
            $result[] = $num;
        }
    }

    return $result;
}