<?php
function twoStrings($s1, $s2)
{
    $arr = array_flip(str_split($s1));
    for ($x = 0, $l = strlen($s2); $x < $l; $x++) {
        if (isset($arr[$s2[$x]])) {
            return 'YES';
        }
    }

    return 'NO';
}
