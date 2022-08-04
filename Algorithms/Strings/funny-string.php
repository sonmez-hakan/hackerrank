<?php
function funnyString($s)
{
    $diffs = [];
    for ($x = 0, $l = strlen($s) - 1; $x < $l; $x++) {
        $diffs[] = abs(ord($s[$x]) - ord($s[$x + 1]));
    }

    $count = count($diffs);
    for ($x = 0, $l = (int)($count / 2); $x < $l; $x++) {
        if ($diffs[$x] != $diffs[$count - $x - 1]) {
            return 'Not Funny';
        }
    }

    return 'Funny';
}
