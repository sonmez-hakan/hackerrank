<?php
function makeAnagram($a, $b) {
    $counts1 = [];
    for ($x = 0, $l = strlen($a); $x < $l; $x++) {
        @$counts1[$a[$x]]++;
    }

    $counts2 = [];
    for ($x = 0, $l = strlen($b); $x < $l; $x++) {
        @$counts2[$b[$x]]++;
    }

    $diff = 0;
    for ($x = 97; $x < 123; $x++) {
        $c = chr($x);
        $diff += abs(($counts1[$c] ?? 0) - ($counts2[$c] ?? 0));
    }

    return $diff;
}