<?php
function pageCount($n, $p) {
    $fromStartDiff = $p - 1;
    $fromEndDiff = $n - $p;
    $evenPage = $n % 2 == 0;
    if ($fromStartDiff == $fromEndDiff) {
        $fromStart = $evenPage;
    } else {
        $fromStart = $fromStartDiff < $fromEndDiff;
    }

    if ($fromStart) {
        return (int)ceil($fromStartDiff / 2);
    }

    return (int)($evenPage ? ceil($fromEndDiff / 2) : floor($fromEndDiff / 2));
}