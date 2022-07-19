<?php
function beautifulBinaryString($b)
{
    $count = 0;
    $pos = strpos($b, '010');
    while ($pos !== false) {
        $b[$pos + 2] = 1;
        $pos = strpos($b, '010');
        $count++;
    }

    return $count;
}