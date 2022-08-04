<?php

/*
 * Complete the 'misereNim' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY s as parameter.
 */
function misereNim($s)
{
    $count = count($s);
    if ($count == 1) {
        return $s[0] > 1 ? 'First' : 'Second';
    }

    if ($count == array_sum($s)) {
        return $count % 2 == 0 ? 'First' : 'Second';
    }

    return array_reduce($s, function ($c, $a) {
        return $c ^ $a;
    }, 0) ? 'First' : 'Second';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $s_temp = rtrim(fgets(STDIN));

    $s = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = misereNim($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

