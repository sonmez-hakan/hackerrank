<?php
function lonelyinteger($arr)
{
    $unique = [];
    foreach ($arr as $a) {
        if (isset($unique[$a])) {
            unset($unique[$a]);
        } else {
            $unique[$a] = $a;
        }
    }

    return array_values($unique)[0];
}