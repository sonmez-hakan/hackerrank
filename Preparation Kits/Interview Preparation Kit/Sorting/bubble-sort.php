<?php
function countSwaps($a) {
    $swap = 0;
    for ($i = 0, $n = count($a); $i < $n; $i++) {
        for ($j = 0; $j < $n - 1; $j++) {
            if ($a[$j] > $a[$j + 1]) {
                $tmp = $a[$j];
                $a[$j] = $a[$j + 1];
                $a[$j + 1] = $tmp;
                $swap++;
            }
        }
    }

    echo sprintf("Array is sorted in %s swaps." . PHP_EOL .
        "First Element: %s" . PHP_EOL .
        "Last Element: %s", $swap, $a[0], end($a));
}