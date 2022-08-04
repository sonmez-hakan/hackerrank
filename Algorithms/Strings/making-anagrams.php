<?php
function makingAnagrams($s1, $s2)
{
    $counts1 = [];
    for ($x = 0, $l = strlen($s1); $x < $l; $x++) {
        @$counts1[$s1[$x]]++;
    }

    $counts2 = [];
    for ($x = 0, $l = strlen($s2); $x < $l; $x++) {
        @$counts2[$s2[$x]]++;
    }

    $diff = 0;
    for ($x = 97; $x < 123; $x++) {
        $c = chr($x);
        $diff += abs(($counts1[$c] ?? 0) - ($counts2[$c] ?? 0));
    }

    return $diff;
}