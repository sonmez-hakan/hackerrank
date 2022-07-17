<?php
function freqQuery($queries) {
    $dic = [];
    $ans = [];
    foreach ($queries as $query) {
        switch ($query[0]) {
            case 1:
                $dic[$query[1]] = ($dic[$query[1]] ?? 0) + 1;
                break;
            case 2:
                $dic[$query[1]] = isset($dic[$query[1]]) ? $dic[$query[1]] - 1 : 0;
                $dic[$query[1]] = $dic[$query[1]] >= 0 ? $dic[$query[1]] : 0;
                break;
            case 3:
                $ans[] = in_array($query[1], $dic) ? 1 : 0;
                break;
        }
    }

    return $ans;
}