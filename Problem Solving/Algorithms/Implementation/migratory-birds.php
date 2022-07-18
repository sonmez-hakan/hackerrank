<?php
function migratoryBirds($arr)
{
    $birds = [];
    foreach ($arr as $bird) {
        if (!isset($birds[$bird])) {
            $birds[$bird] = 1;
        } else {
            $birds[$bird]++;
        }
    }

    $maxValue = 0;
    $minKey = 0;
    foreach ($birds as $key => $value) {
        if ($value > $maxValue || ($value == $maxValue && $minKey > $key)) {
            $maxValue = $value;
            $minKey = $key;
        }
    }

    return $minKey;
}