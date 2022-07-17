<?php
function towerBreakers($n, $m)
{
    return $n % 2 == 0 || $m == 1 ? 2 : 1;
}
