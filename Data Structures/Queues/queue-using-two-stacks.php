<?php

$_fp = fopen("php://stdin", "r");
$t = intval(trim(fgets($_fp)));

$queue = [];
for ($x = 0; $x < $t; $x++) {
    $line = trim(fgets($_fp));
    $parts = explode(' ', $line);
    $operation = intval($parts[0]);
    switch ($operation) {
        case 1:
            $queue[] = $parts[1];
            break;
        case 2:
            array_shift($queue);
            break;
        default:
            echo $queue[0] . PHP_EOL;

    }
}

