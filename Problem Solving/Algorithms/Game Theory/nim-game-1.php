<?php

/*
 * Complete the 'nimGame' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY pile as parameter.
 */
function nimGame($pile)
{
    $count = count($pile);
    if ($count == 1) {
        return 'First';
    }

    if ($count == array_sum($pile)) {
        return $count % 2 == 0 ? 'Second' : 'First';
    }

    return array_reduce($pile, function ($c, $a) {
        return $c ^ $a;
    }, 0) ? 'First' : 'Second';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$g = intval(trim(fgets(STDIN)));

for ($g_itr = 0; $g_itr < $g; $g_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $pile_temp = rtrim(fgets(STDIN));

    $pile = array_map('intval', preg_split('/ /', $pile_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = nimGame($pile);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

