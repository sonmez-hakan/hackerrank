<?php
function catAndMouse($x, $y, $z)
{
    $catA = abs($x - $z);
    $catB = abs($y - $z);
    if ($catA < $catB) {
        return 'Cat A';
    }

    if ($catA > $catB) {
        return 'Cat B';
    }

    return 'Mouse C';
}