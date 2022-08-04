<?php

/*
 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path
 */
function countingValleys($steps, $path)
{
    $level = 0;
    $valley = 0;
    for ($x = 0; $x < $steps; $x++) {
        if ($path[$x] == 'D') {
            $valley += $level == 0 ? 1 : 0;
            $level--;
        } else {
            $level++;
        }
    }

    return $valley;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$steps = intval(trim(fgets(STDIN)));

$path = rtrim(fgets(STDIN), "\r\n");

$result = countingValleys($steps, $path);

fwrite($fptr, $result . "\n");

fclose($fptr);
