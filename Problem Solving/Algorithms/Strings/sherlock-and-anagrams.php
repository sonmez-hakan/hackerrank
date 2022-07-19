<?php
function sherlockAndAnagrams($s)
{
    $len = strlen($s);
    $map = [];
    for ($x = 1; $x < $len; $x++) {
        for ($y = 0; $y + $x <= $len; $y++) {
            $str = substr($s, $y, $x);
            $arr = str_split($str);
            sort($arr);
            $ostr = implode('', $arr);
            if (!isset($map[$ostr])) {
                $map[$ostr] = 1;
            } else {
                $map[$ostr]++;
            }
        }
    }

    $count = 0;
    foreach ($map as $a) {
        if ($a == 1) {
            continue;
        }

        $count += ($a * ($a - 1)) / 2;
    }

    return (int)$count;
}