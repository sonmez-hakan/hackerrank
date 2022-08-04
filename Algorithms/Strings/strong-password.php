<?php
function minimumNumber($n, $password)
{
    $chars = [
        'number' => "0123456789",
        'lower' => "abcdefghijklmnopqrstuvwxyz",
        'upper' => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
        'special' => "!@#$%^&*()-+"
    ];

    $has = [
        'number' => false,
        'lower' => false,
        'upper' => false,
        'special' => false,
    ];
    $limit = 6;
    $length = $n;

    foreach ($chars as $key => $value) {
        for ($x = 0; $x < $n; $x++) {
            if (strpos($value, $password[$x]) !== false) {
                $has[$key] = true;
                break;
            }
        }

        if (!$has[$key]) {
            $length++;
        }
    }

    return $limit > $length ? $limit - $n : $length - $n;
}