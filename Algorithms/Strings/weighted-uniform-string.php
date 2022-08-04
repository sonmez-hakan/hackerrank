<?php
function weightedUniformStrings($s, $queries)
{
    $counts = [];
    $last = null;
    for ($x = 0, $l = strlen($s); $x < $l; $x++) {
        $new = ord($s[$x]) - 96;
        if ($last != $new) {
            $last = $new;
            $counts[$x] = $new;
        } else {
            $counts[$x] = $counts[$x - 1] + $new;
        }
    }

    $result = [];
    foreach ($queries as $query) {
        $result[] = in_array($query, $counts) ? 'Yes' : 'No';
    }

    return $result;
}