<?php
function matchingStrings($strings, $queries)
{
    $counts = [];
    foreach ($queries as $key => $query) {
        $counts[$key] = 0;
        foreach ($strings as $string) {
            if ($query == $string) {
                $counts[$key]++;
            }
        }
    }

    return $counts;
}