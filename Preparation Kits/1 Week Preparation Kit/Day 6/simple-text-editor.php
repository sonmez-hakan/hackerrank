<?php
$_fp = fopen("php://stdin", "r");
$t = (int)trim(fgets($_fp));

$queue = [];
$string = '';
for ($x = 0; $x < $t; $x++) {
    $line = trim(fgets($_fp));
    $parts = explode(' ', $line);
    $operation = (int)$parts[0];
    switch ($operation) {
        case 1:
            $queue[] = $string;
            $string .= $parts[1];
            break;
        case 2:
            $queue[] = $string;
            $string = substr($string, 0, -(int)$parts[1]);
            break;
        case 4:
            $string = array_pop($queue);
            break;
        default:
            echo $string[(int)$parts[1] - 1] . PHP_EOL;
    }
}