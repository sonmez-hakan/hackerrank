<?php
function birthdayCakeCandles($candles)
{
    $counts = [];
    foreach ($candles as $candle) {
        $counts[$candle] = ($counts[$candle] ?? 0) + 1;
    }

    ksort($counts);

    return array_pop($counts);
}