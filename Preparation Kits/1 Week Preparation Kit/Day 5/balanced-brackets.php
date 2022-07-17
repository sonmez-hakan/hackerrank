<?php
function isBalanced($s)
{
    $brackets = [];
    $closings = [
        '(' => ')',
        '[' => ']',
        '{' => '}',
    ];
    for ($x = 0, $l = strlen($s); $x < $l; $x++) {
        if (in_array($s[$x], ['{', '[', '('])) {
            $brackets[] = $s[$x];
            continue;
        }

        $bracket = array_pop($brackets);
        if ($closings[$bracket] != $s[$x]) {
            return 'NO';
        }
    }

    if (count($brackets) > 0) {
        return 'NO';
    }

    return 'YES';
}