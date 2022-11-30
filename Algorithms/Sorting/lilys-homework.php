<?php

/*
 * Complete the 'lilysHomework' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function swapCount($array, $heap, $dic) {
    $swapCount = 0;
    for ($x = 0, $l = count($array); $x < $l; $x++) {
        $expected = $heap->extract();
        $found = $array[$x];
        if ($expected != $found) {
            $place = $dic[$expected];

            $array[$x] = $expected;
            $array[$place] = $found;

            $dic[$expected] = $x;
            $dic[$found] = $place;

            $swapCount++;
        }
    }

    return $swapCount;
}

function lilysHomework($arr) {
    $maxHeap = new SplMaxHeap();
    $minHeap = new SplMinHeap();

    $dic = [];
    foreach ($arr as $key => $value) {
        $maxHeap->insert($value);
        $minHeap->insert($value);
        $dic[$value] = $key;
    }

    return min(swapCount($arr, $minHeap, $dic), swapCount($arr, $maxHeap, $dic));
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = lilysHomework($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);