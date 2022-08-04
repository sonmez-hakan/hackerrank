<?php
function rotateLeft($d, $arr)
{
    return array_merge(array_slice($arr, $d), array_slice($arr, 0, $d));
}