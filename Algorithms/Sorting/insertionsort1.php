<?php
function insertionSort1($n, $arr)
{
    for ($step = 1; $step < $n; $step++) {
        $key = $arr[$step];
        $j = $step - 1;

        $show = false;
        while ($j >= 0 && $key < $arr[$j]) {
            $arr[$j + 1] = $arr[$j];
            --$j;
            $show = true;
            print implode(' ', $arr) . PHP_EOL;
        }

        $arr[$j + 1] = $key;
        if ($show) {
            return print implode(' ', $arr) . PHP_EOL;
        }
    }
}