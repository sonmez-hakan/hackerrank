<?php
function dynamicArray($n, $queries)
{
    $arr = [];
    for ($x = 0; $x < $n; $x++) {
        $arr[$x] = [];
    }

    $lastAnswer = 0;
    $result = [];
    foreach ($queries as $query) {
        switch ($query[0]) {
            case 1:
                $idx = ($query[1] ^ $lastAnswer) % $n;
                $arr[$idx][] = $query[2];
                break;
            default:
                $idx = ($query[1] ^ $lastAnswer) % $n;
                $lastAnswer = $arr[$idx][$query[2] % count($arr[$idx])];
                $result[] = $lastAnswer;
                break;
        }
    }

    return $result;
}
