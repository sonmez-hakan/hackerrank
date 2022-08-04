<?php
function getMoneySpent($keyboards, $drives, $b)
{
    $max = -1;
    rsort($keyboards);
    rsort($drives);
    foreach ($keyboards as $keyboard) {
        foreach ($drives as $drive) {
            $sum = $keyboard + $drive;
            if ($b < $sum) {
                continue;
            }
            if ($max < $sum) {
                $max = $sum;
                break;
            }
        }
    }

    return $max;
}