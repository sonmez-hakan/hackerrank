<?php
function gemstones($arr)
{
    $count = 0;
    for ($x = 97; $x < 123; $x++) {
        $c = chr($x);
        $result = true;
        foreach ($arr as $s) {
            if (strpos($s, $c) === false) {
                $result = false;
                break;
            }
        }

        $count += $result ? 1 : 0;
    }

    return $count;
}