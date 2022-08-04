<?php


/*
 * Complete the 'strangeCounter' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts LONG_INTEGER t as parameter.
 */

function strangeCounter($t)
{
    $counter = 1.5;
    do {
        $counter *= 2;
        $t -= $counter;
    } while ($t > 0);

    return 1 - $t;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

$result = strangeCounter($t);

fwrite($fptr, $result . "\n");

fclose($fptr);
