<?php
function pangrams($s)
{
    $alphabet = [];
    for ($x = 97; $x <= 122; $x++) {
        $alphabet[chr($x)] = 0;
    }

    for ($x = 0, $l = strlen($s); $x < $l; $x++) {
        $alphabet[strtolower($s[$x])]++;
    }

    return array_product($alphabet) > 0 ? 'pangram' : 'not pangram';
}