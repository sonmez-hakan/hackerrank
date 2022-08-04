<?php

/*
 * Complete the 'nimbleGame' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY s as parameter.
 */

function nimbleGame($s)
{
    $xor = 0;
    foreach ($s as $k => $c) {
        if ($c % 2 == 1) {
            $xor ^= $k;
        }
    }

    return $xor != 0 ? 'First' : 'Second';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $s_temp = rtrim(fgets(STDIN));

    $s = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = nimbleGame($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
