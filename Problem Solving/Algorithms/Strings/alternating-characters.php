<?php
function alternatingCharacters($s)
{
    $count = 0;
    for ($x = 0, $l = strlen($s) - 1; $x < $l; $x++) {
        if ($s[$x] == $s[$x + 1]) {
            $count++;
        }
    }

    return $count;
}