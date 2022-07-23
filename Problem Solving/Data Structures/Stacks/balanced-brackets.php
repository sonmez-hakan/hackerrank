<?php


/*
 * Complete the 'isBalanced' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */
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

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = isBalanced($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
