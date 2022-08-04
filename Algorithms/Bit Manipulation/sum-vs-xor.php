<?php

/*
 * Complete the 'sumXor' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts LONG_INTEGER n as parameter.
 */

function sumXor($n)
{
    if ($n < 2) {
        return 1;
    }

    return 2 ** strlen(str_replace(1, '', decbin($n)));
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$result = sumXor($n);

fwrite($fptr, $result . "\n");

fclose($fptr);
