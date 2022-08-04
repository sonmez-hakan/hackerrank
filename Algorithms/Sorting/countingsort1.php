<?php
function countingSort($arr)
{
    $frequency = array_fill(0, 100, 0);
    foreach ($arr as $a) {
        $frequency[$a]++;
    }

    return $frequency;
}
