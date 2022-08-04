<?php
function separateNumbers($s)
{
    $l = strlen($s);
    for ($x = 1; $x < $l - 1; $x++) {
        $result = true;
        $str = substr($s, 0, $x);
        if ($str[0] === '0') {
            continue;
        }
        $first = $last = (int)$str;
        $length = $x;
        for ($y = $x; $y < $l; $y += $length) {
            $digits = 10 ** $length;
            if ($last % $digits == $digits - 1) {
                $length++;
            }

            $str = substr($s, $y, $length);
            if ($str[0] === '0') {
                $result = false;
                break;
            }
            $num = (int)$str;
            if ($last + 1 != $num) {
                $result = false;
                break;
            }
            $last = $num;
        }
        if ($result) {
            return print "YES $first" . PHP_EOL;
        }
    }

    return print "NO" . PHP_EOL;
}