<?php

/*
 * Complete the 'maximumPerimeterTriangle' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY sticks as parameter.
 */

function maximumPerimeterTriangle($sticks)
{
    rsort($sticks);
    for ($x = 0, $l = count($sticks); $x < $l - 2; $x++) {
        if ($sticks[$x] - $sticks[$x + 1] < $sticks[$x + 2]
            && $sticks[$x] < $sticks[$x + 1] + $sticks[$x + 2]) {
            return [$sticks[$x + 2], $sticks[$x + 1], $sticks[$x]];
        }
    }

    return [-1];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$sticks_temp = rtrim(fgets(STDIN));

$sticks = array_map('intval', preg_split('/ /', $sticks_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = maximumPerimeterTriangle($sticks);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);

