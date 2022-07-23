<?php

/*
 * Complete the 'absolutePermutation' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER k
 */
function absolutePermutation($n, $k)
{
    $arr = range(1, $n);
    if ($k == 0) {
        return $arr;
    }

    if ($n % 2 == 1) {
        return [-1];
    }

    if ($k > $n / 2) {
        return [-1];
    }

    if ($n % $k != 0) {
        return [-1];
    }

    if ((int)($n / $k) % 2 == 1) {
        return [-1];
    }

    $used = [];
    $rule = true;
    $counter = 0;
    foreach ($arr as $i => $v) {
        $used[] = $rule ? $k + $i + 1 : abs($k - $i - 1);
        $counter++;
        if ($counter % $k == 0) {
            $rule = !$rule;
        }
    }

    return $used;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);

    $k = intval($first_multiple_input[1]);

    $result = absolutePermutation($n, $k);

    fwrite($fptr, implode(" ", $result) . "\n");
}

fclose($fptr);
