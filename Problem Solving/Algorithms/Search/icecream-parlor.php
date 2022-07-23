<?php
/*
 * Complete the 'icecreamParlor' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER m
 *  2. INTEGER_ARRAY arr
 */

function icecreamParlor($m, $arr) {
    $rev = [];
    foreach ($arr as $k => $a) {
        $d = $m - $a;
        if (isset($rev[$d])) {
            foreach ($rev[$d] as $k2) {
                if ($k2 != $k) {
                    return [$k2 + 1, $k + 1];
                }
            }
        }
        if (!isset($rev[$a])){
            $rev[$a] = [];
        }
        $rev[$a][] = $k;
    }

    return [];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $m = intval(trim(fgets(STDIN)));

    $n = intval(trim(fgets(STDIN)));

    $arr_temp = rtrim(fgets(STDIN));

    $arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = icecreamParlor($m, $arr);

    fwrite($fptr, implode(" ", $result) . "\n");
}

fclose(STDIN);