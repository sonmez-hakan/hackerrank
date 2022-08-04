<?php

/*
 * Complete the 'marcsCakewalk' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts INTEGER_ARRAY calorie as parameter.
 */
function marcsCakewalk($calorie)
{
    rsort($calorie);
    $cal = 0;
    foreach ($calorie as $j => $c) {
        $cal += (2 ** $j) * $c;
    }

    return $cal;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$calorie_temp = rtrim(fgets(STDIN));

$calorie = array_map('intval', preg_split('/ /', $calorie_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = marcsCakewalk($calorie);

fwrite($fptr, $result . "\n");

fclose($fptr);
