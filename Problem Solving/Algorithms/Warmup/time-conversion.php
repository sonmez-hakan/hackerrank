<?php
function timeConversion($s)
{
    $aorp = substr($s, -2);
    $hour = substr($s, 0, 2);
    $time = ltrim(rtrim($s, $aorp), $hour);
    $hour = (int)$hour;

    if ($aorp == 'PM') {
        $hour += $hour < 12 ? 12 : 0;
    } else {
        $hour -= $hour == 12 ? 12 : 0;
    }

    return substr("0{$hour}", -2) . $time;
}