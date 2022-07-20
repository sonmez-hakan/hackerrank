<?php
function stringConstruction($s)
{
    $c = '';
    $cost = 0;
    for ($x = 0, $l = strlen($s); $x < $l; $x++) {
        $substr = $s[$x];
        $pos = strpos($c, $substr);
        if ($pos === false) {
            $cost++;
            $c .= $substr;
            continue;
        }

        while ($pos !== false && $x < $l - 1) {
            $substr .= $s[++$x];
            $pos = strpos($c, $substr);
        }

        $c .= substr($substr, 0, -1);
    }

    return $cost;
}