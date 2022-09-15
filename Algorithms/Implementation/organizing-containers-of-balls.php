<?php
/*
 * Complete the 'organizingContainers' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts 2D_INTEGER_ARRAY container as parameter.
 */

function organizingContainers($container)
{
    $balls = new SplMaxHeap();
    $sizes = new SplMaxHeap();
    $count = count($container);
    for ($x = 0; $x < $count; $x++) {
        $ballCount = 0;
        $sizeCount = 0;
        for ($y = 0; $y < $count; $y++) {
            $ballCount += $container[$y][$x];
            $sizeCount += $container[$x][$y];
        }
        $balls->insert($ballCount);
        $sizes->insert($sizeCount);
    }

    for ($x = 0; $x < $count; $x++) {
        if ($balls->extract() != $sizes->extract()) {
            return 'Impossible';
        }
    }

    return 'Possible';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $container = array();

    for ($i = 0; $i < $n; $i++) {
        $container_temp = rtrim(fgets(STDIN));

        $container[] = array_map('intval', preg_split('/ /', $container_temp, -1, PREG_SPLIT_NO_EMPTY));
    }

    $result = organizingContainers($container);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
