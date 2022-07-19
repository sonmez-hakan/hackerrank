<?php
function superReducedString($s)
{
    $newS = $s;
    do {
        $s = $newS;
        for ($x = 0, $l = strlen($s); $x < $l - 1; $x++) {
            if ($s[$x] == $s[$x + 1]) {
                $newS = substr_replace($s, '', $x, 2);
                break;
            }
        }
    } while ($newS && $newS != $s);

    return $newS ?: 'Empty String';
}