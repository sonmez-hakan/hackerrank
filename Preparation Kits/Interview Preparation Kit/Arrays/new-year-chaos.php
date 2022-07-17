<?php
function minimumBribes($q) {
    $bribe = 0;
    $expecteds = [1,2,3];
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
