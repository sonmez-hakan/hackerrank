<?php
/*
 * Complete the 'minimumBribes' function below.
 *
 * The function accepts INTEGER_ARRAY q as parameter.
 */
function minimumBribes($q)
{
    $bribe = 0;
    $expecteds = [1, 2, 3];
    foreach ($q as $w) {
        if ($w == $expecteds[0]) {
            $expecteds[0] = $expecteds[1];
            $expecteds[1] = $expecteds[2];
        } elseif ($w == $expecteds[1]) {
            $bribe += 1;
            $expecteds[1] = $expecteds[2];
        } elseif ($w == $expecteds[2]) {
            $bribe += 2;
        } else {
            return print 'Too chaotic' . PHP_EOL;
        }
        $expecteds[2]++;
    }

    return print $bribe . PHP_EOL;
}

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $q_temp = rtrim(fgets(STDIN));

    $q = array_map('intval', preg_split('/ /', $q_temp, -1, PREG_SPLIT_NO_EMPTY));

    minimumBribes($q);
}
