<?php
function insertionSort2($n, $arr)
{
    for ($step = 1; $step < $n; $step++) {
        $key = $arr[$step];
        $j = $step - 1;

        while ($j >= 0 && $key < $arr[$j]) {
            $arr[$j + 1] = $arr[$j];
            --$j;
        }

        $arr[$j + 1] = $key;
        print implode(' ', $arr) . PHP_EOL;
    }
}