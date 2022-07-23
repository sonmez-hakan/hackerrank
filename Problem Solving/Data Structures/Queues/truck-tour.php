<?php


/*
 * Complete the 'truckTour' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY petrolpumps as parameter.
 */

function truckTour($petrolpumps)
{
    $count = count($petrolpumps);
    for ($x = 0; $x < $count;) {
        $gas = 0;
        $result = true;
        $counter = 0;
        for ($y = $x; $y < $count + $x; $y++) {
            $counter++;
            $realY = $y >= $count ? $y - $count : $y;
            $gas += $petrolpumps[$realY][0] - $petrolpumps[$realY][1];
            if ($gas < 0) {
                $result = false;
                break;
            }
        }
        if ($result) {
            return $x;
        }

        $x += $counter;
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$petrolpumps = array();

for ($i = 0; $i < $n; $i++) {
    $petrolpumps_temp = rtrim(fgets(STDIN));

    $petrolpumps[] = array_map('intval', preg_split('/ /', $petrolpumps_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = truckTour($petrolpumps);

fwrite($fptr, $result . "\n");

fclose($fptr);
