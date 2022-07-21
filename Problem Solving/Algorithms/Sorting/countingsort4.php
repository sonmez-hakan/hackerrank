<?php
#test case 5 has one million elements so php throw memory error so I implemented the solution in the loop.
#I changed the line 9 to use values directly in variables and following lines are the solution
$n = intval(trim(fgets(STDIN)));
$arr = [];
$half = $n / 2;
for ($i = 0; $i < $n; $i++) {
    $arr_temp = rtrim(fgets(STDIN));
    [$k, $s] = preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY);
    if (!isset($arr[$k])) {
        $arr[$k] = $i < $half ? '-' : $s;
    } else {
        $arr[$k] .= ' ' . ($i < $half ? '-' : $s);
    }
}
ksort($arr);
echo implode(' ', $arr);