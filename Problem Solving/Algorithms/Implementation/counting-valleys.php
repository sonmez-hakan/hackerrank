<?php
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