<?php
function maximumToys($prices, $k) {
    sort($prices);
    $count = 0;
    foreach ($prices as $price) {
        if ($k > $price) {
            $k -= $price;
            $count++;
        }
    }

    return $count;
}
