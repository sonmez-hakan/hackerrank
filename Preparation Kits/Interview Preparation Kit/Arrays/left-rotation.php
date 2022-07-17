<?php
function rotLeft($a, $d) {
    $b = array_splice($a, 0, $d, []);

    return array_merge($a, $b);
}