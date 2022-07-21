<?php
function bigSorting($unsorted)
{
    usort($unsorted, static function ($a, $b) {
        $la = strlen($a);
        $lb = strlen($b);
        if ($la == $lb) {
            for ($x = 0; $x < $la; $x += 9) {
                $ia = (int)substr($a, $x, 9);
                $ib = (int)substr($b, $x, 9);
                if ($ia == $ib) {
                    continue;
                }

                return $a > $b ? 1 : -1;
            }

            return 0;
        }

        return $la > $lb ? 1 : -1;
    });

    return $unsorted;
}