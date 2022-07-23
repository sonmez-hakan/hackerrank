<?php

$_fp = fopen("php://stdin", "r");
$t = intval(trim(fgets($_fp)));

$queue = [];
$string = '';
for ($x = 0; $x < $t; $x++) {
    $line = trim(fgets($_fp));
    $parts = explode(' ', $line);
    $operation = intval($parts[0]);
    switch ($operation) {
        case 1:
            $string .= $parts[1];
            $queue[] = [1, $parts[1]];
            break;
        case 2:
            $length = intval($parts[1]);
            $part = substr($string, -$length);
            $queue[] = [2, $part];
            $string = substr($string, 0, -$length);
            break;
        case 4:
            $op = array_pop($queue);
            if (!$op) {
                break;
            }
            if ($op[0] == 1) {
                $string = substr($string, 0, -strlen($op[1]));
            } else {
                $string .= $op[1];
            }
            break;
        default:
            $val = intval($parts[1]) - 1;
            echo $string[$val] . PHP_EOL;
    }
}

