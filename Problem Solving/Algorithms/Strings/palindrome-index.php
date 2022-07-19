<?php
function palindromeIndex($s)
{
    $len = strlen($s);
    $even = $len % 2 === 0;
    $l = (int)($len / 2);

    for ($x = 0; $x < $l; $x++) {
        $reverse = $len - 1 - $x;
        if ($s[$x] == $s[$reverse]) {
            continue;
        }

        $count = $l - $x - ($even ? 1 : 0);
        if (substr($s, $x, $count) == strrev(substr($s, $l, $count))) {
            return $reverse;
        }

        return $x;
    }

    return -1;
}