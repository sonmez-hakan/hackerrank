<?php
function findMedian($arr)
{
    sort($arr);

    return $arr[(int)(count($arr) / 2)];
}
