<?php
function quickSort($arr)
{
    if (count($arr) < 2) {
        return $arr;
    }

    $pivot = array_shift($arr);
    $loe = $gt = [];
    foreach ($arr as $val) {
        if ($val <= $pivot) {
            $loe[] = $val;
        } else {
            $gt[] = $val;
        }
    }

    return array_merge(
        quickSort($loe),
        [$pivot],
        quickSort($gt)
    );
}