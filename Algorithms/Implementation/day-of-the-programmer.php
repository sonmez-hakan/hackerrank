<?php
function dayOfProgrammer($year)
{
    $dayOfTheYear = 255;
    if ($year < 1918) {
        $dayOfTheYear -= $year % 4 == 0 ? 1 : 0;
    } elseif ($year == 1918) {
        $dayOfTheYear += 13;
    } elseif ($year % 4 == 0) {
        if ($year % 100 == 0) {
            $dayOfTheYear -= $year % 400 == 0 ? 1 : 0;
        } else {
            $dayOfTheYear--;
        }

    }

    return DateTime::createFromFormat('z Y', "{$dayOfTheYear} {$year}")->format('d.m.Y');
}