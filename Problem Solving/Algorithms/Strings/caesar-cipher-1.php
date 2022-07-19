<?php
function getChar($num, $limit = 90)
{
    if ($num > $limit) {
        $num -= 26;
    }

    return chr($num);
}

function caesarCipher($s, $k)
{
    $k = $k % 26;
    $c = "";
    for ($x = 0, $l = strlen($s); $x < $l; $x++) {
        $num = ord($s[$x]);
        if ($num >= 65 && $num <= 90) {
            $c .= getChar($num + $k);
        } elseif ($num >= 97 && $num <= 122) {
            $c .= getChar($num + $k, 122);
        } else {
            $c .= $s[$x];
        }
    }

    return $c;
}