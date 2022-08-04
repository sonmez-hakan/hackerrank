<?php


/*
 * Complete the 'happyLadybugs' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING b as parameter.
 */

function happyLadybugs($b)
{
    // Write your code here
    if (strpos($b, '_') !== false) {
        $counts = [];
        for ($x = 0, $l = strlen($b); $x < $l; $x++) {
            if ($b[$x] == '_') {
                continue;
            }
            if (!isset($counts[$b[$x]])) {
                $counts[$b[$x]] = 1;
            } else {
                $counts[$b[$x]]++;
            }
        }
        foreach ($counts as $count) {
            if ($count == 1) {
                return 'NO';
            }
        }

        return 'YES';
    } else {
        for ($x = 0, $l = strlen($b); $x < $l; $x++) {
            if ($b[$x] == '_') {
                continue;
            }
            if ($x == 0) {
                if ($b[$x] != $b[$x + 1]) {
                    return 'NO';
                }
            } else if ($x == $l - 1) {
                if ($b[$x] != $b[$x - 1]) {
                    return 'NO';
                }
            } else {
                if ($b[$x - 1] != $b[$x] && $b[$x] != $b[$x + 1]) {
                    return 'NO';
                }
            }

        }

        return 'YES';
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$g = intval(trim(fgets(STDIN)));

for ($g_itr = 0; $g_itr < $g; $g_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $b = rtrim(fgets(STDIN), "\r\n");

    $result = happyLadybugs($b);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
