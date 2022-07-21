<?php
function runningTime($arr)
{
    $shifts = 0;
    for ($step = 1, $count = count($arr); $step < $count; $step++) {
        $key = $arr[$step];
        $j = $step - 1;

        while ($j >= 0 && $key < $arr[$j]) {
            $arr[$j + 1] = $arr[$j];
            --$j;
            $shifts++;
        }

        $arr[$j + 1] = $key;
    }

    return $shifts;
}