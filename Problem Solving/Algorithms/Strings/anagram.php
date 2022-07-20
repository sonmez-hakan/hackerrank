<?php
function anagram($s)
{
    $l = strlen($s);
    if ($l % 2 == 1) {
        return -1;
    }

    $n = (int)($l / 2);

    $s1 = substr($s, 0, $n);
    $counts1 = [];
    for ($x = 0; $x < $n; $x++) {
        @$counts1[$s1[$x]]++;
    }

    $s2 = substr($s, $n);
    $counts2 = [];
    for ($x = 0; $x < $n; $x++) {
        @$counts2[$s2[$x]]++;
    }

    $diff = 0;
    for ($x = 97; $x < 123; $x++) {
        $c = chr($x);
        $diff += abs(($counts1[$c] ?? 0) - ($counts2[$c] ?? 0));
    }

    return (int)($diff / 2);
}